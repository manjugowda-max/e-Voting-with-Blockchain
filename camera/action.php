<?php

session_start();
require_once 'webcamClass.php';

$webcamClass=new webcamClass();
echo $webcamClass->showImage();

?>