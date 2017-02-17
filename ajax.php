<?php
session_start();
require_once 'Model/pdo.php';
$pseudo = $_POST['pseudo'];
// $verif = $pdo->query("SELECT pseudo FROM Avatars WHERE pseudo='".$_POST['pseudo']."'");
// $data = $verif->fetchAll();
$_SESSION['message'] = "";
$verif = $pdo->prepare("SELECT pseudo FROM Avatars WHERE pseudo='".$_POST['pseudo']."'");
              $verif->execute(array($pseudo));
              $pseudodeja = $verif->rowcount();
   
if ($pseudodeja != 0) {
	
	$_SESSION['message'] = "Pseudo déjà créé. Veuillez entrer un autre pseudo";
	echo("error");
}
else {

	$save = str_replace('data:image/png;base64,', '', $_POST['image'] );
	file_put_contents( 'Views/Images/'.$_POST['pseudo'].'.png', base64_decode($save));
	$query = $pdo->query("INSERT INTO Avatars (url_home,image,pseudo) VALUES ('$base_url','".$_POST['pseudo'].".png','".$_POST['pseudo']."')");	
}
?>
