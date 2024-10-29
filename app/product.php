<?php require('includes/db.php'); ?>
<?php
$product_exists = product_exists($_GET['id']);
if ($product_exists) {
    $product = get_product($_GET['id']);
}
?>
<?php require('includes/header.php'); ?>

<img src="products/<?php echo $product['id']; ?>.png" width="128" class="float-end" alt="<?php echo $product['name']; ?>" />

<?php if (!$product_exists) { ?>
    <h2>
        Produit non trouvé!
    </h2>

    Désolé, le produit demandé n'existe pas.
<?php } else { ?>

    <h2>
        <?= $product['name']; ?>
    </h2>

    <div class="m-2 text-italic">
        <?= $product['description']; ?>
    </div>

    <br />
    <span class="badge bg-info badge-pill">
        Prix: <?= $product['price']; ?> €
    </span>

<?php } ?>

<?php require('includes/footer.php'); ?>