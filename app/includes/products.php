<div class="row">
    <?php foreach ($products as $product) { ?>
        <div class="col-sm-4">
            <div class="p-2 h-100">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">
                            <?php echo $product['name']; ?>

                            <a class="btn btn-primary btn-sm m-1 float-end" href="product.php?id=<?= $product['id']; ?>">Fiche &raquo;</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Price in a pill -->
                        <span class="badge bg-info badge-pill float-end">
                            <?php echo $product['price']; ?> €
                        </span>

                        <img src="products/<?php echo $product['id']; ?>.png" width="128" class="float-end" alt="<?php echo $product['name']; ?>" />
                        <p class="card-text"><?php echo $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>