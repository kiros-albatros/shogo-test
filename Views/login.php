<?php
include_once 'partial/header.php'; ?>
<div class="col-5 mx-auto">
    <h3>Вход</h3>
    <form action="<?php echo URLROOT; ?>/login" method="post">
        <span class=""
              style="width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: var(--bs-danger-text);"><?php echo (!empty($data['form']['empty_err']) ? $data['form']['empty_err'] : ""); ?></span>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input type="text" class="form-control <?php echo (!empty($data['form']['email_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="email" value="<?php echo $data['form']['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['form']['email_err']; ?></span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control <?php echo (!empty($data['form']['password_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="password" value="<?php echo $data['form']['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['form']['password_err']; ?></span>
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>
<?php
include_once 'partial/footer.php'; ?>
