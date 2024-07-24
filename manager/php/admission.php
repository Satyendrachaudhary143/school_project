<?php
 $db = new mysqli("localhost","root","","school");

$first_name= $_POST["first"];
$last_name=$_POST["last"];
$full_name=$first_name." ".$last_name;
$class = $_POST["class"];
$password=$_POST["password"];
$student= $_POST["student_id"];
$address=$_POST["address"];
$email=$_POST["email"];
$number=$_POST["number"];
$addmission_fees=$_POST["admission_fees"];
$tution_fees=$_POST["tution_fees"];
$other_fees=$_POST["other_fees"];

$check =$db->query("SELECT * FROM admission WHERE email ='$email'");

if($check->num_rows==0){
   $data = $db->query("INSERT INTO admission(full_name, email, mobile, password, class, student_id, address, admission_fees, tution_fees, other_fees) VALUES ('$full_name','$email','$number','$password','$class','$student','$address','$addmission_fees','$tution_fees','$other_fees')");
   echo "insert";
}

else{
   echo "email already exist";
 


}

?>