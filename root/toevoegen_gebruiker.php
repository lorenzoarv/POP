<?php
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");
?>
<html>
<head>
<title>Leerling toevoegen</title>
</head>
<body>
<form method="post">
Voornaam: <input type="text" name="voornaam" /><br /><br />
Tussenvoegsel: <input type="text" name="tv" /><br /><br />
Achternaam: <input type="text" name="achternaam" /><br /><br />
Geboortedatum: <input type="date" name="geboortedatum" /><br /><br />
Afkorting/Leerlingnummer: <input type="text" name="gebruiker" /><br /><br />
Wachtwoord: <input type="password" name="wachtwoord" /><br /><br />
Mentor: <select name="isMentor">
    <option value="1">Ja</option>
    <option value="NULL">Nee</option>
  </select><br/><br/>
Leerling: <select name="isLeerling">
    <option value="1">Ja</option>
    <option value="NULL">Nee</option>
  </select><br/><br/>
Admin: <select name="isAdmin">
    <option value="1">Ja</option>
    <option value="NULL">Nee</option>
  </select><br/><br/>
Actief? <select name="actief">
    <option value="1">Ja</option>
    <option value="NULL">Nee</option>
  </select><br/><br/>
<?php  $resultaat = mysqli_query($mysql,"SELECT gebruiker_id, voornaam, tussenvoegsel, achternaam, isMentor FROM gebruikers WHERE isMentor=1 ORDER BY voornaam") 
or die("De selectquery op de database is mislukt! Foutmelding: ".mysqli_error($mysql)); 

echo "<form method='post'>"; //starten met het HTML formulier
echo "Selecteer een mentor: <select name='mentor'>"; //let op dit 'wcode' wordt de variabele die via het formulier wordt verstuurd
//gegevens uit $resultaat op het scherm tonen
while(list($gebruiker_id1, $voornaam1, $tussenvoegsel1, $achternaam1) = mysqli_fetch_row($resultaat))  
{     
 echo"<option value='$gebruiker_id1'>$achternaam1 </option>";  
} 
echo "</select><br />";//einde select

//Mentor van Leerling <input type="text" name="mentor" /><br /><br />
?>
<input type="submit" name="verzend" value="Voeg gebruiker toe" />
</form>
</body>
</html>

<?php

// Hier wordt gecontroleerd of er op de verzend-knop is geklikt
if(isset($_POST["verzend"]))
{
// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$voornaam = mysqli_real_escape_string($mysql,$_POST["voornaam"]);	
if(isset($_POST["tv"])){
$tv = mysqli_real_escape_string($mysql,$_POST["tv"]);
}else{ $tv = NULL;}
$achternaam = mysqli_real_escape_string($mysql,$_POST["achternaam"]);
$geboortedatum = mysqli_real_escape_string($mysql,$_POST["geboortedatum"]);
$gebruiker = mysqli_real_escape_string($mysql,$_POST["gebruiker"]);
$wachtwoord = mysqli_real_escape_string($mysql,$_POST["wachtwoord"]);
$isMentor = mysqli_real_escape_string($mysql,$_POST["isMentor"]);
$isLeerling = mysqli_real_escape_string($mysql,$_POST["isLeerling"]);
$isAdmin = mysqli_real_escape_string($mysql,$_POST["isAdmin"]);
$actief = mysqli_real_escape_string($mysql,$_POST["actief"]);
if(isset($_POST["mentor"])){
$mentor = mysqli_real_escape_string($mysql,$_POST["mentor"]);}
else{$mentor = NULL;}
// Hier wordt het artikel toegevoegd aan de database
mysqli_query($mysql,"INSERT INTO gebuikers(voornaam,tussenvoegsel,achternaam,geboortedatum,gebruiker, wachtwoord, isMentor, isLeerling, isAdmin, actief, mentor) VALUES('$voornaam','$tv','$achternaam','$geboortedatum','$gebruiker','$wachtwoord','$isMentor','$isLeerling','$isAdmin','$actief','$mentor')") or die("Toevoegen mislukt!");	
}