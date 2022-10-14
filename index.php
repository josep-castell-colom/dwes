<?php
function customError($errno, $errstr) {
  echo "<pre class='error'><b>Error:</b> [$errno] $errstr</pre>";
}

set_error_handler("customError");

function add_tags($tag, $content){
  return "<$tag>$content</$tag>";
}

require './index.view.php';
