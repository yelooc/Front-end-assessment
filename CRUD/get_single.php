<?php 
$single_id_url = "$url?id=$search_id";
$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $single_id_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        if ($e = curl_error($ch)){
            echo $e;
        }else{
            $json = json_encode(json_decode($resp, true), JSON_PRETTY_PRINT);
            echo $json;
        }
        curl_close($ch);
?>