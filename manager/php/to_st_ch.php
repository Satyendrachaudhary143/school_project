<?php
$db = new mysqli("localhost","root","","school");
$v=$_POST["v"];
$total_st_ch=0;

$data =$db->query("SELECT * FROM admission WHERE class='$v'");
if ($data->num_rows !=0) {
while($aa = $data->fetch_assoc()){
 $aa["id"];
 $total_st_ch=$total_st_ch+1;
}
echo $total_st_ch;
}
   ?>