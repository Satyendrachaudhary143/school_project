<?php
$db = new mysqli("localhost","root","","school");

$std=$_POST["std_id"];
$data = $db->query("SELECT student_id FROM admission WHERE student_id='$std' ");
if ($data->num_rows!=0) {
    echo "already exist";
}
else{
    echo "new";
}

?>