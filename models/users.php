<?php 

require_once fullPath('database/mysql-connection.php');

function getUserByEmail($user_email)
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT 
            user_id,
            user_email,
            user_password,
            first_name,
            last_name,
            created_at
       FROM users
       WHERE user_email = :user_email"
    );

    $statement->bindValue(':user_email', $user_email);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function createUser($user)
{
    global $connection;
    $statement = $connection->prepare(
        "INSERT INTO users (
            user_email, 
            user_password, 
            first_name, 
            last_name
        ) VALUES (
            :user_email, 
            :user_password, 
            :first_name, 
            :last_name
        )"
    );

    $statement->bindValue(':user_email', $user['user_email']);
    $statement->bindValue(':user_password', $user['user_password']);
    $statement->bindValue(':first_name', $user['first_name']);
    $statement->bindValue(':last_name', $user['last_name']);
    $statement->execute();

    return $connection->lastInsertId();
}

function createCompanionUser($companion_user)
{
    global $connection;
    $statement = $connection->prepare(
        "INSERT INTO companion_users (
            monitored_user_id,
            user_email, 
            first_name, 
            last_name
        ) VALUES (
            :monitored_user_id,
            :user_email, 
            :first_name, 
            :last_name
        )"
    );

    $statement->bindValue(':monitored_user_id', $companion_user['monitored_user_id']);
    $statement->bindValue(':user_email', $companion_user['user_email']);
    $statement->bindValue(':first_name', $companion_user['first_name']);
    $statement->bindValue(':last_name', $companion_user['last_name']);
    $statement->execute();

}