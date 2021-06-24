<?php

$connection = mysqli_connect("localhost","admin","becode");
$db = mysqli_select_db($connection,"sms");
$query ="INSERT INTO sms.students VALUES (NULL,$_POST[roll_no],'$_POST[name]','$_POST[class]','$_POST[mobile]','$_POST[email]','$_POST[password]','$_POST[remark]')";

// if it doesn't print the error and nothing added to DB so just echo the query. OR run query in DB and it4ll show the error as well.
//echo $query;
$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Student Added Successfully");
    window.location.href ="admin_dashboard.php";
</script>
