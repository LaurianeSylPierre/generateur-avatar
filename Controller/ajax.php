<?php
require '../Model/pdo.php';
$save = str_replace('data:image/png;base64,', '', $_POST['image'] );
file_put_contents( '../View/Images/'.$_POST['pseudo'].'.png', base64_decode( $save ) );
$query = $pdo->query("INSERT INTO Avatars (pseudo) VALUES ('".$_POST['pseudo'].".png')");

?>
