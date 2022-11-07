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
                    //check if file exisits
                    if(file_exists("users.csv.php")){
                    //opening file
                    $fu = file_get_contents('users.csv.php');
                    //check if email already exisits
                    if (strpos($fu, $email) !== false) {
                        return 'You have entered an already registered Email.';
                    }
                    }
                    //creating new user array
                    $user_add = array(
                        [$email,password_hash($pass,PASSWORD_DEFAULT)]
                    );
                    $fu =fopen('users.csv.php','a');
                    //writing to file
                    foreach ($user_add as $fields) {
                        fputcsv($fu, $fields,';');
                    }
                    fclose($fu);
                    return 'User account created successfully!!';
                    
            }
        }
    }
    // sigin in user
    static function signin($email,$pass){
        //check if file exisits 
        if (!file_exists('users.csv.php')) die ('The user.csv.php file does not exist');
        //user details array
        $userdetail=[];
        //open file 
        if (($fu = fopen('users.csv.php', 'r')) !== FALSE) {
            while (($data = fgetcsv($fu, 1000, ";")) !== FALSE) {
                $userdetail[]= $data;
            }
            fclose($fu);
        }
        //read file
        $fileuser = file_get_contents('users.csv.php');
        if (strpos($fileuser, $email) !== false) {
            for($x=0; $x<=count($userdetail)-1; $x++) {
                // verify detials
                if(password_verify($pass, $userdetail[$x][1]) !== false) {
                    //set session to logged in
                    $_SESSION['logged']=true;
                    $_SESSION['info']=$userdetail[$x];
                    return "You have successfully logged in to the website.";
                }
            }
        }
    }

//signing out user
    static function signout(){
        //check if not logged in
        if($_SESSION['logged']==false) {
            return "Not Logged IN";
        }
        //check if logged in
        if ($_SESSION['logged']==true) {
            //set session to logged out
            $_SESSION['logged']=false;
            return "Signed Out";
        }
    }
    static function is_logged(){
         //set session to logged in
        if(isset($_SESSION['logged'])) {
                    //set session to logged in
            if ($_SESSION['logged']==true) {
                return $_SESSION['info'];
            }
            else {
            return "Not Logged IN";
            }
        }
    }

}