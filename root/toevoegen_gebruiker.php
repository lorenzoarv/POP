<html>
<head>
<title>Leerling toevoegen</title>
</head>
<body>
<form method="post">
Voornaam: <input type="text" name="voornaam" /><br /><br />
Tussenvoegsel: <input type="text" name="tv" /><br /><br />
Achternaam: <input type="text" name="achternaam" /><br /><br />
Geboortedatum: <input type="text" name="geboortedatum" /><br /><br />
Afkorting/Leerlingnummer: <input type="text" name="gebruiker" /><br /><br />
Wachtwoord: <input type="text" name="wachtwoord" /><br /><br />
Mentor: <input type="text" name="isMentor" /><br /><br />
Leerling: <input type="text" name="isLeerling" /><br /><br />
Admin: <input type="text" name="isAdmin" /><br /><br />
Actief? <input type="text" name="actief" /><br /><br />
Mentor van Leerling <input type="text" name="mentor" /><br /><br />
<input type="submit" name="verzend" value="Voeg artikel toe" />
</form>
</body>
</html>

<?php
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier wordt gecontroleerd of er op de verzend-knop is geklikt
if(isset($_POST["verzend"]))
{
// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$voornaam = mysqli_real_escape_string($mysql,$_POST["voornaam"]);	
$tv = mysqli_real_escape_string($mysql,$_POST["tv"]);
$achternaam = mysqli_real_escape_string($mysql,$_POST["achternaam"]);
$geboortedatum = mysqli_real_escape_string($mysql,$_POST["geboortedatum"]);
$gebruiker = mysqli_real_escape_string($mysql,$_POST["gebruiker"]);
$wachtwoord = mysqli_real_escape_string($mysql,$_POST["wachtwoord"]);
$isMentor = mysqli_real_escape_string($mysql,$_POST["isMentor"]);
$isLeerling = mysqli_real_escape_string($mysql,$_POST["isLeerling"]);
$isAdmin = mysqli_real_escape_string($mysql,$_POST["isAdmin"]);
$actief = mysqli_real_escape_string($mysql,$_POST["actief"]);
$mentor = mysqli_real_escape_string($mysql,$_POST["mentor"]);
// Hier wordt het artikel toegevoegd aan de database
mysqli_query($mysql,"INSERT INTO gebuikers(voornaam,tussenvoegsel,achternaam,geboortedatum,gebruiker, wachtwoord, isMentor, isLeerling, isAdmin, actief, mentor) VALUES('$voornaam','$tv','$achternaam','$geboortedatum','$gebruiker','$wachtwoord','$isMentor','$isLeerling','$isAdmin','$actief','$mentor')") or die("De insertquery op de database is mislukt!");	
}