<?php
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","klasicni_restoran");

$connection = mysqli_connect(HOST,USER,PASS,DB);

mysqli_set_charset($connection,"utf8");