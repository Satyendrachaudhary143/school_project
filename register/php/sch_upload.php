<?php
//error_reporting(0);


// conection database
if($_SERVER['REQUEST_METHOD']=="POST"){


$db = new mysqli("localhost","root","","school");

// recieve file data
$adhar_card= $_FILES["adhar_card"];
$man_photo= $_FILES["photo"];
$pan_card =$_FILES["pan_card"];
// adhar card
$adhar_name=$adhar_card["name"];
$adhar_location=$adhar_card["tmp_name"];
//manager photo
$photo_name=$man_photo["name"];
$photo_location=$man_photo["tmp_name"];
//pan_card
$pan_name=$pan_card["name"];
$pan_location=$pan_card["tmp_name"];

// recieve text data
$category=$_POST["category"];
$school_name=$_POST["manager_school"];
$manager_name=$_POST["manager_name"];
$school_board=$_POST["board"];
$medium=$_POST["medium"];
$email=$_POST["email"];
$password=$_POST["password"];
$mobile_no=$_POST["mobile_no"];
$pin_code=$_POST["pin_code"];
$address=$_POST["address"];

$otp = random_int(100000, 999999);



 

//check
$adhar_ch;
$pan_ch;
$photo_ch;


// otp verification

// $check = mail("satyendrachaudhary38@gmail.com","Activation code","Thanks for using miptech your otp is : ".$verification_otp,"from:iamhindu.satyendra@gmail.com");
// if ($check) {
  // adhar card move/upload
$file_m=move_uploaded_file($adhar_location,"../document/adhar_card/".$adhar_name);
if($file_m){
    $adhar_ch="true";
}
else{
    echo"false";
}
//photo move/upload
$file_m=move_uploaded_file($photo_location,"../document/photo/".$photo_name);
if($file_m){
    $photo_ch="true";
}
else{
    echo"false";
}

// pan card move/upload

$file_m=move_uploaded_file($pan_location,"../document/pan_card/".$pan_name);
if($file_m){
    $pan_ch="true";
}
else{
    echo"false";
}
$check=$adhar_ch.$pan_ch.$photo_ch;
if($check=="truetruetrue"){
   
    $res=$db->query("INSERT INTO school_table(category, school_name, manager_name, adhar_card, photo, pan_card, board, mediun, email, password, address, pin_code, otp) VALUES ('$category','$school_name','$manager_name','$adhar_name','$photo_name','$pan_name','$school_board','$medium','$email','$password','$address','$pin_code','$otp')");

if($res===TRUE){
    
  echo "otpsendsuccessful";

}
else{
    echo "unsuccess";
}

}
else{
    echo"failed";
}
}

//  }
 



    
//     else{
        
//         echo"unsuccessfull";
//     }


    
?>