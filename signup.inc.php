<?php
  
    include 'conn.php';
    if(isset($_POST['signup'])){
       
        $first = mysqli_real_escape_string($db,$_POST['first']);
        $last = mysqli_real_escape_string($db,$_POST['last']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $uid = mysqli_real_escape_string($db,$_POST['uid']);
        $pwd = mysqli_real_escape_string($db,$_POST['pazz']);
        $pw2 = mysqli_real_escape_string($db,$_POST['repass']);

        //checking for errors : emptyfield
        if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($pw2)){
            header("location: index.html?signup=empty");
            exit();
        }
        //checking for errors : validity of entries
        else{
           //checking for errors : validity of entries
           if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)){
            header("location: index.html?signup=invalidentries");
            exit();
           }  
           else{
               //checking for errors : validity of email
               if(!filter_var ($email,FILTER_VALIDATE_EMAIL)){
                header("location: index.html?signup=invalid email");
                exit(); 
               }else{
                   //checking for errors : existence of user_id
                   $sql = "SELECT * FROM users WHERE user_uid ='$uid'";
                   $result = mysqli_query($db, $sql);
                   $resultChecker = mysqli_num_rows($result);
                      if($resultChecker > 0){
                          header("location: index.html?signup=taken username");
                          echo "<script>alert('Username already exist')</script>";
                          exit(); 
                        
                      }else{
                            //checking for errors : existence of email
                   $sql = "SELECT * FROM users WHERE user_email ='$email'";
                   $result = mysqli_query($db, $sql);
                   $resultChecker = mysqli_num_rows($result);
                      if($resultChecker > 0){
                          header("location: index.html?signup=taken Email");
                          echo "<script>alert('Email already taken')</script>";
                          exit(); 
                        //checking for errors : protecting the password
                      }else{
                        $pazzword = password_hash($pwd, PASSWORD_DEFAULT);
                        $uppercase = preg_match('@[A-Z]@', $pwd);
                        $lowercase = preg_match('@[a-z]@', $pwd);
                        $number    = preg_match('@[0-9]@', $pwd);
                        $specialChars = preg_match('@[^\w]@',$pwd);
        
        if(!$uppercase || !$lowercase || !$number || 
        !$specialChars || strlen($pwd) < 8) {
            echo 'Password should be at least 8 characters in length and 
            should include at least one upper case letter, one number, and one special character.';
            // confirming the password
        
          
        
        
        
        }else{
            if($pwd === $pw2){
                echo 'Strong password.';
                // inserting data into database
                $sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) 
                VALUES('$first', '$last', '$email', '$uid', '$pazzword');";
                 mysqli_query($db, $sql);
                header("location: index.html?signup=success");
                exit();
            }
            else{
                //echo 'failed';
                header("location: index.html?signup=failed");
                exit();
            }
                    }
                  
    
    }

               
                        }
        
               }

           }
        }
    }
    else{
        header("location: index.html?signup=error");
        exit();
    }
    ?>

    