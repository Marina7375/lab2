<?php
session_start();

$users = array(
 array('name' =>'Афанасий' ,'surname'=>'Антонов','login' => 'afan', 'password' => '12346', 'lang' => 'ru' ,'rol'=>'client'),
 array('name' =>'Данило' ,'surname'=>'Данилевский','login' => 'dan1', 'password' => '33333', 'lang' => 'ru','rol'=>'manager'),
 array('name' =>'Мария' ,'surname'=>'Хребцова','login' => 'masha_12', 'password' => '22222', 'lang' => 'en' ,'rol'=>'admin'),
 array("name" =>'Инокендий' ,'surname'=>'Смирнов','login' => 'kesha', 'password' => '12345','lang' => 'ru','rol'=>'client' ),
 array('name' =>'Сергей','surname'=>'Васильев','login' => 'sergey_vas', 'password' =>'33334','lang' => 'ua','rol'=>'manager' ),
 array( 'name' =>'Анна' ,'surname'=>'Костылёва','login' => 'a_kost', 'password' => '12347','rol'=>'client') 
);
    // echo $users [0]['name'].$users [0]['password'];

  // for($i=1;$i<5;$i++)
foreach ($users as $item) {

 if($_POST["password"]==$item['password']&&$_POST["login"]==$item['login']){

   $_SESSION['rol']=$item['rol'];
   $_SESSION['name']=$item['name'];
   $_SESSION['surname']=$item['surname'];
   $_SESSION['lang']=$item['lang'];
   $_SESSION['login']= $item['login'];
   $_SESSION['password']= $item['password'];
 }

}
require_once 'class.php';


if(empty($_POST["login"])&&empty($_POST["password"])&&empty($_SESSION['login']))
  {//echo "Данные введены не верно!";
header("Location: index.php");         
}
elseif(empty($_SESSION['lang'])){
 $_SESSION['lang'] = 'ru';
 header("Location: lang.php");
}

else switch ($_SESSION['rol']) {

  case 'client':
  header("Location: client.php");
  break;
  
  case 'admin':
  header("Location: admin.php");
  break;
  
  
  case 'manager':
  header("Location: manager.php");
  break;
}


?>
