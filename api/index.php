<?php

$botToken = "8707141410:AAGHrf0XkMTB7aC-2eYLJb697AfJwpBRVB4";
$website = "https://api.telegram.org/bot".$botToken;

$update = json_decode(file_get_contents("php://input"), true);

$chat_id = $update["message"]["chat"]["id"] ?? null;
$text = $update["message"]["text"] ?? "";

function bot($method,$data){
global $website;
$url = $website.'/'.$method;

$options = [
'http' => [
'method'  => 'POST',
'header'  => "Content-Type: application/json",
'content' => json_encode($data)
]
];

$context = stream_context_create($options);
file_get_contents($url,false,$context);
}

if($text == "/start"){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"🤖 Bot Running 💨"
]);
}

?>
