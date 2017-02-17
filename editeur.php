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

        <section id="avatar">

          <div class="container">

            <div class="row">

              <div class="col-xs-12 col-md-6">

                <div id="apercu" class="apercu">

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
                }
                else{
                    echo $images->get_front_creation($pdo);
                    echo $images->get_yeux_creation($pdo);
                    echo $images->get_nez_creation($pdo);
                    echo $images->get_bouche_buste_creation($pdo);
                }?>

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

                            <div id="partage">
                                <div class="fb-share-button" data-layout="button" data-mobile-iframe="false">
                                    <a id="fb" class="fb-xfbml-parse-ignore" target="_blank" href="">
                                        <img src="<?php echo $base_url ?>1487344286_facebook.svg" alt="">
                                    </a>
                                </div>
                                <br>
                                <br>
                                <a id="twitter" class="twitter-share-button" href="" data-size="large">
                                    <img src="<?php echo $base_url ?>1487344412_twitter.svg" alt="">
                                </a>
                            </div>

                        </div>

                      </div>


				</div>
			</div>	
		</div>
			<div class="bouton_retour row">
				<div class="col-md-offset-5 col-md-2">
					<a class="retour" href="accueil.php">Retour à l'accueil</a>
				</div>
			</div>
      </div>



            <script src="http://code.jquery.com/jquery-latest.js"></script>

            <script>

            $('#boutonsave').click(function() {
                var pathname = "https://www.facebook.com/sharer/sharer.php?u=<?php echo $base_url ?>";
                var pseudo = $("input[name='pseudo']").val();
                var suite = ".png&display=popup&ref=plugin&src=share_button";
                var result = pathname + pseudo + suite;
                $('#fb').attr('href', result);
            });

            $('#boutonsave').click(function() {
                var pathname = "https://twitter.com/intent/tweet?text=Notre%20texte%20à%20nous%20avec%20notre%20image%20";
                var lien = "<?php echo $base_url ?>";
                var pseudo = $("input[name='pseudo']").val();
                var suite = ".png";
                var result = pathname + lien + pseudo + suite;
                $('#twitter').attr('href', result);
            });

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

						var capture = {};
						var target = $('#apercu');
						var pseudo = $('#pseudo').val();
						html2canvas(target, {
							onrendered: function(canvas) {
								capture.img = canvas.toDataURL( "image/png" );
								capture.data = {
									'image' : capture.img,
									'pseudo' : pseudo
								};
								$.ajax({
									url: "ajax.php",
									data: capture.data,
									type: 'post',
									success: function(result) {
										if (result == "error") {
											$('.message').html("Pseudo déjà créé. Veuillez en choisir un autre.");
										}
										else {
											$('.message').html("Avatar enregistré !");
										}
									}

								});
							}
						});
					});
				});
	        </script>

        </section>

       <script src="http://code.jquery.com/jquery-latest.js"></script>
	<?php
	session_unset();
	session_destroy();
	?>
    </body>

  </html>
