
<?php
include 'conn.php';
if(isset($_POST['signin'])){
	 $useremail = mysqli_real_escape_string($db, $_POST['emailz']);
     $pwd =       mysqli_real_escape_string($db, $_POST['pazzword']);
     //$pazzword =  password_hash($pwd, PASSWORD_DEFAULT);
	 //$decrypted_password = md5($password);
     //$query = "SELECT * FROM users WHERE user_email ='". $useremail."' AND user_pwd ='".$pazzword."'";
        $query = "SELECT * FROM users WHERE user_email = '$useremail'";
          $result=mysqli_query($db, $query);
        //  $fetch = mysqli_fetch_array($result);

        $resultCheck = mysqli_num_rows($result);

       if($resultCheck < 1){
        header("location: index.php?signin= Incorrect email");
        exit();
       }
       else{
//          dehashing the password
        if($row = mysqli_fetch_assoc($result)){
            $verifyResult = password_verify($pwd, $row['user_pwd']);

            if($verifyResult == false){
                header("location: index.php?signin= Incorrect details");
                exit();
            }
            elseif($verifyResult == true){
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['first'] = $row['user_first'];
                $_SESSION['last'] = $row['user_last'];
                $_SESSION['email'] = $row['user_email'];
                $_SESSION['uid'] = $row['user_uid'];
                $_SESSION['password'] = $row['user_pwd'];
                

                header("location: index.php?signin= Success");
                exit();

            }
        }

       }
}

else{
    header("location: index.php?signin=failed");
   // echo "<script>alert('Email already taken')</script>";
    exit(); 
}


