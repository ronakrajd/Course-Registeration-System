<?php
ob_start(); // we turn the buffering on
?>

<html>
<body>
 
 
<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

if($email && $password)
{
              $connect = mysql_connect("mysql12.000webhost.com","a1470463_root","ro9460802458") or die("Couldn't connect");
    mysql_select_db("a1470463_crs") or die("Couldn't connect");
    $query = mysql_query("SELECT * FROM signup WHERE email='$email'");
              $numrows = mysql_num_rows($query);
    if($numrows!=0)
    {
              while($row = mysql_fetch_assoc($query))
              {
              $dbemail = $row['email'];
              $dbpassword = $row['password'];
              }
        if($email==$dbemail && $password==$dbpassword)
      {
            header("Location: menu.html");
            ob_clean();
            die();
      }
        else
      {
      header("Location: signin.html");
            ob_clean();
            die();
      } 
    }
    else
    echo("<center><h2>The user doesn't exist.</h2><br /><a href='signup.html'>Click here to sign up</a></center>");
  
}
else{
  header("Location: signin.html");
            ob_clean();
            die();
}
?>
</html>

<?php
echo ob_get_clean(); // output the buffer and clean it
?>