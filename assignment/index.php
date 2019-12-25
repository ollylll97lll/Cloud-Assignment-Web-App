<?php
include_once("Home.html");
$hostname = 'localhost';
$database = 'cloudweb_db';
$username = 'root';
$password = '';

//opening conneection
$conn = new mysqli ($hostname, $username, $password, $database);
//check connection
if ($conn->connect_error) {
  die($conn->connect_error);
}

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];

  if (isset($_POST['nweb'])) $nweb = true;  else $nweb = false;
  if (isset($_POST['hemp'])) $hemp = true;  else $hemp = false;
  if (isset($_POST['info'])) $info = true;  else $info = false;

$reference = $_POST['reference'];
$question = $_POST['question'];

$query = "INSERT INTO consult(fname, lname, email, phone, createweb, hire, moreinfo, reference, questions)
VALUES('$fName', '$lName', '$Email', '$Phone', '$nweb', '$hemp', '$info', '$reference', '$question')";

$results = $conn->query($query);

//echo "string";
if(!$results){
  echo " insert failed"."<br/>";
}
else {
  echo " insert successfully"."<br/>";
}

$query = "select * from consult";
$results = $conn->query($query);

if (!$results) {
  echo " select error";
}

while ($row = mysqli_fetch_array($results)) {
  echo
  $row['id']." ".$row['fname']." ".$row['lname']." ".$row['email']." ".$row['phone']."<br/>";
}
$conn --> close();
?>
