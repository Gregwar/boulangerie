<?php

require_once("includes/config.php");

$pdo = new PDO(
    "mysql:host=$database_host;dbname=$database_name;charset=utf8",
    $database_user,
    $database_password
);

function count_users(): int
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchColumn();
}

function user_exists(string $email): bool
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user !== false;
}

function create_user(string $email, string $password): int
{
    global $pdo;
    $first_user = count_users() === 0;
    $sql = "INSERT INTO users (email, password, admin) VALUES (:email, :password, :admin)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'password' => sha1($password),
        'admin' => $first_user ? 1 : 0,
    ]);

    return $pdo->lastInsertId();
}

function update_user(string $email, string $password)
{
    global $pdo;
    $sql = "UPDATE users SET password = :password WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'password' => sha1($password),
    ]);
}

function fetch_user(string $email)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function check_user_auth(string $email, string $password)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'password' => sha1($password),
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function make_admin(string $email)
{
    global $pdo;
    $sql = "UPDATE users SET admin = 1 WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
}

function get_products(): array
{
    global $pdo;
    $sql = "SELECT * FROM products";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function product_exists($id): bool
{
    global $pdo;
    $sql = "SELECT * FROM products WHERE id = " . $id;
    $stmt = $pdo->query($sql);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    return $product !== false;
}

function get_product(int $id): array
{
    global $pdo;
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function search_products(string $keyword): array
{
    global $pdo;
    $sql = "SELECT * FROM products WHERE name LIKE :keyword OR description LIKE \"%$keyword%\"";
    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
