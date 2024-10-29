<?php
require_once("includes/auth.php");
require_once("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Boulangerie</title>
</head>

<body>

    <?php
    $page = $_SERVER['PHP_SELF'];

    function menu_link(string $url, string $label, string $class = "")
    {
        global $page;
    ?>
        <a class="nav-link <?= $class ?> <?php if ($page == $url) { ?>active<?php } ?>" href="<?= $url; ?>"><?= $label ?></a>
    <?php
    }
    ?>

    <nav class="navbar navbar-expand-lg bg-light mb-3">
        <div class="container">
            <div class="d-flex justify-content-between w-100">

                <div class="d-flex">
                    <a class="navbar-brand" href="/">
                        <img src="imgs/croissant.png" width="48" />
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php menu_link("/index.php", "Accueil"); ?>
                        </li>
                        <li class="nav-item">
                            <?php menu_link("/products.php", "Produits"); ?>
                        </li>
                        <?php if (is_logged_in()) { ?>
                            <?php if (is_admin()) { ?>
                                <li class="nav-item">
                                    <?php menu_link("/admin.php", "Admin", "text-warning"); ?>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <?php menu_link("/account.php", "Mon compte"); ?>
                            </li>
                            <li class="nav-item">
                                <?php menu_link("/logout.php", "Déconnexion [" . get_user()["email"] . "]", "text-danger"); ?>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <?php menu_link("/register.php", "Inscription"); ?>
                            </li>
                            <li class="nav-item">
                                <?php menu_link("/login.php", "Connexion", "text-success"); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div>
                    <form class="d-flex" role="search" action="/search.php">
                        <input class="form-control me-2" type="search" placeholder="Mots clés" name="q">
                        <button class="btn btn-outline-success" type="submit">Recherche</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">