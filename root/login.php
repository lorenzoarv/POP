<?php
session_start();
?>
<html><head>
<title>login</title>
</head>
<body>
<form method="post">
Gebruikersnaam: <input type="text" name="gebruikersnaam"><br>
Wachtwoord: <input type="password" name="wachtwoord"><br><br>
<input type="submit" value="inloggen">
</form>
//test//
</html>
<?php
if(isset($_POST["gebruikersnaam"]) && isset($_POST["wachtwoord"])){
	
	$naam = $_POST["gebruikersnaam"];
	$wachtwoord = $_POST["wachtwoord"];
	print("Jouw gebruikersnaam is: $naam <br />");
	print("Jouw wachtwoord is: $wachtwoord <br /><br />");
}
?>
