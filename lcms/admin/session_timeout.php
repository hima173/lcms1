<?PHP
if(!isset($_SESSION))
{
session_start();
}
if(isset($_SESSION['start'])){
$now = time(); // Checking the time now when home page starts.
       if ($now > $_SESSION['expire']) {

           echo "<script type='text/javascript'>alert('Your Session has expired!!.')</script>";

       echo "<script language='javascript' type='text/javascript'>location.href='logout.php'  </script>";

       }

}

?>

