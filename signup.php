<?php

  if ( isset($_POST['sign_up_submit']))
  {
    //print_r($_POST);
    if ( !empty($_POST['patient_name']) && !empty($_POST['phone_number']) && !empty($_POST['address']) && !empty($_POST['age']) && !empty($_POST['blood_group'])&& !empty($_POST['password']) )
    {
        //echo 'submit hoise';
        // save values into variabel

        $patient_name = $_POST['patient_name'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $blood_group = $_POST['blood_group'];
        $password = $_POST['password'];

        //database connection

        $connection =  new mysqli('localhost','root','','hms');

        $sql ="INSERT INTO patient_info(patient_name, phone_number, address, age, blood_group, password) VALUES('$patient_name','$phone_number','$address','$age','$blood_group','$password') ";

        $connection -> query($sql);

        echo "
        <script type='text/javascript'>
            alert('Sign Up Successful!');
            location.assign('login.php');
        </script>
        ";
        



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

        <title>Sign Up</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                    <form action="" class="login__registre" id="login-in" method="POST">
                        <h1 class="login__title">Patient Registration</h1>

                        <!-- Patient Name -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="patient_name" id="patient_name" placeholder="Patient Name" class="login__input" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" class="login__input" required>
                        </div>

                        <!-- Address -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="address" id="address" placeholder="Address" class="login__input" required>
                        </div>
                        <!-- age -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="number" min="0" name="age" id="age" placeholder="Age" class="login__input" required>
                        </div>
                        <!-- Blood Group -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="blood_group" id="blood_group" placeholder="Blood Group" class="login__input" required>
                        </div>
                        <!-- password -->
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" class="login__input" name="password" id="password" required>
                        </div>

                        
                        <!-- <a href="#" class="login__button">Sign In</a> -->
                        <input type="submit" name="sign_up_submit"  value="Sign Up" style="color: white; background-color: purple; padding: 10px 45px;">

                        <div>
                            <span class="login__account">Have an Account ?</span>
                            <!-- <span class="login__signin" id="sign-up">Sign Up</span> -->
                            <a href="login.php" class="login__signin" id="sign-up">Sign In</a><br>
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