 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <h1>Site e-commerce</h1>

    <form method="post" action="index.php"/><br>
            <label for="priceHT">Prix HT :</label>
            <input type="number" step="0.01" name="priceHT" /><br>

            <label for="tva">TVA :</label>
            <input type="number" step="0.01" name="tva" placeholder="1.2 pour 20%" />%<br>

            <label for="name">Nom du produit:</label>
            <input type="text" name="name" placeholder="" required /><br>

            <label for="category">Catégorie :</label>
            <input type="text" name="category" placeholder="" /><br>

            <label for="stock">Stock :</label>
            <input type="text" name="stock" placeholder="" /><br>

            <label for="description">Description :</label>
            <input type="text" name="description" placeholder="" /><br>
            <input type="submit" value="submit"/>

    </form>

     <?php
     include_once 'product.php'; // chargement de la classe product
     include_once 'book.php'; // chargement de la classe book
     include_once 'jeux.php'; // chargement de la classe jeux
     

     

     if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['name']) // isset me permet de m'assurer que la variable existe bien dans la requête
        && isset($_POST['description']) 
        && isset($_POST['stock'])
        && isset($_POST['priceHT'])
        && isset($_POST['category'])
        && isset($_POST['tva'])
        ) {
     
    // si les variables existe, j'affecte leurs valeurs au moment de l'instance
    $product = new Product($_POST['priceHT'], $_POST['tva'], $_POST['name'], $_POST['category'], $_POST['stock'], $_POST['description']);

        
        
    // affichage valeur du stock
     echo "La valeur du stock s'élève à :" .$product->getValorisation ()." €";
           
     // affichage du produit
    echo $product->display();

    // je créé un clone de ce produit
    $MonClone = Product::clone($product, $product->nom);
         
     // affichage du clone
    echo $MonClone->display();

    // Instanciation des classes book et JeuxVideo
    $bookProduct = new book(10, "L'avare", "Litérature", 20, "Chef d'oeuvre", "Molière", "Format de poche");
    $jeuxProduct = new JeuxVideo (50, "Call of Duty" , "Doom", 60, "Guerre", "FPS", 16, 18);
  
    // affichage des produits
    echo $bookProduct->display();
    echo $jeuxProduct->display();

    // Vérifaication de l'âge avec un opérateur ternaire
    echo "As-tu l'âge requis :".($jeuxProduct->verifAge(14) ? "Oui" : "Non");
    }
}


     ?>


 </body>
 </html>