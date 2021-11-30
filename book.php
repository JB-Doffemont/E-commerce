<?php

    include_once ("product.php"); // Chargement de la classe mère
  

    class Book extends Product {
        // on définit la liste des nouvelles propriétés qui s'ajoutent à celles de la classe mère Product
        protected $auteur;
        protected $format;

        public function __construct($prixHT, $nom, $categorie, $stock, $description, $auteur, $format) {
            parent::__construct ($prixHT, 1.055, $nom, $categorie, $stock, $description); // utilisation du constructeur provenant de la classe mère
            // on profite du constructeur qu'on a déjà écrit dans la classe mère et on l'enrichit ici
            $this->auteur = $auteur;
            $this->format = $format; 
        }

        // methode pour affiche une courte description
        public function shortDescription () {
            echo 
            "Le titre du livre :".$this->nom."<br>".
            "L'auteur est:".$this->auteur."<br>".
            "La description :".$this->description."<br>";
        }

        // surcharge de la méthode display de la classe mère
        public function display() {
            echo 
            "<h1> Nom du produit :".$this->nom."</h1><br>".
            "Auteur :".$this->auteur."<br>".
            "Format du livre :".$this->format."<br>".
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