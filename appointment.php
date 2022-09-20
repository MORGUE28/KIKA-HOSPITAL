<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      KIKA HOSPITAL
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="refresh" content="60">
  </head>
  <body>
    <!-- Header -->

    <header class="primary-header container group">

      <h1 class="logo">
        <a href="main.html">KIKA<br>HOSPITAL</a>
      </h1>
      <nav class="nav primary-nav">
        <ul>
          <li><a href="main.html">HOME</a></li><!--
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

        <h1>Set an Appoinment</h1>

        <p>Get in touch with our best doctors.</p>

      </div>
    </section>
    <!--form-->
      <section class="appointment">
        <form  action="index.php" method="post">
          <div class="rowx">
            <div class="col-label">
              <label for="firstname">First Name</label>
            </div>
            <div class="col-box">
              <input type="text" name="firstname" placeholder="Your First Name">
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="middlename">Middle Name</label>
            </div>
            <div class="col-box">
              <input type="text" name="middlename" placeholder="Your Middle Name">
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="lastname">Last Name</label>
            </div>
            <div class="col-box">
              <input type="text" name="lastname" placeholder="Your Last Name">
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="gender">Gender</label>
            </div>
            <div class="col-box">
            <select id="gender" name="gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="blood">Blood Group</label>
            </div>
            <div class="col-box">
            <select id="blood" name="blood">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
            </select>
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="date">Appointment Date</label>
            </div>
            <div class="col-box">
              <input type="date" name="date" placeholder="DD/MM/YYYY">
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="doc">Doctor Name</label>
            </div>
            <div class="col-box">
            <select id="doc" name="doc">
              <option value="doc">--Select your Doctor-</option>
              <?php

                $con= new mysqli('localhost', 'root', '', 'kikahospital',3307);
                $docrec = mysqli_query($con,"SELECT name FROM doctors");

                while($data = mysqli_fetch_array($docrec))
                {
                  echo "<option value='".$data['name']."'>".$data['name']."</option>";
                }
                ?>
            </select>
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="timeslot">Time Slot</label>
            </div>
            <div class="col-box">
            <select id="timeslot" name="timeslot">
              <option value="display">--Select slot--</option>
              <?php
                $con= new mysqli('localhost', 'root', '', 'kikahospital',3307);
                $slotrec = mysqli_query($con,"SELECT * FROM timeslots");
                while($data = mysqli_fetch_array($slotrec))
                {
                  echo "<option value='".$data['id']."'>".$data['start_time']."-".$data['end_time']."</option>";
                }
              ?>
            </select>
            </div>
          </div>
          <div class="rowx">
            <div class="col-label">
              <label for="symptoms">Symptoms</label>
            </div>
            <div class="col-box">
              <textarea name="symptoms" rows="8" cols="80" placeholder="your symptoms"></textarea>
            </div>
          </div>
          <br>
          <div class="rowx">
            <button class="btn-100" name="Submit">Submit</button>
          </div>
        </form>

      </section>
    <!-- Footer -->

    <footer class="primary-footer container group">

      <small>&copy; KIKA HOSPITAL</small>

      <nav class="foot-nav primary-nav">
        <ul>
          <li><a href="main.html">HOME</a></li><!--
          --><li><a href="doctors.html">DOCTORS</a></li><!--
          --><li><a href="appointment.php">APPOINTMENT</a></li><!--
          --><li><a href="contact.html">LOCATION & CONTACT</a></li><!--
          --><li><a href="doctorlogin.html">LOGIN</a></li>
        </ul>
      </nav>

    </footer>
  </body>
</html>
