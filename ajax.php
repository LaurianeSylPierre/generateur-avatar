<?php
require_once 'Model/pdo.php';
$save = str_replace('data:image/png;base64,', '', $_POST['image'] );
file_put_contents( 'Views/Images/'.$_POST['pseudo'].'.png', base64_decode($save));
$query = $pdo->query("INSERT INTO Avatars (url_home,image,pseudo) VALUES ('$base_url','".$_POST['pseudo'].".png','".$_POST['pseudo']."')");
?>
