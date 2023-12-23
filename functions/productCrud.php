<?php

//Ajouter un produit dans la base de données

function createProduct(array $data)
{
    var_dump('création de nouveau utilisateur dans user');
    global $conn;
    $query = "INSERT INTO product VALUES (Null, ?, ?, ?,?,?);";
    $stmt = mysqli_prepare($conn, $query);
    var_dump($stmt);
    
    printf("Error message: %s\n", mysqli_error($conn));    
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        
        mysqli_stmt_bind_param(
            $stmt,
            "sidss",
            $data['name'],
            $data['quantity'],
            $data['price'],
            $data['img_url'],
            $data['description'],

        );
        
        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
        var_dump($result);
        
    
    }
    
}
function deleteProduct($id)
{
    global $conn;

    /* Query permettant de delete un produit en ayant juste son id */
    $query = "DELETE FROM product
                WHERE id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
    echo "Suppression de produit réussie";
    //var_dump($result);
}

 function updateProduct(array $data){
     global $conn;

     $query = "UPDATE `product`  SET `name` = ?, `quantity` = ?, `price` = ?, `img_url` = ?, `description` = ?
             WHERE `product`.`id` = ?;";

     if ($stmt = mysqli_prepare($conn, $query)) {

         mysqli_stmt_bind_param(
             $stmt,
             "sidssi",
             $data['name'],
             $data['quantity'],
             $data['price'],
             $data['img_url'],
            $data['description'],
             $data['id'],
         );

         /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
     echo"Produit modifié avec succès";
     var_dump($result);
 }
 function getProductByName( $name)
 {
     global $conn; 
      
    // Todo : changer pour requete preparee
     $query = "SELECT * FROM product WHERE name = '$name' ;";
     $result = mysqli_query($conn, $query);
     // avec fetch row : tableau indexé
     $data = mysqli_fetch_all($result);
     return $data;
 }

 function getProductById( $id)
 {
     global $conn;  
    // Todo : changer pour requete preparee
     $query = "SELECT * FROM product WHERE id = '$id' ;";
     $result = mysqli_query($conn, $query);
     // avec fetch row : tableau indexé
     $data = mysqli_fetch_all($result);
     return $data;
 }
 function getAllProducts()
 {
     global $conn;
     $result = mysqli_query($conn, "SELECT * FROM product");
 
     $data = [];
     $i = 0;
     while ($rangeeData = mysqli_fetch_assoc($result)) {
         $data[$i] = $rangeeData;
         $i++;
     };
 
     return $data;
 }
 



?>