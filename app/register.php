<?php
$has_error = false;
$has_success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("includes/db.php");
    if (user_exists($_POST['email'])) {
        $has_error = true;
    } else {
        create_user($_POST['email'], $_POST['password']);
        $has_success = true;
    }
}
?>
<?php require('includes/header.php'); ?>

<h2>
    Inscription
</h2>

<?php if ($has_error) { ?>
    <div class="alert alert-danger" role="alert">
        L'adresse e-mail existe déjà.
    </div>
<?php } ?>
<?php if ($has_success) { ?>
    <div class="alert alert-success" role="alert">
        Votre compte a bien été créé.
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