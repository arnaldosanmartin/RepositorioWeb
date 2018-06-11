<?php
if(isset($_FILES['file'])){
  $file = $_FILES['file'];
  
  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_size = $file['size'];

  $file_ext = explode('.',$file_name);

  print_r($file_ext);
}