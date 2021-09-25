<?php

session_start();

if ( isset($_SESSION['profile_id']))
{
    //echo 'ekhane ashce if er vitore';
    $login_id = $_SESSION['profile_id'];

    //database connection

    $connection =  new mysqli('localhost','root','','hms');

    $sql =" SELECT * FROM patient_info WHERE id = $login_id";

    $data = $connection -> query($sql);


    $values = $data->fetch_assoc();

    $name = $values['patient_name'];
    $id = $values['id'];
    $phone_number = $values['phone_number'];
    $address = $values['address'];
    $age = $values['age'];
    $blood_group = $values['blood_group'];
    $password = $values['password'];


    // update values check
    if ( isset($_POST['update_form_submit']))
    {
        //print_r($_POST);

        if ( !empty($_POST['fullName']) && !empty($_POST['phone_number']) &&!empty($_POST['age']) &&!empty($_POST['blood_group']) &&
            !empty($_POST['password']) &&!empty($_POST['address']) )
            {
                $login_id = $_SESSION['profile_id'];
                $name = $_POST['fullName'];
                $phone_number = $_POST['phone_number'];
                $age = $_POST['age'];
                $blood_group = $_POST['blood_group'];
                $password = $_POST['password'];
                $address = $_POST['address'];

                date_default_timezone_set('Asia/Dhaka');
                $dt = date('Y-m-d h:i:s');

                $sql ="UPDATE patient_info SET phone_number = '$phone_number' ,address= '$address', age ='$age',
                blood_group ='$blood_group', password='$password', updated_at='$dt'    WHERE  id ='$login_id'";

                //echo $sql;

                $connection -> query($sql);

                header('location:profile.php');













            }

    }

}
else{
    header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                            </div>
                            <h5 class="user-name"><?php echo $name; ?></h5>
                            <h6 class="user-email"><?php echo $phone_number; ?></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <p>I'm <?php echo $name; ?>. Patient of xyz Hospital.  Hospital Address:
                                Badda Dhaka Bangladesh.  </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <form method="POST" >


            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Patient Name</label>
                                <input type="text" style="font-weight: bold;" class="form-control" name="fullName" id="fullName" value="<?php echo $name; ?>" >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Phone Number</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" >
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Age</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="age" name="age" value="<?php echo $age; ?>" >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Blood Group</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="blood_group" name="blood_group" value="<?php echo $blood_group; ?>" >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Current Password</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="password" name="password" value="<?php echo $password; ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <!--<label for="Street">Address</label>-->
                                <input type="text" style="font-weight: bold;" class="form-control" id="address" name="address" value="<?php echo $address; ?>" >
                            </div>
                        </div>
                        <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                            </div>
                        </div>-->


                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Patient Id</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <!--<label for="Street">Address</label>-->
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $id; ?>" disabled >
                            </div>
                        </div>

                        <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                            </div>
                        </div>-->


                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <input type="submit" name="update_form_submit" value="Submit" class="btn btn-success">

            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #ff99cc;
        position: relative;
        height: 100%;
        font-weight: bold;
    }
    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }
    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }
    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }
    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }
    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }
    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }
    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }
    .account-settings .about p {
        font-size: 0.825rem;
    }
    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }


</style>

<script type="text/javascript">


</script>
</body>
</html>