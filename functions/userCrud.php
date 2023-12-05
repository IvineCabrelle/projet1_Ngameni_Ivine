<?php
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

function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

function getUserByUsername(string $user_name)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}


function updateUser(array $data)
{
    global $conn;

    $query = "UPDATE user SET user_name = ?, email = ?, pwd = ?, fname= ?, lname= ?
            WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['fname'],
            $data['lname'],
            $data['id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

function deleteUser(int $id)
{
    global $conn;

    $query = "DELETE FROM user
                WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        $result = mysqli_stmt_execute($stmt);
    }
}