<?php
//connect
require_once("connection.php");
//specify
$id = $_POST['id']; //comes from input

$sql = "UPDATE booking SET status='Attended' WHERE id=$id";

//do it (get the records)
$result = mysqli_query($conn, $sql);

if($result){
?>
<script>
function delete()
{
    document.getElementsByClassName("submit").disabled = true;
}
</script>
<?php
header("location:view_booking.php");
}else{
    echo "ERROR: Could not execute $sql" . mysqlierror($conn);
}
?>