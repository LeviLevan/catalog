<?php
$p = getcwd();
echo 'Current Working Directory: ' . $p . "<br />";
echo 'Checking file_exists(' . $p . ') according to PHP ...';
if (file_exists($p)) { 
  echo ' Result: True';
} else {
  echo 'Result: False';
}
?>