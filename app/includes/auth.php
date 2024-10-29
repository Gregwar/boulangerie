<?php
session_start();

function is_logged_in(): bool
{
    return isset($_SESSION['user']);
}

function login(string $email): void
{
    $_SESSION['user'] = $email;
}

function logout(): void
{
    unset($_SESSION['user']);
}

function get_user(): ?array
{
    require_once("includes/db.php");
    if (!is_logged_in()) {
        return null;
    } else {
        return fetch_user($_SESSION['user']) ?: null;
    }
}

function force_auth(): void
{
    if (!is_logged_in()) {
        header("Location: login.php?show=1");
        die();
    }
}

function is_admin(): bool
{
    $user = get_user();
    return $user !== null && $user['admin'] === 1;
}
