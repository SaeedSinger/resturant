<?php

   include "connection.php";

   // Routes
   
   $tpl  = 'templates/';  // Template Directory
   $css  = 'layout/css/'; // CSS Directory
   $js   = 'layout/js/'; // js Directory
   
   
   
   // Include Important Files
   

   include $tpl  . 'header.php';
   
   // Include Navbar On All Pages Except The One With $noNavbar Variable
   
   if(!isset($noNavbar))
   {
     include $tpl . 'navbar.php';
   }
