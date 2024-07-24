<?php
$db = new mysqli("localhost","root","","school");
$email=$_POST["email"];
$check ="SELECT * FROM school_table";
$res=$db->query($check);
while ($aa=$res->fetch_assoc()) {
 if ($aa["email"]===$email) {
    echo"found";
 }
 else if ($aa["email"]!==$email) {
echo "new";
 }

}


?>