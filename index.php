<?php
  $server = "localhost:3307";
  $port = 3307;
  $username = "root";
  $password = "";
  $dbname = "kikahospital";
  $socket ="C:/xampp/mysql/mysql.sock";


  $con = mysqli_connect($server,$username,$password,$dbname,$port,$socket);

  if(!$con){
    die("connection failed due to ".mysqli_connect_error());
  }
  echo "connection successful";

  //For Appointments
   $first_name = $_POST['firstname'] ?? "";
   $middle_name= $_POST['middlename'] ?? "";
   $last_name = $_POST['lastname'] ?? "";
   $gender = $_POST['gender'] ?? "";
   $blood_group = $_POST['blood'] ?? "";
   $date_of_ap = $_POST['date'] ?? "";
   $doc_name = $_POST['doc'] ?? "";
   $timeslot_id = $_POST['timeslot'] ?? "";
   $symptoms = $_POST['symptoms'] ?? "";

  echo " successful";


   $sql =  "INSERT INTO `kikahospital`.`appointments` (`first_name`,`middle_name`,`last_name`,`gender`,`blood_group`,`date_of_ap`,
   `doc_name`,`timeslot_id`,`symptoms`)
   VALUES ('$first_name','$middle_name','$last_name','$gender','$blood_group','$date_of_ap','$doc_name','$timeslot_id','$symptoms');";

   if($con->query($sql))
   {
       echo "Done";
       header("Location:thanks.html");

   }
   else
   {
       echo "Error";
   }
   $con->close();


?>
