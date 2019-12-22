<?php
class DipAuthenticator
{
public function verifyCode($authenticationid, $seedkey, $digits)
{   
$requesturl='http://localhost/dip_service/hosted/matchCode.php?authentication_id='.$authenticationid.'&seed_key='.$seedkey.'&digits='.$digits;
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $requesturl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response,true);
return $result['posts'];
}

public function enableCode($authenticationid, $seedkey, $digits)
{   
$requesturl='http://localhost/dip_service/hosted/matchCode.php?authentication_id='.$authenticationid.'&seed_key='.$seedkey.'&digits='.$digits;
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $requesturl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response,true);
return $result['posts'];
}


}