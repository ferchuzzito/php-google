<link href="https://s3.amazonaws.com/hayageek/libs/jquery/bootstrap.min.css" rel="stylesheet"> 
<?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

if($_POST['code'])
{
$code=$_POST['code'];
$secret=$userDetails->google_auth_code;
require_once 'googleLib/GoogleAuthenticator.php';
$ga = new GoogleAuthenticator();
$checkResult = $ga->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance

if ($checkResult) 
{
$_SESSION['googleCode']=$code;


} 
else 
{
echo 'FAILED';
}

}


include('session.php');
$userDetails=$userClass->userDetails($session_uid);

?>
<!DOCTYPE html>
<html>
<head>
    <title>verificacion usando google autenthicator</title>
    <link rel="stylesheet" type="text/css" href="style.css" charset="utf-8" />
</head>
<body>
	<div id="container">
<h1>Bienvenido <?php echo $userDetails->name; ?></h1>

<pre>
<?php
echo "Nombre: </br> $userDetails->name";
echo "</br>";
echo "Correo: </br> $userDetails->email";
echo "</br>";
echo "Usuario: </br> $userDetails->username";
echo "</br>";
echo "Codigo de autorizacion: </br> $userDetails->google_auth_code";
echo "</br>";
?>
</pre>
<button class="btn btn-info" onclick="window.location.href='<?php echo BASE_URL; ?>logout.php'">Salir</button>
</div>
</body>
</html>
