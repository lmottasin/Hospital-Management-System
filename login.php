<?php

session_start();
if (isset($_SESSION['profile_id']) )
{
    header('location:profile.php');
}

  if ( isset($_POST['login_form_submit']))
  {
    //print_r($_POST);
    if ( !empty($_POST['phone_number']) && !empty($_POST['password']) )
    {
       // echo 'submit hoise';
       $phone_number = $_POST['phone_number'];
       $password = $_POST['password'];

       //database connection

        $connection =  new mysqli('localhost','root','','hms');

        $sql ="SELECT * FROM patient_info WHERE phone_number='$phone_number' AND password='$password'";

        $data = $connection -> query($sql); 

         if ( $data -> num_rows ==1 )
        {       
            $values = $data-> fetch_assoc();

            //print_r ($values);

            //session_start();
           
            $_SESSION['profile_id'] = $values['id'];

            //echo $_SESSION['profile_id'];

            header("location:profile.php");
        }
        else 
        {
            echo "<script type='text/javascript'>
                alert('Wrong Phone Number or Password');
                location.assign('login.php');
            </script>";
            //header("location:login.php");
        }

    }
  }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Patient Log In</title>
    </head>
    <body>
        
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                    <form action="" class="login__registre" id="login-in" method="POST">
                        <h1 class="login__title">Patient Sign In</h1>
                        <!-- Phone Number -->
                        <div class="login__box_2">
                            <i class='bx bx-user login__icon'></i>
                            <input name="phone_number" id="phone_number" type="text" placeholder="Phone Number" class="login__input" required>
                        </div>
                        <!-- Password -->
                        <div class="login__box_2">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input name="password" id="password" type="password" placeholder="Password" class="login__input" required>
                        </div>

                        <a href="#" class="login__forgot">Forgot password?</a>

                        <!-- <a href="#" class="login__button">Sign In</a> -->
                        <input type="submit" style="color: white; background-color: purple; padding: 10px 45px;" name="login_form_submit" value="Log In">

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <a class="login__signin" id="sign-up" href="signup.php">Sign Up</a><br>
                            <a href="index.php" class="login__signin" id="sign-up">Home</a>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>