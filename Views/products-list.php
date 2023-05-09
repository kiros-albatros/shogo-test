<?php
include_once 'partial/header.php'; ?>
    <h3 class="mb-5 text-center"><?= $data['section']['name']; ?></h3>
        <div class="col">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-5 row-gap-2">
                <?php
                if (!empty($data['products'])) { ?>
                    <?php foreach ($data['products'] as $product) { ?>
                        <div class="col mb-3">
                            <a href="<?= URLROOT . '/product/' . $product['id'] ?>">
                                <div class="card">
                                    <button style="max-width: 50%;" type="button"
                                            class="btn btn-primary position-relative">
                                        <span class="badge"> <?= $product['type_name'] ?></span>
                                    </button>
                                    <img src="/images/<?= $product['url'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p><?= $product['name'] ?></p>
                                        <?= $product['price_old'] == 0.00 ? '' : '<p><s>' . $product['price_old'] . '₽</s></p>' ?>
                                        <p><?= $product['price'] ?> ₽</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
<?php include_once 'partial/footer.php';