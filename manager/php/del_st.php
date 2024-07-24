<?php
$db = new mysqli("localhost","root","","school");
$id =$_POST["id"];
$data =$db->query("DELETE FROM admission WHERE id='$id'");
if ($data===TRUE) {

    $db->query("SET @num:=0");
    $db->query("UPDATE admission SET id =@num:=(@num+1)");
    $db->query("ALTER TABLE admission AUTO_INCREMENT =1");
echo"deleted";

}
else{


echo "somthing wrong";
}

?>