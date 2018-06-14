<html>
<body>

<a href="home.php">user Registration</a>_________ user list_________<a href="admin.php">Admin</a>

<br><br><br><br><br><br>

<table>
	   
	      <tr>
	          <th>First Name </th>
		  <th>Last Name </th>
	          <th>User Name </th>
              </tr>
		  
		  
	      <?php
		   mysql_connect("localhost","root","") or die(mysql_error());
	           mysql_select_db("doc_db");
	   
	           $query="select * from user_information";
                   $run=mysql_query($query);

                   while($row=mysql_fetch_array($run))
                   {		   
		 	   $fname=$row['fname'];
			   $lname=$row['lname'];
		    	   $username=$row['username'];
		    
	       ?>
		  
		  <tr>
		  <td><?php echo $fname; ?></td>
		  <td><?php echo $lname; ?></td>
		  <td><?php echo $username; ?></td>
		  </tr>
		  
	       <?php

		  } 
		  
               ?>
		  
	   </table>

</body>
</html>