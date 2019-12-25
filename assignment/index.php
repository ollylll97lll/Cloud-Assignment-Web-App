<?php
$hostname = 'localhost';
$database = 'web_designdb';
$username = 'root';
$password = '';

//opening conneection
$conn = new mysqli ($hostname, $username, $password, $database);

if ($conn->connect_error) {
  die($conn->connect_error);
}
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
if (isset($_POST['luxury_wd'])) $luxury_wd = true;
else $luxury_wd = false;
if (isset($_POST['responsive_wd'])) $responsive_wd = true;
else $responsive_wd = false;
if (isset($_POST['web_mobile'])) $web_mobile = true;
else $web_mobile = false;

$reference = $_POST['reference'];
$questions = $_POST['questions'];

$query = "INSERT into web_design_consult(fname, lname, email, phone, luxury_wd, responsive_wd, web_mobile, reference, questions)
VALUES('$fName', '$lName', '$email', '$phone', '$luxury_wd', '$responsive_wd', '$web_mobile', '$reference', '$questions')";

$results = $conn->query($query);

echo "string";
if(!$results){
  echo " insert failed"."<br/>";
}
else {
  echo " insert successfully"."<br/>";
}

$query = "select * from web_design_consult";
$results = $conn->query($query);

if (!$results) {
  echo " select error";
}

while ($row = mysqli_fetch_array($results)) {
  echo
  $row['id']." ".$row['fname']." ".$row['lname']." ".$row['email']." ".$row['phone']."<br/>";
}
?>
