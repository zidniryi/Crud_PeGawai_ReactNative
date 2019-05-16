<?php
 
// Importing DBConfig.php file.
include 'DBConfig.php';
 
// Connecting to MySQL Database.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 $S_Name = $obj['pegawai_nama'];
 
 // Populate pegawai from JSON $obj array and store into $S_Class.
 $S_Class = $obj['pegawai_gaji'];
 
 
 // Creating SQL query and insert the record into MySQL database table.
 $Sql_Query = "insert into pegawai (pegawai_nama ,pegawai_gaji ) values ('$S_Name','$S_Class')";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
 // If the record inserted successfully then show the message.
$MSG = 'Record Successfully Inserted Into MySQL Database.' ;
 
// Converting the message into JSON format.
$json = json_encode($MSG);
 
// Echo the message.
 echo $json ;
 
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>