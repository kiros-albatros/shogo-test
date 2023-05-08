<?php
foreach ($data as $param) {
?>
    <div class="col-md-6 mb-3">
        <label for="section" class="form-label"><?=$param['param_name']?></label>
        <select class="form-select section-select" name="variants[]" aria-label="Default select example">
            <?php
            foreach ($param['variants'] as $variant) { ?>
                <option value="<?=$variant['variant_id']?>"><?=$variant['variant_name']?></option>
            <?php }
            ?>
        </select>
    </div>
<?php  }
?>
