<?php

namespace App\Services\Sms;

class SmsUz implements SmsSender
{

    private $sendLocal;
    private $url;

    public function __construct($sendLocal, $url) {

        if (empty($url)) {
            throw new \InvalidArgumentException('Sms URL must be set.');
        }

        $this->sendLocal = $sendLocal;
        $this->url       = $url;
    }

    public function send($number, $text): void {

        $this->sendSms($number, $text);
    }

    public function sendSms($number, $text) {

        $state     = false;
        $url_array = array(
            'username' => 'Alisher',
            'password' => 'Alisher_mdmxc',
            'smsc'     => 'smsc1',
            'from'     => 6100,
            'to'       => trim($number, '+'),
            'charset'  => 'utf-8',
            'coding'   => 2,
            'text'     => $text
        );
        $url1      = $this->url . http_build_query($url_array);
        $output    = "";
        $handle    = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url1);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        if (!curl_errno($handle)) {
            $state  = true;
            $output = curl_exec($handle);
            curl_close($handle);
        }

        $res = response()->json([
            'success' => $state,
            'output'  => $output,
//          'url' => null,
        ]);

        return $res;
    }

}
