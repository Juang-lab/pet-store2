<?php
   
   include('../config/database.php');

   $fname = $_POST['f_name'];
   $lname = $_POST['l_name'];
   $email = $_POST['e_mail'];
   $passw = $_POST['p_assw'];

   
// INCRIPTAR CONTRASEÑA
   //$hashed_password = password_hash($passw, PASSWORD_DEFAULT);
   $hashed_password = $passw;
    
   $sql_validate_email ="
      select 
          COUNT(id) as total
      from
          users
      where email = '$email'
      and status = true
   ";
   
   $ans = pg_query($conn, $sql_validate_email);

   if($ans){

      $row = pg_fetch_assoc($ans);
       if($row['total'] > 0){
         
       echo "User already exists !!!";

       }else{
          $sql = "INSERT INTO users
          (firstname , lastname, email, password)
          VALUES ('$fname','$lname','$email','$hashed_password')
 
          ";

          $ans = pg_query($conn, $sql);
          if($ans){
          //echo "User has been created seccessfeully";
          echo "<script>alert('User has created. Go to login')</script>";
          header('Refresh:0;URL=http://localhost/pet-store2/src/login.html');
       }else{
           echo "Error";
         }
       }
      }else{
        echo "Query error";
      }
?>