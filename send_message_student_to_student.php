<?php
include('admin/dbcon.php');
include('session.php');
$student_id = $_POST['student_id'];
$my_message = $_POST['my_message'];


$query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from student where student_id = '$student_id'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row = mysqli_fetch_array($query);
$name = $row['firstname']." ".$row['lastname'];

$query1 = mysqli_query($GLOBALS["___mysqli_ston"], "select * from student where student_id = '$session_id'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row1 = mysqli_fetch_array($query1);
$name1 = $row1['firstname']." ".$row1['lastname'];


mysqli_query($GLOBALS["___mysqli_ston"], "insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_query($GLOBALS["___mysqli_ston"], "insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
?>