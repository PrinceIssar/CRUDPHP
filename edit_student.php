<?php
$connection = mysqli_connect("localhost","admin","becode");
$db = mysqli_select_db($connection,"sms");
$query = "UPDATE sms.students set roll_no= '$_POST[roll_no]',name='$_POST[name]',class='$_POST[class]',
                         mobile='$_POST[mobile]',email='$_POST[email]',password='$_POST[password]',remark='$_POST[remark]' WHERE roll_no=$_POST[roll_no]";
$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Details Edited Successfully");
    window.location.href ="student_dashboard.php";
</script>