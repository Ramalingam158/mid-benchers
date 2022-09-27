<?php
include_once"includes/db.php";

$id = $_GET['id'];

$sql = "DELETE FROM teachers WHERE id = '$id'";
$res = mysqli_query($conn, $sql);

if($res)
{
    ?>
<script type="text/javascript">
    window.location = "teacher_list.php";
</script>
    <?php
}

?>