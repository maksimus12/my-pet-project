<?php 
 $request = $_SERVER["REQUEST_URI"];
   
 switch ($request) {
     case '/users-db/src/':
     case '':
         require 'Views/home.php';
         break;
     case '/users-db/src/add':
         require 'Views/add.php';
         break;
     case '/users-db/src/database':
         require 'Views/database.php';
         break;
     default:
         require 'Views/404.php';
         break;
 }

?>