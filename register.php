<?php
ob_start(); // we turn the buffering on
?>


<html>
<body>
 
 
<?php
session_start();
  $submit = $_POST["submit"];
  
  $FirstName = $LastName =$email=$contact=$address= " ";
  $FirstName = $_POST["FirstName"];
  $LastName =  $_POST["LastName"];
  $email =  $_POST["email"];
  $contact =  $_POST["contact"];
  $address =  $_POST["address"];
  $course =  $_POST["course"];
  if($submit)
  { 
    //open database
    $connect = mysql_connect("mysql12.000webhost.com","a1470463_root","ro9460802458") or die("Couldn't connect");
    mysql_select_db("a1470463_crs") or die("Couldn't connect");
    $emailcheck = mysql_query("SELECT email FROM users WHERE email='$email'");
    $count = mysql_num_rows($emailcheck); 
    if($count!=0)
    {
      echo ("<h2><br /><center>Sorry! Your Email has been already registered.</center></h2><br /><br />");
        echo("<center><a href='register.html'>Click here to register again</center></a>");
    }
    
    // Existence Check
    else if($FirstName && $LastName && $email && $contact )
    {
    //  $password = $password;
      
        if(strlen($FirstName)>25)
        {
          echo ("Max. limit for name is 25");
        }
        
          else
          {
            //Register the User
            
            //encrypt password
      //      $password = $password;
      //      $repeatpassword = md5($repeatpassword);
            //Insert in Database
            $queryreg = mysql_query ("INSERT INTO users VALUES('','$FirstName','$LastName','$email','$contact','$address','$course')");
             
            echo ("<center><h2>Bingo!!! You have been Registered !!</h2><br /></br /> <a href='index.html'>Click here for logout</a></center>");   
          }  
    }
    else
      echo("Please fill all the details");
  } 
 	else 
    {
      header("Location: register.html");
      ob_end_clean();
      die();
    }
?>
</body>
</html>


<?php
echo ob_get_clean(); // output the buffer and clean it
?>
