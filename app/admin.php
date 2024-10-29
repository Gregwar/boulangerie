<?php
require_once("includes/db.php");
require_once("includes/auth.php");
force_auth();
if (!is_admin()) {
	die("Acces denied");
}

$has_error = false;
$has_success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user = fetch_user($email);
    if ($user) {
        $has_success = true;
        make_admin($email);
    } else {
        $has_error = true;
    }
}

?>
<?php require('includes/header.php'); ?>

<h2>
    Admin
</h2>

<b>
    Nommer un administrateur
</b>

<?php if ($has_error) { ?>
    <div class="alert alert-danger" role="alert">
        L'adresse e-mail n'existe pas.
    </div>
<?php } ?>
<?php if ($has_success) { ?>
    <div class="alert alert-success" role="alert">
        L'utilisateur a été nommé administrateur.
    </div>
<?php } ?>

<form method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">E-mail</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">OK</button>
</form>

<?php require('includes/footer.php'); ?>
