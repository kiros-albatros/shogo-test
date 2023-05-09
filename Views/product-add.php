<?php
include_once 'partial/header.php'; ?>
    <h3 class="mb-5 text-center">Добавление товара</h3>
    <form class="row g-3" method="POST" enctype="multipart/form-data" action="<?=URLROOT?>/add">
        <div class="col-md-6">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="articul" class="form-label">Артикул</label>
            <input type="text" class="form-control" name="articul" required>
        </div>
        <div class="col-md-6">
            <label for="section" class="form-label">Раздел</label>
        <select class="form-select section-select" name="section" aria-label="Default select example">
            <option value="100" selected>Выберите раздел</option>
            <?php
            foreach ($data['sections'] as $section) { ?>
                <option value="<?=$section['id']?>"><?=$section['name']?></option>
            <?php }
            ?>
        </select>
        </div>
        <div class="col-2">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" name="price" placeholder="4999" required>
        </div>
        <div class="col-2">
            <label for="price_old" class="form-label">Старая цена</label>
            <input type="number" class="form-control" name="price_old" placeholder="5000" required>
        </div>
        <div class="col-2">
            <label for="position" class="form-label">Позиция</label>
            <input type="number" class="form-control" name="position" placeholder="5" required>
        </div>
        <div class="col-6">
            <label for="content" class="form-label">Описание</label>
            <div class="form-floating">
                <textarea class="form-control" name="content" required></textarea>
            </div>
        </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Тип</label>
                <select class="form-select" name="type" aria-label="Default select example">
                    <option value="100">Выберите тип</option>
                    <?php
                    foreach ($data['types'] as $type) { ?>
                        <option value="<?=$type['id']?>"><?=$type['name']?></option>
                    <?php }
                    ?>
                </select>
        </div>
            <div class="mb-3 col-6">
                <label for="formFile" class="form-label">Изображение товара</label>
                <input class="form-control" name="url" type="file" id="formFile">
            </div>

        <div class="col-6">
            <label for="notice" class="form-label">Примечания</label>
            <input type="text" class="form-control" name="notice" required>
        </div>
        <div class="col-12">
            <h6>Параметры</h6>
            <div class="params-wrapper"></div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="visible" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Показывать товар
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
<?php
include_once 'partial/footer.php';
