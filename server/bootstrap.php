<?php
/*
 * RedBean http://redbeanphp.com/
 */
require 'libs/rb.php';
R::setup('sqlite:./database/db.sqlite');

set_time_limit(0); // No time limit

function getMessage() {
    $msg = R::findOne('messages', '1=1 ORDER BY created DESC LIMIT 1');
    if ($msg) return $msg;
}

function addMessage($string) {
    $msg = R::dispense('messages');
    $msg->message = htmlentities($string);
    $msg->ipaddress = $_SERVER['REMOTE_ADDR'];
    $msg->user_agent = $_SERVER['HTTP_USER_AGENT'];
    $msg->created = date('Y-m-d H:i:s');
    R::store($msg);
}
