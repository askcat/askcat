<?php  
error_reporting(0);
$con = mysql_connect("localhost", "root", "");
mysql_select_db("app_zpw2000a", $con);

 $name=$_POST['accountname']; 
 $password=$_POST['password']; 

if($name=="")  
{  
  
     //echo "请填写账户<br>";  
     echo "<script type='text/javascript'>alert('请填写账户');location='Homepage.html';</script>";  
           
  
}  
elseif($password == "")  
{  
  
     //echo "Please fill in password<br><a href='Log in.php'>return</a>";  
    echo "<script type='text/javascript'>alert('请填写密码');location='Homepage.html';</script>";  
      
}  

else  
{   
    if ($name && $password){ 
 $sql = "SELECT * FROM account WHERE username = '$name' and password='$password'"; 
 $res = mysql_query($sql); 
 $colum = mysql_fetch_array($res); 
} 

     if(($colum['username'] == $name) && ($colum['password'] == $password))  
  
        {  
  
            session_start();
         
			$sql = "SELECT * FROM account WHERE username = '$name' and password='$password'"; 
            $res = mysql_query($sql); 
            $colum=mysql_fetch_array($res); 
			$_SESSION['id']=$colum['id'];
			$_SESSION['name']=$colum['username'];

		
            echo"<script type='text/javascript'>alert('登入成功');location='userinterface.php';</script>";  
  
         }  
           
     else  
         echo"<script type='text/javascript'>alert('账号或者密码有误');location='Homepage.html';</script>";  
   
  
}  
?>