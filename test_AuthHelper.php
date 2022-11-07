<?php

require_once('AuthHelper.php');

// SIGNUP
 // create new user
echo '<pre>';print_r(AuthHelper::signup("abc@mail.com","123"));
 // create new user with same email
 echo '<pre>';print_r(AuthHelper::signup("abc@mail.com","123"));
// SIGN IN
echo '<pre>';print_r(AuthHelper::signin("abc@mail.com","123")); 
// LOGGED IN
echo '<pre>';print_r(AuthHelper::is_logged()); 
// SIGN OUT
echo '<pre>';print_r(AuthHelper::signout()); 
