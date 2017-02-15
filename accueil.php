<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once "Model/pdo.php";
?>


<!DOCTYPE html>


  <html>

  	<head>

          <meta charset="utf-8" />
          <title>Générateur avatar acs</title>
          <meta name="description" content="Bootstrap" />
          <meta name="viewport" content="width=device-width, initial-scale=1" />
          <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
          <link rel="stylesheet" type="text/css" href="style_editeur.css"/>
          <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="bootstrap/bootstrap.min.js"></script>
          <script src="jquery-3.1.1.min.js"></script>
		  <script src="Controller/html2canvas.js"></script>
		<script src="Controller/jquery.plugin.html2canvas.js"></script>

  	</head>
	<body>
	<header>

        <h1>Zombie generator</h1>

      </header>
		  <section class="avatars">
			  <div>
				<?php
				$query = $pdo->query("SELECT pseudo FROM Avatars");
				$result = $query->fetchAll();                                       
				foreach ($result as $row){
					
					echo "<div id='affichage'><br>";
					echo "<div class='row'>";
					echo "<div class='col-xs-6 col-md-4'>";
					print "<img src='http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/".$row['pseudo']."'>";
					print "<p id='nom'>".$row['pseudo']."</p>";		          
					echo "</div></div></div>";

				}
				?>
			  </div>
		  </section>
	</body>
</html>