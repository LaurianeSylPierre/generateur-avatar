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
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="bootstrap/bootstrap.min.js"></script>


  	</head>

    <body>
        <div id="fb-root"></div>
        <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>

      <header>

        <h1>Nom du générateur</h1>

      </header>

        <section id="avatar">

          <div class="container">

            <div class="row">

              <div class="col-xs-12 col-md-6">

                <div class="apercu"></div>

              </div>

              <div class="col-xs-12 col-md-6">

                <div class="choix"></div>
                    <div class="fb-share-button" data-href="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/" data-layout="icon" data-mobile-iframe="true">
                        <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a>
                    </div>
                    <a class="twitter-share-button"
                      href="https://twitter.com/intent/tweet?text=Notre%20texte%20à%20nous"
                      data-size="large">
                    Tweet</a>
                </div>

        </section>

    </body>

  </html>
