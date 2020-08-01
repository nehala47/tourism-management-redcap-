<?php 
 
$conn=mysqli_connect('localhost','root','','redcap');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['username'])){
    
    $name=$_POST['username'];
    $pass=$_POST['password'];
  
    $sql="select * from usertable where name='".$name."'AND password='".$pass."' limit 1";
    
    $result=mysqli_query($conn,$sql);
    //$link_address1 = 'index.html';
    
    if(mysqli_num_rows($result)==1){
                    echo '<script language="javascript">';
        			echo 'alert("Login Successful")';
        			echo '</script>';  
        			echo '<Script language="javascript">';
			        echo 'window.location = "home.html" ';
			        echo '</script>';
                    
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("You Have Entered Incorrect Username or Password")';
        echo '</script>';
        echo '<Script language="javascript">';
        echo 'window.location = "login1.html" ';
        echo '</script>';
      
        exit();
    }
        
}
?>