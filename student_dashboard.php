<?php
session_start();
$connection = mysqli_connect("localhost","admin","becode");
$db = mysqli_select_db($connection,"sms");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="header">
    <!-- session is used to dynamically show the email and name once the user logs in   -->
    <h4><strong>Student</strong><br> <em>Email:</em> <?php echo $_SESSION['email']; ?> <strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>Name:</em> <?php echo $_SESSION['name']; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;  <a href="logout.php">LogOut</a> </h4>
    <span id="top_span"><marquee>Note :- Where is this line running!!</marquee></span>
    <div id="left_side"><br><br><br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input type="submit" name="show_details" value="Show Details">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit_details" value="Edit Details">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<div id="right_side"><br><br>
    <div id="demo">
        <!--        show details button -->
        <?php
        if (isset($_POST['show_details'])){
            $query = "SELECT * FROM sms.students WHERE email = '$_SESSION[email]'" ;
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <table>
                    <tr>
                        <td>
                            <b>Roll No:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['roll_no']?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['name']?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Class:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['class']?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Mobile:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['mobile']?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>E-mail:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['email']?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Password:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['password']?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Remark:</b>
                        </td>
                        <td>
                            <textarea name="" id="" cols="30" rows="3" disabled><?php echo $row['remark']?></textarea>
                        </td>
                    </tr>
                </table>
        <?php
            }
        }
        ?>
        <!--        Show details button End-->
        <!--        Edit student details button End-->
        <?php
        if (isset($_POST['edit_details'])){
            $query = "SELECT * FROM sms.students WHERE email= '$_SESSION[email]'";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <form action="edit_student.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <b>Roll No:</b>
                            </td>
                            <td>
                                <input type="text" name="roll_no" value="<?php echo $row['roll_no']?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Name:</b>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['name']?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Class:</b>
                            </td>
                            <td>
                                <input type="text" name="class" value="<?php echo $row['class']?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Mobile:</b>
                            </td>
                            <td>
                                <input type="text" name="mobile" value="<?php echo $row['mobile']?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>E-mail:</b>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $row['email']?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Password:</b>
                            </td>
                            <td>
                                <input type="text" name="password" value="<?php echo $row['password']?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Remark:</b>
                            </td>
                            <td>
                                <textarea name="remark" id="" cols="30" rows="3" ><?php echo $row['remark']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="save" value="Save"></td>
                        </tr>
                    </table>

                </form>
        <?php
            }
        }
        ?>
        <!--         Edit student details button End-->
    </div>
</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>

