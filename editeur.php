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


  	</head>
  	
    <body>


      <header>

        <h1>Nom du générateur</h1>

      </header>
 
        <section id="avatar"> 

          <div class="container">

            <div class="row">

              <div class="col-xs-12 col-md-6">

                <div class="apercu">

                </div>

              </div>

              <div class="col-xs-12 col-md-6">

                      <ul id="onglets">
                        <li class="actif">Front</li>
                        <li>Yeux</li>
                        <li>Nez</li>
                        <li>Bouche</li>
                      </ul>

                <div class="choix">

                      <div id="contenu">

                        <div class="item">
                          <?php echo $images->prez_front_creation($pdo); ?>
                        </div>

                        <div class="item">
                          <?php echo $images->prez_yeux_creation($pdo); ?>
                        </div>

                        <div class="item">
                          <?php echo $images->prez_nez_creation($pdo); ?>
                        </div>

                        <div class="item">
                          <?php echo $images->prez_bouche_buste_creation($pdo); ?>
                        </div>

                      </div>
 

                </div>

              </div>

              <script src="http://code.jquery.com/jquery-latest.js"></script>

                  <script>
                    $(function() {
                      $('#onglets').css('display', 'block');
                      $('#onglets').click(function(event) {
                        var actuel = event.target;
                        if (!/li/i.test(actuel.nodeName) || actuel.className.indexOf('actif') > -1) {
                          return;
                        }
                        $(actuel).addClass('actif').siblings().removeClass('actif');
                        setDisplay();
                      });
                      function setDisplay() {
                        var modeAffichage;
                        $('#onglets li').each(function(rang) {
                          modeAffichage = $(this).hasClass('actif') ? '' : 'none';
                          $('.item').eq(rang).css('display', modeAffichage);
                        });
                      }
                      setDisplay();
                    });
                  </script>

        </section>

       <script src="http://code.jquery.com/jquery-latest.js"></script>

    </body>

  </html>









