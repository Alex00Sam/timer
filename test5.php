<?php
session_start();
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Test');
$app->initLayout('Centered');



if(!isset($_SESSION['flag'])){
    //Set the current timestamp.
    $_SESSION['timer'] = time();
}

//Get the current timestamp.
$now = time();

//Calculate how many seconds have passed.
$_SESSION['t'] = $now - $_SESSION['timer'];

if ($_SESSION['t']>5) {
  $_SESSION['t']=0;
}



$button = $app->add('Button');
//$i=0;
// clicking button generates random number every time
$button->on('click', function($action){
  $_SESSION['flag']=true;
  $_SESSION['i']=$_SESSION['i']+1;
    return $action->text($_SESSION['t']);
});
