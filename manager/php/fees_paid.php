<?php
 $db = new mysqli("localhost","root","","school");
$st_class=$_POST["st_b"];
$name=$_POST["st_name"];
$email=$_POST["email"];
$type=$_POST["cat"];
$amount=$_POST["amt"];
$st_id=$_POST["st_id"];
$ful_name="";
$name=$db->query("SELECT * FROM admission WHERE email= '$email'");
if ($name->num_rows!=0) {
   $aa= $name->fetch_assoc();
  $ful_name= $aa["full_name"];

}
echo$ful_name;


// $data=$db->query("INSERT INTO fees(student_id, full_name, email, amount, paid, pending, fees_type) VALUES ('$st_id','','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')");


?>