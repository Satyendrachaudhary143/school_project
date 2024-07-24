<?php
 $db = new mysqli("localhost","root","","school");
 $otp_user= $_POST["otp"];
 $email="satyendrachaudhary38@gmail.com";
 

 $data=$db->query("SELECT otp FROM school_table WHERE email='$email'");
 if($data->num_rows != 0){

 
 $aa=$data->fetch_assoc();
$otp=$aa["otp"];
if ($otp===$otp_user) {
    $update= $db->query("UPDATE school_table SET status='success'");
    if ($update===TRUE) {
echo"success";  
}
 }
}
 else{
    echo "false";
 }
 
     
  
 
?>