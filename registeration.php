<?php
$conn=mysqli_connect('localhost','root','','redcap');

if(!$conn)	{
	die("connection failed:" .mysqli_connect_error());

}
if(isset($_POST['username']))	{
	$name=$_POST['username'];
	$pass=$_POST['password'];

	$sql="select * from usertable where name='".$name."' limit 1";

	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1){
				echo '<script language="javascript">';
				echo 'alert("same username already exists")';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'window.location="login1.html"';
				echo '</script>'; 

	}
	else{
		echo '<script language="javascript">';
		echo 'alert("registration successful")';
		echo '</script>';
		$reg="insert into usertable(name,password) values('$name','$pass')";
		mysqli_query($conn,$reg);
		echo '<script language="javascript">';
		echo 'window.location="home.html"';
		echo '</script>';
	}
}
?>