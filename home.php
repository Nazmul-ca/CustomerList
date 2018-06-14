<html>
<body>

user Registration_________ <a href="user_list.php">user list</a>_________<a href="admin.php">Admin</a>

<br><br><br><br><br><br>

<form method="POST" action="home.php">
First name: <input type="text" name="firstname"><br>
Last name: <input type="text" name="lastname"><br>
usernmae:  <input type="text" name="username"><br>
Password :  <input type="text" name="password"><br>

<input type="submit" name="submit" value="Register">
</form>


<?php
mysql_connect("localhost","root","");
mysql_select_db("doc_db");


if(isset($_POST['submit']))
{
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];	
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $query="insert into temp_user_information(username,fname,lname,password)values('$username','$fname','$lname','$password')";
    if(mysql_query($query)) {
   		echo"<script>alert('Waiting for admin permission')</script>";
    } 
}
?>

</body>
</html>