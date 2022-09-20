<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      KIKA HOSPITAL
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tablestyle.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  </head>
  <body>
    <!-- Header -->

    <header class="primary-header container group">

      <h1 class="logo">
        <a href="index.html">KIKA<br>HOSPITAL</a>
      </h1>
      <nav class="nav primary-nav">
        <ul>
          <li><a href="index.html">HOME</a></li><!--
          --><li><a href="doctors.html">DOCTORS</a></li><!--
          --><li><a href="appointment.php">APPOINTMENT</a></li><!--
          --><li><a href="contact.html">LOCATION & CONTACT</a></li><!--
          --><li><a href="doctorlogin.html">LOGIN</a></li>
        </ul>
      </nav>

    </header>
    <!-- Lead -->

    <section class="row-alt">
      <div class="lead container">

        <h1>Your Appointments </h1>
      </div>
    </section>
    <section class="tablesection">
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
        //login
        $email=$_POST['email'] ?? "";
        $password=$_POST['pass'] ?? "";
        $sql = "SELECT doctors.id , doctors.name , doctor_login.emailid  , doctor_login.pass\n"

          . "FROM doctors JOIN doctor_login on doctors.id=doctor_login.docid;";

        $docrec = mysqli_query($con,$sql);

        while($data = mysqli_fetch_array($docrec))
        {
           if($email==$data['emailid'] && $password==$data['pass'])
           {
             $doc_match_name = $data['name'];

             $query_join ="SELECT first_name, middle_name, last_name , gender, blood_group,date_of_ap,timeslot_id,symptoms FROM appointments WHERE doc_name ='".$doc_match_name."';";

             $result = mysqli_query($con,$query_join);
            /*if($con->query($query_join))
             {
                 echo "Done";
             }
             else
             {
                 echo "Error";
             }*/

           }

        }
         $con->close();
      ?>
      <table class="tablemain">
        <thead>
          <tr>
            <th>FIRST NAME</th>
            <th>MIDDLE NAME</th>
            <th>LAST NAME</th>
            <th>GENDER</th>
            <th>BLOOD GROUP</th>
            <th>DATE OF APPOINTMENT</th>
            <th>TIME SLOT</th>
            <th>SYMPTOMS</th>
          </tr>
        </thead>
        <tbody>
          <?php
                while($row = mysqli_fetch_assoc($result))
                {

                  echo
                    "<tr>
                      <td>{$row['first_name']}</td>
                      <td>{$row['middle_name']}</td>
                      <td>{$row['last_name']}</td>
                      <td>{$row['gender']}</td>
                      <td>{$row['blood_group']}</td>
                      <td>{$row['date_of_ap']}</td>
                      <td>{$row['timeslot_id']}</td>
                      <td>{$row['symptoms']}</td>
                    </tr>";
                }
          ?>
        </tbody>

      </table>

    </section>
    <!-- Footer -->

    <footer class="primary-footer container group">

      <small>&copy; KIKAHOSPITAL</small>

      <nav class="foot-nav primary-nav">
        <ul>
          <li><a href="index.html">HOME</a></li><!--
          --><li><a href="doctors.html">DOCTORS</a></li><!--
          --><li><a href="appointment.php">APPOINTMENT</a></li><!--
          --><li><a href="contact.html">LOCATION & CONTACT</a></li><!--
          --><li><a href="doctorlogin.html">LOGIN</a></li>
        </ul>
      </nav>

    </footer>
  </body>
</html>
