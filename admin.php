<?php
session_start();
?>

<html>
<body>

<a href="home.php">user Registration</a>_________ <a href="user_list.php">user list</a>_________Admin

<br><br><br><br><br><br>

<?php
if(isset($_POST['lout'])){
	unset($_SESSION['track']);
	unset($_SESSION['pass']);
}
if(isset($_POST['btn']) && isset($_POST['password'])){
	$_SESSION['track'] = $_POST['btn'];
	$_SESSION['pass'] = $_POST['password'];
}
if(!isset($_SESSION['track']) || !isset($_SESSION['pass'])){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=adminlogin.php\">";
}

?>


<?php
if(($_SESSION['track']=='Login' && $_SESSION['pass']=='123') || isset($_POST['user']) || isset($_POST['clear']))
{
?>
<table>
	   
	      <tr>
	          <th>First Name </th>
		  <th>Last Name </th>
	          <th>User Name </th>
		  <th>Password </th>
              </tr>
		  
		  
	      <?php
		   mysql_connect("localhost","root","") or die(mysql_error());
	           mysql_select_db("doc_db");
	   
		   if(isset($_POST['user']))
		   {
			$query="select * from temp_user_information WHERE username='".$_POST['user']."'";
			$run=mysql_query($query);
			
			$val = mysql_fetch_assoc($run);
		 	$fname=$val['fname'];
			$lname=$val['lname'];
			$username=$val['username'];
			$password=$val['password'];

			$query="insert into user_information(username,fname,lname,password)values('{$username}','{$fname}','{$lname}','{$password}')";
   			$results=mysql_query($query)or die('Error creating user_info_table'.mysql_error());

			$sql="DELETE FROM temp_user_information WHERE username='".$_POST['user']."'";
			mysql_query($sql);


		   }
		   

		   if(isset($_POST['clear']))
		   {
			$sql="DELETE FROM temp_user_information";
			mysql_query($sql);

		   }


	           $query="select * from temp_user_information";
                   $run=mysql_query($query);

                   while($row=mysql_fetch_array($run))
                   {		   
		 	   $fname=$row['fname'];
			   $lname=$row['lname'];
		    	   $username=$row['username'];
			   $password=$row['password'];
		    
	       ?>
		  
		  <tr>
		  <td><?php echo $fname; ?></td>
		  <td><?php echo $lname; ?></td>
		  <td><?php echo $username; ?></td>
		  <td><?php echo $password; ?></td>
		  <td><form action="admin.php" method="POST"><input type="hidden" name="user" value="<?php echo (isset($username))?$username:'';?>" > 
							     <input type="submit" value="Add">
		      </form>
		  <td>
		  </tr>
		  
	       <?php

		  } 
		  
               ?>
		  
	   </table>


           <form method="POST" action="admin.php">
		<input type="submit" name="clear" value="Clear all">
		<input type="submit" name="lout" value="Log out">
	   </form>



<?php
}
?>		

		
</body>
</html>

