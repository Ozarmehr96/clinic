<?php

 function __autoload($class_name)
 {
     $array_path = array(
         '/components/',
         '/models/',
     );
     foreach ($array_path as $class_dorectory)
     {
         $path = ROOT.$class_dorectory.$class_name.".php";
         if (file_exists($path))
         {
             require_once ($path);
         }
     }
 }