<html>
<body>
<?php
require_once 'dipCode.php';
$ga = new DipAuthenticator();
?>
<form action="enableCode.php" method="POST"> 

<?php /*Check Enterprise DIP Control Panel for authentication key and put in below field as Value */  ?>

<input type="hidden" name="authenticationid" value='<-- Your Authentication Key -->' value='<?php echo isset($_POST['authenticationid']) ? $_POST['authenticationid'] : ''; ?>'> 

<input type="text" name="seedkey" required placeholder="Enter User Seed Key." value='<?php echo isset($_POST['seedkey']) ? $_POST['seedkey'] : ''; ?>'>

<input type="text" name="digits" required placeholder="Enter 7-Digits Code." value='<?php echo isset($_POST['digits']) ? $_POST['digits'] : ''; ?>'>

<input type="submit" value="Submit">

</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(!empty($_POST["digits"]))
{
$result = $ga->enableCode($_POST['authenticationid'],$_POST['seedkey'],$_POST['digits']);

if(strcasecmp($result, 'Success') == 0)
{

/* Add seedkey into user table within database for future linking purposes like: usertable[$_POST['seedkey']; */

echo "<script type='text/javascript'>alert('User linked successfully.')</script>";

/* You can Redirect into verifyCode Page. */

}
else if(strcasecmp($result, 'Failed') == 0)
{
echo "<script type='text/javascript'>alert('Input digits are wrong. Try Again !')</script>";
}
else
{
echo "<script type='text/javascript'>alert('Wrong Configuration. Try Again!')</script>";
}
}
else
{
echo "<script type='text/javascript'>alert('Data in Offline Mode. Try Again!')</script>";
}
}
?>

</body>
</html>