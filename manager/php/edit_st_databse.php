<?php

$db = new mysqli("localhost","root","","school");

$id=$_POST["id"];
$full_name=$_POST["full_name"];
$email=$_POST["email"];
$number=$_POST["number"];
$pass=$_POST["pass"];
$std_class=$_POST["std_class"];
$std=$_POST["std"];
$addess=$_POST["address"];
$data = $db->query("SELECT student_id FROM admission WHERE student_id='$std' ");
if ($data->num_rows!=0) {
    echo "this studeny id already exist try new";
}
else{


$data=$db->query("UPDATE admission SET full_name='$full_name',email='$email',mobile='$number',password='$pass',class='$std_class',student_id='$std',address='$addess' WHERE id='$id'");
if ($data===TRUE) {
    echo"update succes";
}
else{
    echo "something went wrong";
}
}
?>