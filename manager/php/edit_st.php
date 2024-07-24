<?php
 $db = new mysqli("localhost","root","","school");

 $id =$_POST["id"];
 
 $data=$db->query("SELECT * FROM admission WHERE id = '$id'");
 $aa=$data->fetch_assoc();
echo json_encode($aa);
?>