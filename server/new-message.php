<?php
require 'bootstrap.php';

if ($_POST) {
    addMessage($_POST['message']);
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
