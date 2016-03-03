<?php
ob_start(); // we turn the buffering on
?>


<html>
<body>
 
 
<?php
session_start();
  $submit = $_POST["submit"];
  
  $FirstName = $LastName =$email=$contact=$address=$password= " ";
  $FirstName = $_POST["FirstName"];
  $LastName =  $_POST["LastName"];
  $email =  $_POST["email"];
  $password =  $_POST["password"];
  if($submit)
  { 
    //open database
    $connect = mysql_connect("mysql12.000webhost.com","a1470463_root","ro9460802458") or die("Couldn't connect");
    mysql_select_db("a1470463_crs") or die("Couldn't connect");
    $emailcheck = mysql_query("SELECT email FROM signup WHERE email='$email'");
    $count = mysql_num_rows($emailcheck); 
    if($count!=0)
    {
      echo ("<h2><br /><center>Sorry! Your Email has been already registered.</center></h2><br /><br />");
        echo("<center><a href='signup.html'>Click here to sign up again</center></a>");
    }
    
    // Existence Check
    else if($FirstName && $LastName && $email && $password)
    {
    //  $password = $password;
      
        if(strlen($FirstName)>25)
        {
          echo ("Max. limit for name is 25");
        }
        else
        {
          if(strlen($password)>100 || strlen($password)<5)
          {
            echo ("Password must be between 5 to 25 characters <a href='index.php'>Click here to go to login page</a>");
          }
          else
          {
            //Register the User
            
            //encrypt password
      //      $password = $password;
      //      $repeatpassword = md5($repeatpassword);
            //Insert in Database
            $queryreg = mysql_query ("INSERT INTO signup VALUES('','$FirstName','$LastName','$email','$password')");
             header("Location: signin.html");
            ob_clean();
            die();
           // echo ("<center><h2>Bingo!!! You have been Registered !!</h2><br /></br /> <a href='signin.html'>Click here for login</a></center>");   
          }
        }
      
      
    }
    else
      echo("Please fill all the details");
  } 
 	else 
    {
      header("Location: signup.html");
      ob_end_clean();
      die();
    }
?>
</body>
</html>


<?php
echo ob_get_clean(); // output the buffer and clean it
?>
