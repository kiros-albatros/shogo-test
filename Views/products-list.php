<?php
include_once 'partial/header.php'; ?>
    <h3 class="mb-5 text-center"><?= $data['section']['name']; ?></h3>
    <div class="row">

        <div class="col-2">
            <form method="GET">
                <input type="hidden" name="filter" value="true">
                <div class="mb-3">
                    <label class="form-label">Цена</label>
                    <div class="input-group">
                        <div class="col me-2">
                            <input type="number" name="start-price" class="form-control" placeholder="От">
                        </div>
                        <div class="col">
                            <input type="number" name="end-price" class="form-control" placeholder="до">
                        </div>
                    </div>
                </div>
                <div>
                    <?php
                    foreach ($data['section_params'] as $param) { ?>
                        <div class="mb-3">
                            <label class="form-label"><?= $param['param_name'] ?></label>
                            <?php
                            foreach ($param['variants'] as $variant) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" name="<?= $param['param_id'] ?>" type="checkbox" value="<?=$variant['variant_id']?>" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $variant['variant_name'] ?>
                                    </label>
                                </div>
                           <?php }
                            ?>
                        </div>
                    <?php }
                    ?>

                </div>
                <button type="submit" class="btn btn-primary my-3">Применить</button>
            </form>
        </div>
        <div class="col-10">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 row-gap-2">
                <?php
                if (!empty($data['products'])) { ?>

                    <?php foreach ($data['products'] as $product) { ?>

                        <div class="col">
                            <a href="<?= URLROOT . '/product/' . $product['id'] ?>">

                                <div class="card">
                                    <button style="max-width: 50%;" type="button"
                                            class="btn btn-primary position-relative">
<!--                                        <span class="badge"> --><?//= $product['type_name'] ?><!--</span>-->
                                    </button>
                                    <img src="/images/<?= $product['url'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p><?= $product['name'] ?></p>
                                        <p><s><?= $product['price_old'] ?> ₽</s></p>
                                        <p><?= $product['price'] ?> ₽</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php } ?>


                <?php } ?>
            </div>
        </div>

    </div>


<?php include_once 'partial/footer.php';