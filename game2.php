<?php
session_start();
require 'vendor/autoload.php';
//require 'Models.php';
$app = new \atk4\ui\App ('Bank');
$app->initLayout('Centered');
$modal = $app ->add(['Modal','title'=>'figna']);
$modal -> add(['Text','You lost! Good luck next time']);

 $button = $app ->add(['Button','Touch me','big red']);

 $button -> on('click', function($action){
   $_SESSION['i']=$_SESSION['i']+1;
   $_SESSION['flag'] = true;
   if ($_SESSION['i'] < 20) {
     return $action->text($_SESSION['i']);
   }
   if (($_SESSION['t'] <= 10) and ($_SESSION['i'] >= 20)) {
     return new \atk4\ui\jsExpression('document.location="prize.php"');
   }
 });
/*
 $button2 = $app->add('Button');
 $button2->on('click', function ($action){
   $_SESSION['flag'] = true;
   return $action ->text($_SESSION['t']);
 }); */
 if (($_SESSION['t'] <= 10) and ($_SESSION['i'] >= 20)) {
   //$_SESSION['t'] = 0;
   new \atk4\ui\jsExpression('document.location="prize.php"');
 //  header('location:index.php');
 }
 if ($_SESSION['t'] > 10) {
 //  $_SESSION['t'] = 0;
   $_SESSION['i'] = 0;
   $modal -> show();
 //  $vp = $app->add('VirtualPage');
 //  $vp->add('Text','You lost! Good luck next time');
 }
 $now = time();
 if (!isset($_SESSION['flag'])){
   $_SESSION['timer'] = time();
 }
 $_SESSION['t'] = $now -$_SESSION['timer'];
