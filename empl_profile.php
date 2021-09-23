<?php
session_start();

if ( isset($_SESSION['employee_id']))
{
    //echo 'ekhane ashce if er vitore';
    $employee_id = $_SESSION['employee_id'];

    //database connection

    $connection =  new mysqli('localhost','root','','hms');

    $sql =" SELECT * FROM employee WHERE id = '$employee_id'";


    $data = $connection -> query($sql);

    $values = $data->fetch_assoc();

    $name = $values['name'];
    $id = $values['id'];
    $salary = $values['salary'];
    $role = $values['role'];
    $phone_number = $values['phone_number'];
    $join_date = $values['join_date'];
    $password = $values['password'];

    //print_r($values);

    if ( isset($_POST['prescription_submit']))
    {
        //print_r($_POST);
        //print_r($_FILES);
        if ($_POST['first_patient_id']==$_POST['second_patient_id'])
        {
            $id = $_POST['first_patient_id'];

            // patient id check

            $sql =" SELECT * FROM patient_info WHERE id = '$id'";


            $data = $connection -> query($sql);

            if ( !$data-> num_rows== 1)
                {
                    echo "   <script> alert('Invalid Patient ID') </script> ";
                    //usleep(60000000);
                    //header('location:empl_profile.php');
                }
            else{

                $file_name = $_FILES['prescription']['name'];
                $file_type = $_FILES['prescription']['type'];
                $file_temp_name = $_FILES['prescription']['tmp_name'];
                //$file_name = $_FILES['name'];
                $amount = 500;

                $file_unique_name = md5(time().rand()).$file_name;
                //echo $file_type;

                if ( $file_type=='application/pdf')
                {
                    move_uploaded_file($file_temp_name, 'assets/prescription/'.$file_unique_name );

                    $sql ="INSERT INTO prescription (file_name,doctor_id,patient_id,payment_amount) VALUES ('$file_unique_name', '$employee_id',
            '$id','$amount')";

                    //echo $sql;

                    $connection -> query($sql);

                    echo "   <script> alert('File Upload Successful!') </script> ";
                }
                else
                {
                    echo "   <script> alert('Upload PDF file only!') </script> ";
                }
            }


        }
        else{

            echo "   <script> alert('Patient ID not matched!') </script> ";
            //header('location:empl_profile.php');
        }






    }



}
else{
    header('location:empl_login.php');
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
                                <img src="assets/img/doc.jpg" alt="Maxwell Admin">
                            </div>
                            <h5 class="user-name"><?php echo $name; ?></h5>
                            <h6 class="user-email"><?php echo $phone_number; ?></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <p>I'm <?php echo $name; ?>. Employee of Limon's Hospital.  Hospital Address:
                                Badda Dhaka Bangladesh.  </p>
                        </div>
                        <div class="footer-links text-center">
                            <a href="logout.php" class="btn btn-primary">Logout</a>
                            <a href="index.php" class="btn btn-primary">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Patient Name</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $name; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Phone Number</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $phone_number; ?>" disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Role</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $role; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Salary</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $salary; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Join Date</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $join_date; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Current Password</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $password; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Address</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $address; ?>" disabled>
                            </div>
                        </div>-->
                        <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                            </div>
                        </div>


                    </div>-->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Employee Id</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <!--<label for="Street">Address</label>-->
                                <input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $id; ?>" disabled>
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
                            <h6 class="mt-3 mb-2 text-primary">Upload Prescription</h6>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Patient ID</label>
                                    <input type="text" class="form-control" name="first_patient_id" placeholder="Enter Patien ID" required>
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Patient ID</label>
                                    <input type="text" class="form-control" name="second_patient_id" placeholder="Again Enter Patient ID" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Prescription</label>
                                    <input type="file" class="form-control-file" name="prescription" required>
                                </div>
                                <div class="form-group">

                                    <input type="submit" class="btn btn-primary text-center" name="prescription_submit" value="Submit">
                                </div>


                            </form>
                        </div>

                    </div>

                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Prescription History</h6>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">PDF</th>
                                    <th scope="col">Issued Date</th>
                                    <th scope="col">Patient Id</th>
                                    <th scope="col">Payment Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql =" SELECT * FROM prescription WHERE doctor_id = '$employee_id' ORDER BY created_at DESC ";


                                $data = $connection -> query($sql);

                                $i =1 ;



                                while ( $values = $data->fetch_assoc()){

                                //print_r($values);
                                $pdf_link = $values['file_name'];
                                $payment_status = $values['payment_status'];
                                $issued_date = $values['created_at'];
                                $patient = $values['patient_id'];
                                ?>
                                    <tr>
                                        <td> <?php echo $i++; ?>  </td>
                                        <td><a  href="download.php?path=assets/prescription/<?php echo $pdf_link ; ?> " >PDF</a></td>
                                        <td><?php echo $issued_date; ?></td>
                                        <td><?php echo$patient; ?></td>
                                        <td><?php echo$payment_status; ?></td>
                                    </tr>

                                <?php

                                }
                                ?>



                                </tbody>
                            </table>
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