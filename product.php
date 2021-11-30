<?php



        class Product {
            // On définit la liste des propriétés caractérisant chaque instance de Product
            protected float $prixHT;
            protected float $tva;
            protected float $prixTTC;
            public string $nom;
            public string $categorie;
            public int $stock;
            public string $description;
        
            // constructeur
            public function __construct($prixHT, $tva, $nom, $categorie, $stock, $description) {

            $this->prixHT = $prixHT;
            $this->tva = $tva;
            $this->prixTTC = $prixHT * $tva;
            $this->nom = $nom;
            $this->categorie = $categorie;
            $this->stock = $stock;
            $this->description = $description;

            }
            // methode pour connître la valeur réel du stock
            public function getValorisation () {

                return  $this->stock * $this->prixHT;
            }

            // Magic getter
            public function __get($property) {
                // si on veut accéder soit au prixTTC soit au prix HT, alors on renvoie la valeur suivie de "€"
                if ($property === "prixHT" || $property === "prixTTC") {
                    return $this->$property."€";
                } else {
                    // sinon on renvoie la valeur sans la retoucher
                    return $this->$property;
                }
            }
            // Magic setter
            public function __set($property, $value) {
                // on teste la valeur de $property, si on est entrain de modifier prixHT, prixTTC ou TVA alors on les "cast" en float
                if ($property === "prixHT" || $property === "prixTTC" || $property === "tva") {
                    $this->prixHT = (float) $value;
                    $this->prixTTC = (float) $value;
                    $this->tva = (float) $value;
                } else {
                    // dans tous les autres cas on effectue la modification normalement
                     $this->$property = $value;
                }
            }
            // on créé une fonction quis ervira à afficher le produit en bas de page
            public function display() {
                echo 
                "<h1> Nom du produit :".$this->nom."</h1><br>".
                "Catégorie :".$this->categorie."<br>".
                "Quantité du stock:".$this->stock."<br>".
                "Description produit :".$this->description."<br>".
                "Prix HT :".number_format($this->prixHT, 2,'.',' ')."<br>".
                "Montant de TVA :".number_format($this->tva, 3, '.',' ')."<br>".
                "Prix TTC :".number_format($this->prixTTC, 2,'.',' ')."<br>".
                "Valoraisation du stock :".number_format($this->getValorisation(), 2,'.',' ')."<br>";
                
            }

            public static function clone (Product $productToClone, String $newName) {
                // Nouvel objet "clone" avec comme nom $newName
                $clone = new product($productToClone->prixHT, $productToClone->tva, $newName, $productToClone->categorie, $productToClone->stock, $description="");

                // on renvoie le clone en résultat de ma fonction
                return $clone;
            }



        }

        

     ?>
 