<?php
require 'bootstrap.php';

$newMessage = $latestMessage = getMessage();

while(strtotime($latestMessage->created) == strtotime($newMessage->created)) {
    $newMessage = getMessage();
    usleep(100);
}

$json['message'] = $newMessage->message;
$json['ipaddress'] = $newMessage->ipaddress;
$json['user_agent'] = $newMessage->user_agent;
$json['created'] = $newMessage->created;

header('Content-type: application/json');
echo json_encode($json);
