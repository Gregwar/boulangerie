<?php require('includes/db.php'); ?>
<?php require('includes/header.php'); ?>

<h2>
    Produits
</h2>

<?php 
$products = get_products();
include('includes/products.php'); 
?>

<?php require('includes/footer.php'); ?>