<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'student_portal');
// $_SESSION['key']=$_GET['key'];
// echo $_GET['key'];
$key=$_GET['key'];
if (isset($_POST['submit'])) {
  for ($i=0; $i < count($_FILES["filename"]["name"]); $i++) 	{
  $filetmp = $_FILES["filename"]["tmp_name"][$i];
  $filename = $_FILES["filename"]["name"][$i];
  $filetype = $_FILES["filename"]["type"][$i];
  $filepath="testfiles/".$filename;
  move_uploaded_file($filetmp, $filepath);
  // $key='64786s0';
     $qry = "INSERT INTO `files`(`class_id`,`file_name`, `file_path`,`file_type`) VALUES ('$key', '$filename', '$filepath','$filetype')";
     $result = mysqli_query($conn,$qry);
     if ($result) {
       header('location:teacherhome.php');
     }
  }
}
mysqli_close($conn);
?>
