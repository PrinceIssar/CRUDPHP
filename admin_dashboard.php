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
    <title>Admin DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="header">
    <!-- session is used to dynamically show the email and name once the user logs in   -->
    <h4><strong>Admin</strong><br> <em>Email:</em> <?php echo $_SESSION['email']; ?>  <strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>Name:</em> <?php echo $_SESSION['name']; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;  <a href="logout.php">LogOut</a> </h4>
    <span id="top_span"><marquee>Note :- Where is this line running!!</marquee></span>
    <div id="left_side"><br><br><br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input type="submit" name="search_student" value="Search Student">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit_student" value="Edit Student">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="add_new_student" value="Add New Student">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="delete_student" value="Delete Student">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="show_teachers" value="Show Teachers">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<div id="right_side"><br><br>
    <div id="demo">
<!--        search button -->
        <?php
           if (isset($_POST['search_student']))
           {
               ?>
        <center>
            <h4>Search the data:</h4><br>
            <form action="" method="post">
                Enter Roll No:
                <input type="text" name="roll_no">
                <input type="submit" name="search_by_roll_no_for_search" value="Search">
            </form>
        </center>
        <?php
           }
           if (isset($_POST['search_by_roll_no_for_search']))
           {
             $query = "SELECT * FROM sms.students WHERE roll_no = '$_POST[roll_no]' ";
             $query_run = mysqli_query($connection,$query);
             while ($row = mysqli_fetch_assoc($query_run)){
                 ?>
                <table>
                    <tr>
                        <td><b>Roll No:</b></td>
                        <td>
                            <input type="text" value="<?php echo $row['roll_no']
                            ;?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Name:</b></td>
                        <td>
                            <input type="text" value="<?php echo $row['name']
                            ;?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Class:</b></td>
                        <td>
                            <input type="text" value="<?php echo $row['class']
                            ;?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Mobile:</b></td>
                        <td>
                            <input type="text" value="<?php echo $row['mobile']
                            ;?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>E-mail:</b></td>
                        <td>
                            <input type="text" value="<?php echo $row['email']
                            ;?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Remark:</b></td>
                        <td>
                            <textarea cols="30" rows="3" disabled><?php echo $row['remark']
                                ;?></textarea>

                        </td>
                    </tr>
                </table>
        <?php
             }
           }
        ?>
        <!--        search button End -->

        <!--        Edit button -->
        <?php
        if (isset($_POST['edit_student']))
        {
            ?>
            <center>
           <h4>Edit the details:</h4><br>
                <form action="" method="post">
                    Enter Roll No:
                    <input type="text" name="roll_no">
                    <input type="submit" name="search_by_roll_no_for_edit" value="Search">
                </form>
            </center>

            <?php
        }
        if (isset($_POST['search_by_roll_no_for_edit']))
        {
            $query = "SELECT * FROM sms.students WHERE roll_no = '$_POST[roll_no]' ";
            $query_run = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_assoc($query_run)){
                ?>
<!--                    we need to save in database so need form tag-->
                <form action="admin_edit_student.php" method="post">
                    <table>
                        <tr>
                            <td><b>Roll No:</b></td>
                            <td>
                                <input type="text" name="roll_no" value="<?php echo $row['roll_no']
                                ;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td><b>Name:</b></td>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['name']
                                ;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td><b>Class:</b></td>
                            <td>
                                <input type="text" name="class" value="<?php echo $row['class']
                                ;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td><b>Mobile:</b></td>
                            <td>
                                <input type="text" name="mobile" value="<?php echo $row['mobile']
                                ;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td><b>E-mail:</b></td>
                            <td>
                                <input type="text" name="email" value="<?php echo $row['email']
                                ;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td><b>Password:</b></td>
                            <td>
                                <input type="text" name="password" value="<?php echo $row['password']
                                ;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td><b>Remark:</b></td>
                            <td>
                            <textarea cols="30" rows="3" name="remark" ><?php echo $row['remark']
                                ;?></textarea>

                            </td>
                        </tr><br>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="edit" value="Save"></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
        }
        ?>
        <!--        Edit button End -->
        <!--        Add button End -->
        <?php
        if (isset($_POST['add_new_student'])) {
            ?>
            <center><h4>Add the details:</h4></center>
            <form action="add_student.php" method="post">
            <table>
                <tr>
                    <td>Roll No:</td>
                    <td>
                        <input type="text" name="roll_no" required>
                    </td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text" name="name" required>
                    </td>
                </tr>
                <tr>
                    <td>Class:</td>
                    <td>
                        <input type="text" name="class" required>
                    </td>
                </tr>
                <tr>
                    <td>Mobile:</td>
                    <td>
                        <input type="text" name="mobile" required>
                    </td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>
                        <input type="text" name="email" required>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="text" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td>Remark:</td>
                    <td>
                        <textarea cols="30" rows="3" name="remark" > </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="add" value="Add Student"></td>
                </tr>
            </table>
            </form>
        <?php
        }
        ?>
        <!--        Add button End -->
<!--        Delete button-->
        <?php
        if (isset($_POST['delete_student'])){
            ?>
            <center>
                <h5>Enter to delete student</h5><br>
                <form action="delete_student.php" method="post">
                   Roll No : <input type="text" name="roll_no">
                    <input type="submit" name="search_by_roll_no_for_delete" value="Delete Student">
                </form>
            </center>
        <?php
        }
        ?>
        <!--        Delete button End-->
        <!--        Show teachers button End-->
        <?php
        if (isset($_POST['show_teachers'])){
            ?>
            <center>
                <h5>Teachers Details</h5>
                <table id="teacher_table">
                    <tr>
                        <td id="td"><b>ID:</b></td>
                        <td id="td"><b>Name:</b></td>
                        <td id="td"><b>Mobile:</b></td>
                        <td id="td"><b>Courses:</b></td>
                        <td id="td"><b>View Detail:</b></td>

                    </tr>
                </table>
            </center>
            <?php
            $connection = mysqli_connect("localhost","admin","becode");
            $db = mysqli_select_db($connection,"sms");
            $query = "SELECT * FROM sms.teachers";
            $query_run = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_assoc($query_run)){
                ?>
                    <center>
                        <table id="teacher_table">
                            <tr>
                                <td id="td"><?php echo $row['t_id']?></td>
                                <td id="td"><?php echo $row['name']?></td>
                                <td id="td"><?php echo $row['mobile']?></td>
                                <td id="td"><?php echo $row['courses']?></td>
                                <td id="td"><a href="https://www.youtube.com/watch?v=7Iumwmz_AVE " target="_blank">View Detail</a></td>
                            </tr>
                        </table>
                    </center>

           <?php
            }
        }
        ?>
        <!--        Show teachers button End-->
    </div>
</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>