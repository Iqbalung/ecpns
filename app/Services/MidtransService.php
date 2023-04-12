<?php

namespace App\Services;

use App\Utils\MidtransNotification;

class MidtransService
{
    /**
     * Set to true to override value from config/midtrans.php before calling methods
     *
     * @var boolean
     */
    public static $configured = false;

    private static function configure()
    {
        if (static::$configured === false) {
            $config = config('midtrans');

            \Midtrans\Config::$serverKey = $config['MIDTRANS_SERVER_KEY'];
            \Midtrans\Config::$isProduction = $config['is_production'];
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = $config['is_sanitized'];
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = $config['is_3ds'];

            static::$configured = true;
        }
    }

    /**
     * Create Snap payment page, return token or null on failure
     *
     * @param array $params  Payment options
     * @param string $message Error message
     * @return string|null
     */
    public static function getSnapToken(array $params, &$message = null)
    {
        static::configure();

        try {
            return \Midtrans\Snap::getSnapToken($params);
        } catch (\Exception $ex) {
            logger("MidtransServices::getSnapToken -> " . $ex->getMessage(), $ex->getTrace());

            $message = $ex->getMessage();
        }

        return null;
    }

    /**
     * Validate if the given token is valid
     *
     * @param string $token Order ID or transaction ID
     * @param string $message Error message
     * @return boolean
     */
    public static function isValidCallback($token, &$message = null)
    {
        static::configure();

        try {
            $data = \Midtrans\Transaction::status($token);

            if (is_object($data)) {
                $signatureKey = $data->signature_key ?? null;
                $grossAmount = $data->gross_amount ?? null;
                $statusCode = $data->status_code ?? null;
            } elseif (is_array($data)) {
                $signatureKey = $data['signature_key'] ?? null;
                $grossAmount = $data['gross_amount'] ?? null;
                $statusCode = $data['status_code'] ?? null;
            } else {
                return false;
            }

            if (is_null($signatureKey) || is_null($grossAmount) || is_null($statusCode)) {
                return false;
            }

            return static::validateSignatureKey($token, $statusCode, $grossAmount, $signatureKey, $message);
        } catch (\Exception $ex) {
            logger("MidtransServices::isValidCallback -> " . $ex->getMessage(), $ex->getTrace());

            $message = $ex->getMessage();
        }

        return false;
    }

    /**
     * Midtrans Notification
     *
     * @param \Illuminate\Http\Request $request
     * @param string $message Error message
     * @return MidtransNotification
     */
    public static function parseNotification(\Illuminate\Http\Request $request, &$message = null)
    {
        return new MidtransNotification($request);
    }

    /**
     * Transaction Status
     * @param string $id — Order ID or transaction ID
     * @return mixed[] | null
     */
    public static function status($id)
    {
        static::configure();

        try {
            return \Midtrans\Transaction::status($id);
        } catch (\Exception $th) {
            return null;
        }
    }

    /**
     * Validating callback with calculating the signature key
     *
     * @param string $orderId
     * @param int $statusCode
     * @param int $grossAmount
     * @param string $signatureKey
     * @return boolean
     */
    private static function validateSignatureKey($orderId, $statusCode, $grossAmount, $signatureKey, &$message = null)
    {
        try {
            // will throws if sha512 hashing not available
            $hash = hash('sha512', $orderId . $statusCode . $grossAmount . \Midtrans\Config::$serverKey);

            return $hash === $signatureKey;
        } catch (\Exception $ex) {
            logger("MidtransServices::validateSignatureKey -> " . $ex->getMessage(), $ex->getTrace());

            $message = $ex->getMessage();
        }

        return false;
    }
}

// Midtrans Client
require_once base_path('includes/midtrans/Midtrans.php');
