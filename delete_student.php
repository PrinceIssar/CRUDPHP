<script type="text/javascript">
    if (confirm("Are you sure you want to delete data?")){
        // can't write directly php code in JS ubt you can write in doc.write
        document.write("<?php
        $connection = mysqli_connect("localhost", "admin", "becode");
        $db = mysqli_select_db($connection, "sms");
        $query = "DELETE FROM sms.students WHERE roll_no = $_POST[roll_no]";
        $query_run = mysqli_query($connection, $query);
        ?>");
            // it'll redirect after deleting to php file
        window.location.href = "admin_dashboard.php";
    }
    else {
        window.location.href = "admin_dashboard.php";
    }
</script>


