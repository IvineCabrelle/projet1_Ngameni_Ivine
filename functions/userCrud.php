<?php

 $token = hash('sha256', random_bytes(32));
 echo '</br></br>Mon token : </br>';

function create($data){
    var_dump('création de nouveau utilisateur');
    global $conn;
    $query ="INSERT INTO user ('id','user_name','email','pwd','fname','lname','billing_address_id,'shipping_address_id','token','role_id') VALUES (NULL,".$data['user_name'].", ".$data['email'].", ".$data['pwd'].",".$data['fname']."".$data['lname'].",".$data['billing_address_id)']."".$data['shipping_address_id'].",".$data['token']."".$data['role_id'].");";
    $result =mysqli_query($conn,$query);
}

function createUser(array $data)
{
    var_dump('création de nouveau utilisateur dans user');
    global $conn;
    $query = "INSERT INTO user VALUES (Null, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_prepare($conn, $query);
    var_dump($stmt);
    
    printf("Error message: %s\n", mysqli_error($conn));    
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        
        mysqli_stmt_bind_param(
            $stmt,
            "sssssiisi",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['fname'],
            $data['lname'],
            $data['billing_address_id'],
            $data['shipping_address_id'],
            $data['token'],
            $data['role_id'],

        );
        
        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
        var_dump($result);
        
    
    }
    
}

function getAllUsers()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };

    return $data;
}

function getUserByUsername(string $username)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $username . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}

 function changerToken($data){
    global $conn;
     $query= 'UPDATE user set token =? where user.id =?;';
     if($stmt= mysqli_prepare($conn,$query)){
         mysqli_stmt_bind_param(
             $stmt,
             'si',
             $data['id'],
             $data['token'],
         );
        $result=mysqli_stmt_execute($stmt);
     }
 }

function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);

    return $data;
}

 //Get user by Name
 
function getUserByName(string $username)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.$username = '" . $username."';";

    var_dump($query);
    $result = mysqli_query($conn, $query);

        // avec fetch row : tableau indexé
        $data = mysqli_fetch_assoc($result);
        return $data;
}

// Update user
 
function updateUser(array $data)
{
    global $conn;

    $query = "UPDATE user SET user_name = ?, email = ?, pwd = ?, fname=?, lname=?, billing_address_id=?,shipping_address_id=?, token=?, role_id=?
            WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssssiisii",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['fname'],
            $data['lname'],
            $data['billing_address_id'],
            $data['shipping_address_id'],
            $data['token'],
            $data['role_id'],
            $data['id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
} 

//Delete user
 
function deleteUser(int $id)
{
    global $conn;

    /* Query  permettant de delete un user en ayant juste son id */
    $query = "DELETE FROM user
                WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
 function updateRoleId(array $data){
     global $conn;
     $query="UPDATE user SET role_id = ? where user.user_name=?;";
     if($stmt=mysqli_prepare($conn,$query)){
         mysqli_stmt_bind_param(
             $stmt,
             "is",
             $data["role_id"],
             $data["user_name"],
         );
         $result=mysqli_stmt_execute($stmt);
         return $result;
     }
}


