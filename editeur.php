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
		  <script src="html2canvas.js"></script>
		<script src="jquery.plugin.html2canvas.js"></script>

  	</head>

    <body>
        <div id="fb-root"></div>
        <script>
        //Widget facebook
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        //widget twitter
        window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));
        </script>

      <header>

        <h1>Zombie generator</h1>

      </header>

        <section id="avatar">

          <div class="container">

            <div class="row">

              <div class="col-xs-12 col-md-6">

                <div class="apercu">

                <?php
                if (isset($_GET["selected"])){
                    echo $images->get_front_creation($pdo);
                }
                if (isset($_GET["selected2"])){
                    echo $images->get_yeux_creation($pdo);
                }
                if (isset($_GET["selected3"])){
                    echo $images->get_nez_creation($pdo);
                }
                if (isset($_GET["selected4"])){
                    echo $images->get_bouche_buste_creation($pdo);
                } ?>

                </div>

              </div>

              <div class="col-xs-12 col-md-6">

                      <ul id="onglets">
                        <li class="actif">Front</li>
                        <li>Yeux</li>
                        <li>Nez</li>
                        <li>Bouche</li>
                        <li id="save">Enregistrer</li>
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

                        <div class="item">

                        <input name="pseudo" id="pseudo" type="text" placeholder="Pseudo"><br>
                        <a id="boutonsave">Sauvegarder</a><br>

                          <!--Facebook-->
                          <div class="fb-share-button" data-href="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/" data-layout="icon" data-mobile-iframe="true">
                              <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a>
                          </div><br><br>
                          <!--Twitter-->
                          <a class="twitter-share-button"
                            href="https://twitter.com/intent/tweet?text=Notre%20texte%20à%20nous"
                            data-size="large">
                          Tweet</a>

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
				  <script>
					$('#boutonsave').click(function() {
						console.log("coucou");

						var capture = {};
						var target = $('.apercu');
						var pseudo = $('#pseudo').val();
						html2canvas(target, {
							onrendered: function(canvas) {
								capture.img = canvas.toDataURL( "image/png" );
								$.ajax({
									url: "ajax.php",
									data: "image="+capture.img+"&pseudo="+pseudo,
									type: 'post',
									success: function( result ) {
										console.log( result );
									}
								});
							}
						});
					});
		</script>
					
        </section>

       <script src="http://code.jquery.com/jquery-latest.js"></script>

    </body>

  </html>
