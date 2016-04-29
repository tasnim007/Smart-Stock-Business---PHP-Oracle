<?php
 $c = oci_connect("system", "nightwish", "localhost/ORCL");
   if (!$c) {
     echo "Unable to connect: " . var_dump( oci_error() );
     die();
   }
?> 