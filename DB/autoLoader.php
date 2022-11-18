<?php

spl_autoload_register(function ($className) {
  $path = "src/".str_replace("\\","/",$className).".php";
  include $path;
});

?>

