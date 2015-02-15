<?php
/* Check for illegal Usernames and / or Emails
 * Created: 15.02.2015 by Christoph Daniel Miksche (Wronnay)
 * Uses the Wronnay Database for illegal Usernames and Emails
 * More Informations: check.wronnay.net
*/
function wcms_namecheck($username, $email){
	$username = str_replace(' ', '_', $username); // Wandelt Leerzeichen in _ um
	$username = strtolower($username); // Wandelt alle Buchstaben in Großbuchstaben um 
	$email = str_replace(' ', '_', $email);
	$email = strtolower($email);
	// Nur die Domain wird benötigt
	$email = substr(strrchr($email, "@"), 1);
	// Wronnay E-Mail-Check API-URL
	$locked_email = file_get_contents('http://check.wronnay.net/locked_email.php?domain='.$email);
	// Leerzeichen raus!
	$locked_email = str_replace(' ', '', $locked_email);
	// Wronnay Username-Check API-URL
	$locked_username = file_get_contents('http://check.wronnay.net/locked_username.php?username='.$username);
	// Leerzeichen raus!
	$locked_username = str_replace(' ', '', $locked_username);
	// Default Wert für den Check setzen
	$found = false;
	// Username: Check
	if($locked_username == 'true') {
		$found = true;	   
	}
	// E-Mail-Check
	elseif($locked_email == 'true') {
		$found = true;	
	}
	return $found;
}
?>
