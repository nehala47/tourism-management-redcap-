<?php
$username = $_POST['username'];
$opassword = $_POST['opwd'];
$npassword= $_POST['npwd'];
if (!empty($username) || !empty($opassword) || !empty($npassword)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "redcap";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $sql="update usertable set password=$npassword where name='".$username."'AND password='".$opassword."' limit 1";
    
        $result=mysqli_query($conn,$sql);
        //$link_address1 = 'index.html';
        
        if(mysqli_num_rows($result)==1){
                        echo '<script language="javascript">';
                        echo 'alert("Login Sucessfull")';
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
            
} else {
 echo "All field are required";
 die();
}
?>