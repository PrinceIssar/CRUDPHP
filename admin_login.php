<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Login </title>
</head>
<body>
<div class="container">
    <h3>Admin Login Page</h3><br>
<!--    if you leave blank the action it'll stay on the same page-->
    <form action="" method="post">
       Email: <input class="email" type="email" name="email" required><br><br>
        Password : <input type="password" name="password" required><br><br>
        <input type="submit" name="submit">
    </form><br>
    <?php
    // we create a session so that it can save and show in browser
    session_start();

    if (isset($_POST['submit'])){
      $connection = mysqli_connect("localhost","admin","becode");
      $db = mysqli_select_db($connection,"sms");
      $query = "SELECT * FROM sms.login WHERE email = '$_POST[email]'";
      $query_run = mysqli_query($connection,$query);
      while ($row = mysqli_fetch_assoc($query_run)){
        if ($row['email']== $_POST['email']){
            if ($row['password']== $_POST['password']){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];

                header("Location: admin_dashboard.php");
            }
            else
            {
                echo 'wrong password';
            }

        }
        else{
            echo 'wrong email';
        }
      }
    }
    ?>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
