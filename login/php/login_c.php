<?php

$db = new mysqli("localhost","root","","school");
$option=$_POST["select"];
$email=$_POST["email"];
$pass=$_POST["password"];
$ch_em =$db->query("SELECT * FROM school_table WHERE email='$email'");
if ($ch_em->num_rows != 0) {
    $data =$db->query("SELECT * FROM school_table WHERE email='$email'AND password='$pass'");
if($data->num_rows != 0){
    $ch_op =$db->query("SELECT * FROM school_table WHERE email='$email'");
    if ($ch_op->num_rows!=0) {
        $aa=$ch_op->fetch_assoc();
        $verification=$aa["verification"];
        $status=$aa["status"];
        if ($status==="pending") {
           echo "pending";
        }
        else if($verification!=="pending"){


            $upadte_v =$db->query("SELECT * FROM school_table WHERE email='$email'");
            $aaa=$upadte_v->fetch_assoc();
           $id= $aaa["id"];
           $update= $db->query("UPDATE school_table SET school_id='$id'");
    if ($update===TRUE) {
echo"success";  
}
                       

        }
        else if($verification==="pending"){
            echo "verificationpending";
        }
    }
   
}
else{
    echo "wrong";
}

}
else{
    echo"email is not register";
}



?>