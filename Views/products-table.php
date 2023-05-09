<?php
include_once 'partial/header.php'; ?>
    <h3 class="mb-5 text-center">Таблица товаров</h3>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <?php
            if (isset($data['columns'])) {
                foreach ($data['columns'] as $column) { ?>
                    <th scope="col"><?= $column ?></th>
                    <?php
                }
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($data['products'])) {
            foreach ($data['products'] as $product) { ?>
                <tr>
                    <?php
                    foreach ($product as $key => $value) {
                        if ($key == 'url') { ?>
                            <td><img height="70px" src="<?= URLROOT . '/images/' . $value ?>" alt=""></td>
                        <?php } else if ($key == 'params') { ?>
                            <td>
                                <?php foreach ($value as $param) { ?>
                                    <div>
                                        <span><?= $param['param_name'] ?>: <?= $param['variant_name'] ?></span>
                                    </div>
                                <?php } ?>
                            </td>
                        <?php } else { ?>
                            <td><?= $value ?></td>
                        <?php }
                    } ?>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

<?php include_once 'partial/footer.php';
