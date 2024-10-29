<?php
$has_error = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("includes/db.php");
    require_once("includes/auth.php");
    if (check_user_auth($_POST['email'], $_POST['password'])) {
        login($_POST['email']);
        header("Location: index.php");
        die();
    } else {
        $has_error = true;
    }
}
?>
<?php require('includes/header.php'); ?>

<h2>
    Connexion
</h2>

<?php if ($has_error) { ?>
    <div class="alert alert-danger" role="alert">
        L'adresse e-mail ou le mot de passe est incorrect.
    </div>
<?php } ?>

<?php if (isset($_GET['show'])) { ?>
    <div class="alert alert-info" role="alert">
        Vous devez être connecté pour accéder à cette page.
    </div>
<?php } ?>

<!-- Bootstrap registration form (e-mail and password) -->
<form method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">E-mail</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">OK</button>
</form>

<?php require('includes/footer.php'); ?>