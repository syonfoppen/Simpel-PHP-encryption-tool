<?php
function encrypt($token, $key, $cipher) {
  $cipher_method = $cipher;
  $enc_key = openssl_digest($key, 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $crypted_token = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
  unset($token, $cipher_method, $enc_key, $enc_iv);
  return $crypted_token;
}

function decrypt($crypted_token, $key, $cipher) {
  list($crypted_token, $enc_iv) = explode("::", $crypted_token);
  $cipher_method = $cipher;
  $enc_key = openssl_digest($key, 'SHA256', TRUE);
  $token = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
  return $token;
}


 ?>
