<?php

  /*
  |--------------------------------------------------------------------------
  | List of Special Characters
  |--------------------------------------------------------------------------
  */
return[
    'chars' => ' ',
    'alphabet' => '[^A-Za-z0-9?!]',
    'except'=> array('username','email', 'password', 'password_confirmation'),
];