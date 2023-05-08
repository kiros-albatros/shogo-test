<?php
include_once 'partial/header.php'; ?>
    <h3 class="mb-5 text-center"><?= $data['product']['name']; ?></h3>
    <div class="row">
        <div class="col-6">
            <img src="/images/<?= $data['product']['url'] ?>" class="img-fluid" alt="...">
        </div>
        <div class="col-6">
            <p>
                <button style="max-width: 50%;" type="button" class="btn btn-primary position-relative">
                    <?= $data['product']['type_name'] ?>
                </button>
            </p>
            <p>Артикул: <?= $data['product']['articul'] ?></p>
            <p>Старая цена: <s><?= $data['product']['price_old'] ?> ₽</s></p>
            <p>Цена: <?= $data['product']['price'] ?> ₽</p>
            <p class="card-text">Описание: <?= $data['product']['content'] ?></p>
            <?php
            if (!empty($data['product']['params'])) {
                foreach ($data['product']['params'] as $param) {
                    ?>
                    <p><?= $param['param_name'] ?>: <?= $param['variant_name'] ?></p>
                <?php }
            }
            ?>
        </div>

    </div>


<?php include_once 'partial/footer.php';
