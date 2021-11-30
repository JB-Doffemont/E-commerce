<?php

include_once 'product.php'; // chargement de la classe mère


    class JeuxVideo extends Product {
        // on définit la liste des nouvelles propriétés qui s'ajoutent à celles de la classe mère Product
        protected $type;
        protected $age_minimum;
        protected $note_moyenne;

        public function __construct ($prixHT, $nom, $categorie, $stock, $description, $type, $age_minimum, $note_moyenne) {
            parent::__construct ($prixHT, 1.2, $nom, $categorie, $stock, $description); // utilisation du constructeur provenant de la classe mère
            // on profite du constructeur qu'on a déjà écrit dans la classe mère et on l'enrichit ici
            $this->type = $type;
            $this->age_minimum = $age_minimum;
            $this->note_moyenne = $note_moyenne;
        }

        // methode pour la vérification de l'âge
        public function verifAge ($age) {
           return $age >= $this->age_minimum;
        }

        // surcharge de la méthode display de la classe mère
        public function display() {
            echo 
            "<h1> Nom du produit :".$this->nom."</h1><br>".
            "Type :".$this->type."<br>".
            "Note moyenne :".$this->note_moyenne."<br>".
            "Age minimum :".$this->age_minimum."<br>".
            "Catégorie :".$this->categorie."<br>".
            "Quantité du stock:".$this->stock."<br>".
            "Description produit :".$this->description."<br>".
            "Prix HT :".number_format($this->prixHT, 2,'.',' ')."<br>".
            "Montant de TVA :".number_format($this->tva, 2, '.',' ')."<br>".
            "Prix TTC :".number_format($this->prixTTC, 2,'.',' ')."<br>".
            "Valoraisation du stock :".number_format($this->getValorisation(), 2,'.',' ')."<br>";
            
        }


    }
?>