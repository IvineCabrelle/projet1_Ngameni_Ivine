<?php
// function create($data){
//     global $conn;
//     $query ="INSERT INTO address ('id','street_name','street_nb','city','province','zip_code','country') VALUES (NULL,".$data['street_name'].",".$data['street_nb'].",".$data['city'].",".$data['province'].",".$data['zipcode'].",".$data['country'].",);";
//     $result =mysqli_query($conn,$query);
// }
//ajouter l'adresse a la base de donnees
function createAddress(array $data)
{
    var_dump('création de nouvel address dans user');
    global $conn;
    $query = "INSERT INTO address VALUES (Null, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_prepare($conn, $query);
    var_dump($stmt);
    
    printf("Error message: %s\n", mysqli_error($conn));    
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        
        mysqli_stmt_bind_param(
            $stmt,
            "sissss",
            $data['street_name'],
            $data['street_nb'],
            $data['city'],
            $data['province'],
            $data['zip_code'],
            $data['country'],
            
        );
        /* Exécution de la requête */
        $result= mysqli_stmt_execute($stmt);
        echo "<br> <br>";
        echo "<br> <br>";
        return $result;
        
    }
    
}

// but: utiliser cette fonction pour pouvoir valider l'adresse dans validation.php
function getUserBycountryAndzip_code($country,$zip_code)
{
    global $conn;

    $query = "SELECT * FROM address WHERE country = '" . $country . "' AND zip_code = '" . $zip_code . "';";

    //var_dump($query);
    $result = mysqli_query($conn, $query);

        // avec fetch row : tableau indexé
        $data = mysqli_fetch_assoc($result);
        return $data;
}

?>


