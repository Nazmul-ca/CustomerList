<?php
$connect=mysql_connect("localhost","root","")
   or die("mysql_error()");

  $create =mysql_query("CREATE DATABASE IF NOT EXISTS doc_db")
  or die('Error creating database: ' .mysql_error());
  
  mysql_select_db("doc_db");

  $results=mysql_query("DROP TABLE IF EXISTS user_information");
  $user_info="CREATE TABLE user_information(
                                          
                                          fname varchar(255) NOT NULL ,
					  lname varchar(255) NOT NULL ,
                                          username varchar(255) NOT NULL,
                                          password varchar(255) NOT NULL,
                                          PRIMARY KEY (username)

                                       )";
   $results=mysql_query($user_info)
   or die('Error creating user_info_table'.mysql_error());

   $query="insert into user_information(username,fname,lname,password)values('ab','a','b','ab')";
   $results=mysql_query($query)or die('Error creating user_info_table'.mysql_error());

   $query="insert into user_information(username,fname,lname,password)values('cd','c','d','cd')";
   $results=mysql_query($query)or die('Error creating user_info_table'.mysql_error());

   $query="insert into user_information(username,fname,lname,password)values('ef','e','f','ef')";
   $results=mysql_query($query)or die('Error creating user_info_table'.mysql_error());






 $results=mysql_query("DROP TABLE IF EXISTS temp_user_information");
  $user_info="CREATE TABLE temp_user_information(
                                          
                                          fname varchar(255) NOT NULL ,
					  lname varchar(255) NOT NULL ,
                                          username varchar(255) NOT NULL,
                                          password varchar(255) NOT NULL,
                                          PRIMARY KEY (username)

                                       )";
   $results=mysql_query($user_info)
   or die('Error creating user_info_table'.mysql_error());



  echo "The Database has been Created Successfully";
 ?>