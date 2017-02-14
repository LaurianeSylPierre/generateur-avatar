<?php

    class IMAGES{

        private $db;

        public function __construct($pdo){
            $this->db = $pdo; //Objet : si le pdo change, il change partout où l'objet est utilisé
        }

//On récupère tous les fronts
        public function prez_front_creation(){
            $front_all = "SELECT front, id_image FROM Banque_images";
            foreach($this->db->query($front_all) as $row){
                $id_front = $row['id_image'];?>
			<a href="editeur.php?selected=<?php print $id_front ?>&selected2=<?php print $id_yeux ?>&selected3=<?php print $id_nez ?>&selected4=<?php print $id_bouche_buste ?>" class="selecteur" name="<?php print $id_front ?>"><div id="front"><img id='<?php print $id_front ?>' class="selecteur"  src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['front']; ?>"><br></div></a>
            <?php
            ; }
        }

        public function prez_yeux_creation(){
            $yeux_all = "SELECT yeux, id_image FROM Banque_images";
            foreach($this->db->query($yeux_all) as $row){
                $id_yeux = $row['id_image'];
                ?>
                <a href="editeur.php?selected=<?php print $id_front ?>&selected2=<?php print $id_yeux ?>&selected3=<?php print $id_nez ?>&selected4=<?php print $id_bouche_buste ?>" class="selecteur" name="<?php print $id_yeux ?>"><div id='yeux'><img id='<?php print $id_yeux?>' class="selecteur"  src='http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['yeux'];?>'><br></div></a>
            <?php
            ; }
        }

        public function prez_nez_creation(){
            $nez_all = "SELECT nez, id_image FROM Banque_images";
            foreach($this->db->query($nez_all) as $row){
                $id_nez = $row['id_image'];
                ?>
                <a href="editeur.php?selected=<?php print $id_front ?>&selected2=<?php print $id_yeux ?>&selected3=<?php print $id_nez ?>&selected4=<?php print $id_bouche_buste ?>" class="selecteur" name="<?php print $id_nez ?>"><div id='nez'><img id='<?php print $id_nez?>' class="selecteur"  src='http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['nez'];?>'><br></div></a>
            <?php
            ; }
        }

        public function prez_bouche_buste_creation(){
            $bouche_buste_all = "SELECT bouche_buste, id_image FROM Banque_images";
            foreach($this->db->query($bouche_buste_all) as $row){
                $id_bouche_buste = $row['id_image']; ?>
                <a href="editeur.php?selected=<?php print $id_front ?>&selected2=<?php print $id_yeux ?>&selected3=<?php print $id_nez ?>&selected4=<?php print $id_bouche_buste ?>" name="<?php print $id_bouche_buste ?>"><div id='bouche_buste'><img class="selecteur"  id='<?php print $id_bouche_buste ?>' src='http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['bouche_buste'];?>'><br></div></a>
            <?php
            ; }
        }

//Récupère le front pour le mettre sur l'avatar lors de la création
        public function get_front_creation($pdo){
            $front_select = $_GET['selected']; //On récupère l'imagine sélectionnée
            if($front_select == ""){
                $front_crea = "SELECT front FROM Banque_images WHERE id_image = 2"; //Si aucune n'est sélectionnée par défaut ce sera la première image
                foreach($this->db->query($front_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['front']; ?>" alt="">
                <?php //Pouf, on sort l'url de l'image
                }
            }
            else{ //Si une image est sélectionnée
                $front_crea = "SELECT front FROM Banque_images WHERE id_image = '$front_select'"; //On compare l'id de l'image à l'id sélectionnée
                foreach($this->db->query($front_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['front']; ?>" alt="">
                <?php //Pouf, on sort l'url de l'image sélectionnée
                }
            }
        }

//Récupère les yeux pour les mettre sur l'avatar lors de la création
        public function get_yeux_creation($pdo){

            $yeux_select = $_GET['selected2'];
            if($yeux_select == ""){
                $yeux_crea = "SELECT yeux FROM Banque_images WHERE id_image = 2";
                foreach($this->db->query($yeux_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['yeux']; ?>" alt="">
                <?php
                }
            }
            else{
                $yeux_crea = "SELECT yeux FROM Banque_images WHERE id_image = '$yeux_select'";
                foreach($this->db->query($yeux_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['yeux']; ?>" alt="">
                <?php
            }
        }
    }

//Récupère le nez pour le mettre sur l'avatar lors de la création
        public function get_nez_creation($pdo){
            $nez_select = $_GET['selected3'];
            if($nez_select == ""){
                $nez_crea = "SELECT nez FROM Banque_images WHERE id_image = 2";
                foreach($this->db->query($nez_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['nez']; ?>" alt="">
                <?php
                }
            }
            else{
                $nez_crea = "SELECT nez FROM Banque_images WHERE id_image = '$nez_select'";
                foreach($this->db->query($nez_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['nez']; ?>" alt="">
                <?php
                }
            }
        }

//Récupère la bouche et le buste pour les mettre sur l'avatar lors de la création
        public function get_bouche_buste_creation($pdo){
            $bouche_buste_select = $_GET['selected4'];
            if($bouche_buste_select == ""){
                $bouche_buste_crea = "SELECT bouche_buste FROM Banque_images WHERE id_image = 2";
                foreach($this->db->query($bouche_buste_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['bouche_buste']; ?>" alt="">
                <?php
                }
            }
            else{
                $bouche_buste_crea = "SELECT bouche_buste FROM Banque_images WHERE id_image = '$bouche_buste_select'";
                foreach($this->db->query($bouche_buste_crea) as $row){?>
                    <img src="http://eddyr.marmier.codeur.online/generateur-avatar/Views/Images/<?php print $row['bouche_buste']; ?>" alt="">
                <?php
                }
            }
        }
    }

?>
