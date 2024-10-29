<?php require('includes/db.php'); ?>
<?php
require('includes/auth.php'); 
force_auth();
$user = get_user();
$updated = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    update_user($user['email'], $_POST['password']);
    $updated = true;
}

?>
<?php require('includes/header.php'); ?>

<h2>
    Mon compte
</h2>

<?php if ($updated) { ?>
    <div class="alert alert-success" role="alert">
        Votre mot de passe a bien été mis à jour.
    </div>
<?php } ?>

<form method="post">
    <div class="mb-3">
        <label for="email">Adresse e-mail</label>
        <input type="email" disabled="disabled" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
    </div>
    <div class="mb-3">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php require('includes/footer.php'); ?>