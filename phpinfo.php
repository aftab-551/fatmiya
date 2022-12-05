<?php
  //phpinfo();

    $key = 'eshoppingstore!@#'; 
    $data = 'alope';
   $encryted_data = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($data), $data, MCRYPT_MODE_CBC, md5(md5($key)))); 

   echo $encryted_data;

?>