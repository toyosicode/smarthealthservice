<?php
namespace Helpers;

class Dojah {

    static public function nin_lookup($nin) {
//        $url = "https://sandbox.dojah.io/api/v1/kyc/nin?nin=" . urlencode($nin);
        $url = "https://api.dojah.io/api/v1/kyc/nin?nin=" . urlencode($nin);

        $headers = array(
            "AppId: " . DOJAH_APP_ID,
            "Authorization: " . DOJAH_API_KEY
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

}