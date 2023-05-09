<?php
include_once 'partial/header.php'; ?>

<div class="register col-4 mx-auto">
    <h3>Регистрация</h3>
    <form action="<?=URLROOT?>/register" method="post">
        <span class=""
              style="width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: var(--bs-danger-text);">
            <?php echo (!empty($data['form']['empty_err']) ? $data['form']['empty_err'] : ""); ?>
        </span>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input type="email" required class="form-control <?php echo (!empty($data['form']['email_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="email" value="<?php echo $data['form']['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['form']['email_err']; ?></span>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Имя</label>
            <input type="text" required class="form-control <?php echo (!empty($data['form']['name_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="name" value="<?php echo $data['form']['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['form']['email_err']; ?></span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" required id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" required id="exampleInputPassword2" name="repeat_password">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
