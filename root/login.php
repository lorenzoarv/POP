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
</html>
<?php
if(isset($_POST["gebruikersnaam"]) && isset($_POST["wachtwoord"]) && $_POST["gebruikersnaam"]!=null && $_POST["wachtwoord"]!=null){
	
	$naam = $_POST["gebruikersnaam"];
	$wachtwoord = $_POST["wachtwoord"];
	echo "Jouw gebruikersnaam is: $naam <br />";
	echo "Jouw wachtwoord is: $wachtwoord <br /><br />";
}
if(isset($_POST["gebruikersnaam"]) && isset($_POST["wachtwoord"]) && ($_POST["gebruikersnaam"]==null OR $_POST["wachtwoord"]==null)){
echo "Vul een gebruikersnaam én wachtwoord in!";
}
?>
