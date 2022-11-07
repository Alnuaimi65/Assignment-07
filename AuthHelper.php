<?php

class AuthHelper{

    static function signup($email,$pass){          //function to sign up user
            // check if the fields are empty
            if (empty($email || empty($pass))) {
                return false;
            }
            else {
                // check if the email is valid
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo('You have entered invalid email!');
                }
                else{
                    if(file_exists("users.csv.php")){
                    $fu = file_get_contents('users.csv.php');
                    if (strpos($fu, $email) !== false) {
                        return 'You have entered an already registered Email.';
                    }
                    }
                    
                    $user_add = array(
                        [$email,password_hash($pass,PASSWORD_DEFAULT)]
                    );
                    $fu =fopen('users.csv.php','a');
                    foreach ($user_add as $fields) {
                        fputcsv($fu, $fields,';');
                    }
                    fclose($fu);
                    return 'User account created successfully!!';
                    
            }
        }
    }
    // add parameters
    static function signin($email,$pass){
        if (!file_exists('users.csv.php')) die ('The user.csv.php file does not exist');

        $userdetail=[];
        if (($fu = fopen('users.csv.php', 'r')) !== FALSE) {
            while (($data = fgetcsv($fu, 1000, ";")) !== FALSE) {
                $userdetail[]= $data;
            }
            fclose($fu);
        }
        $fileuser = file_get_contents('users.csv.php');
        if (strpos($fileuser, $email) !== false) {
            for($x=0; $x<=count($userdetail)-1; $x++) {
                if(password_verify($pass, $userdetail[$x][1]) !== false) {
                    $_SESSION['logged']=true;
                    $_SESSION['info']=$userdetail[$x];
                    return "You have successfully logged in to the website.";
                }
            }
        }
    }


    static function signout(){
        if($_SESSION['logged']==false) {
            return "Not Logged IN";
        }
        if ($_SESSION['logged']==true) {
            $_SESSION['logged']=false;
            return "Signed Out";
        }
    }
    static function is_logged(){
        if(isset($_SESSION['logged'])) {
            if ($_SESSION['logged']==true) {
                return $_SESSION['info'];
            }
            else {
            return "Not Logged IN";
            }
        }
    }

}