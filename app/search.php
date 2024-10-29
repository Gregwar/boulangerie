<?php
if (!isset($_GET['q'])) {
    header('Location: products.php');
    exit;
}
$keywords = $_GET['q'];
?>
<?php require('includes/header.php'); ?>

<h2>
    Résultats de la recherche "<?php echo $keywords; ?>"
</h2>

<?php
if (strlen($keywords) < 3) {
?>
    <div class="alert alert-danger" role="alert">
        Veuillez saisir au moins 3 caractères.
    </div>
<?php
} else {
    $products = search_products($_GET['q']);
    include('includes/products.php');
}
?>

<?php require('includes/footer.php'); ?>