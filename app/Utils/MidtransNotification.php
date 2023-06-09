<?php

namespace App\Utils;

class MidtransNotification
{
    /**
     * @readonly
     * @var string
     */
    public $transaction_status;

    /**
     * @readonly
     * @var string
     */
    public $payment_type;

    /**
     * @readonly
     * @var string
     */
    public $order_id;

    /**
     * @readonly
     * @var string
     */
    public $fraud_status;

    /**
     * @var array
     */
    private $others_props = [];


    /**
     * Helper
     */
    public const TRANSACTION_CAPTURE = 'capture';
    public const TRANSACTION_SETTLEMENT = 'settlement';
    public const TRANSACTION_PENDING = 'pending';
    public const TRANSACTION_DENY = 'deny';
    public const TRANSACTION_EXPIRE = 'expire';
    public const TRANSACTION_CANCEL = 'cancel';

    public const FRAUD_STATUS_CHALLENGE = 'challenge';

    public const PAYMENT_TYPE_CC = 'credit_card';


    public function __construct(\Illuminate\Http\Request $request)
    {
        $props = get_object_vars($this);

        foreach ($props as $k => $v) {
            $this->{$k} = $request->get($k);
        }

        foreach ($request->json() as $k => $v) {
            if (!property_exists($this, $k)) {
                $this->others_props[$k] = $v;
            }
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->others_props)) {
            return $this->others_props[$name];
        }

        return null;
    }

    public function toArray()
    {
        $props = [];

        foreach (get_object_vars($this) as $k => $v) {
            if ($k === 'others_props') {
                foreach ($v as $k1 => $v1) {
                    $props[$k1] = $v1;
                }
            } else {
                $props[$k] = $v;
            }
        }

        return $props;
    }
}
