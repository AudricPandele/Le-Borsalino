<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: http://localhost/le-borsalino-2019/");
   }
?>