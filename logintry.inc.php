
<?php
include 'conn.php';
if(isset($_POST['signin'])){
	 $username = mysqli_real_escape_string($db, $_POST['emailz']);
     $pwd = mysqli_real_escape_string($db, $_POST['pazzword']);
     $pazzword =  password_hash($pwd, PASSWORD_DEFAULT);
	// $pazzword = md5($pwd);
	 $query = "SELECT * FROM users WHERE user_email ='". $username."' AND user_pwd ='".$pazzword."'";
          $result=mysqli_query($db, $query);
          $fetch = mysqli_fetch_array($result);

            if(mysqli_num_rows($result)==1){
              $_SESSION['id'] = $fetch['user_id'];
              $_SESSION['username'] = $fetch['user_email'];
              $_SESSION['pwd'] = $fetch['user_pwd'];
              $_SESSION['firstname'] = $fetch['user_first'];
              $_SESSION['lastname'] = $fetch['user_last'];
              $_SESSION['uid'] = $fetch['user_uid'];
              
              echo "<script> alert('You are now Logged in') </script>"; 
              header("location: index.php?signin=successful");
              exit();
               }
            else{
                echo "<script>alert('Your password or email is incorrect, please try again!')</script>";
                header("location: index.php?signin= Incorrect details");
                exit();


            $username="";
            $pwd="";
            $pazzword="";
            //header('location:login.php');

            }
}
else{
    header("location: index.php?signin=failed");
    exit();
}
?>