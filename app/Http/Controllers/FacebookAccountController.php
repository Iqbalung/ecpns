<?php

namespace App\Http\Controllers;

use App\FacebookAccount;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FacebookAccountController extends Controller
{
    /**
     * View deletion status
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function deletion(Request $request)
    {
        $found = FacebookAccount::getStatus($request->rdi);

        if (!$found) {
            $email = null;
            $name  = null;
        } else {
            $email = $found->email;
            $name  = $found->name;
        }

        return view('facebook.deletion', [
            'found' => $found != null,
            'name'  => $name,
            'email' => $email
        ]);
    }


    /**
     * Handle callback from Facebook
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deletionCallback(Request $request)
    {
        $request->validate([
            'signed_request' => 'required'
        ]);

        $signed_request = $request->get('signed_request');
        $data = $this->parseSignedRequest($signed_request);

        logger($data);

        if ($data) {
            $param['name'] = null;
            $param['email'] = null;
            $param['payload'] = json_encode($data);

            FacebookAccount::requestDeletion($param);
        }

        return response()->json([
            'url' => null,
            'confirmation_code' => null
        ]);
    }

    private function parseSignedRequest($signedRequest)
    {
        list($encoded_sig, $payload) = explode('.', $signedRequest, 2);

        $secret = env('FACEBOOK_CLIENT_SECRET');

        // decode
        $sig = $this->decodeSig($encoded_sig);
        $data = json_decode($this->decodeSig($payload), true);

        // confirm signature
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);

        if ($sig !== $expected_sig) {
            return null;
        }

        return $data;
    }

    private function decodeSig($encodedSig)
    {
        return base64_decode(strtr($encodedSig, '-_', '+/'));
    }
}
