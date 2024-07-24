<?php
 $db = new mysqli("localhost","root","","school");
$email=$_POST["email"];

$check=$db->query("SELECT * FROM admission WHERE email ='$email'");
if ($check->num_rows!=0) {
 $aa= $check->fetch_assoc();
 $admission_fees=$aa["admission_fees"];
 $admission_pending_fees=$aa["paid_admission_fees"];
 if ($admission_fees>$admission_pending_fees) {
    $pending=$admission_fees-$admission_pending_fees;
   echo $pending;
 }
}

?>