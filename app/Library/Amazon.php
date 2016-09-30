<?php
/**
 * Created by PhpStorm.
 * User: KAT
 * Date: 09/08/2016
 * Time: 04:51 م
 */

namespace App\Library;


class Amazon
{

    // public key
    var $publicKey = "AKIAIUJ2IFZE3RMPWETQ";
    // private key
    var $privateKey = "n5DdTlcAdMzoU0/CyW71i2nhp5aeHuheJCv9r5VQ";
    // affiliate tag
    var $affiliateTag = 'affiliateTag';

    /**
     * @param $param
     * @return mixed
     */

    public function generateSignature($param)
    {
        // url basics
        $signature['method'] = 'GET';
        $signature['host'] = 'ecs.amazonaws.' . $param['region'];
        $signature['uri'] = '/onca/xml';

        // necessary parameters
        $param['Service'] = "AWSECommerceService";
        $param['AWSAccessKeyId'] = $this->publicKey;
        $param['Timestamp'] = gmdate("Y-m-d\TH:i:s\Z") + 7200;
        $param['Version'] = '2009-10-01';
        ksort($param);
        foreach ($param as $key => $value) {
            $key = str_replace("%7E", "~", rawurlencode($key));
            $value = str_replace("%7E", "~", rawurlencode($value));
            $queryParamsUrl[] = $key . "=" . $value;
        }
        // glue all the  "params=value"'s with an ampersand
        $signature['queryUrl'] = implode("&", $queryParamsUrl);

        // we'll use this string to make the signature
        $StringToSign = $signature['method'] . "\n" . $signature['host'] . "\n" . $signature['uri'] . "\n" . $signature['queryUrl'];
        // make signature
        $signature['string'] = str_replace("%7E", "~",
            rawurlencode(
                base64_encode(
                    hash_hmac("sha256", $StringToSign, $this->privateKey, True
                    )
                )
            )
        );
        return $signature;
    }

    /**
     * @param $params
     * @return string
     *
     */
    public function getSignedUrl($params)
    {
        $signature = $this->generateSignature($params);

        return $signedUrl = "http://" . $signature['host'] . $signature['uri'] . '?' . $signature['queryUrl'] . '&Signature=' . $signature['string'];
    }
}