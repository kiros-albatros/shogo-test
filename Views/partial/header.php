<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link type="text/css" href="/style.css" rel="stylesheet" media="all"/>
    <title>Test for Shogo</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-xxl bd-gutter">
        <a class="navbar-brand" href="/">Shogo test</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Каталог</a>
                    <ul class="dropdown-menu">
                        <?php
                        if (isset($data['sections'])) {
                        foreach ($data['sections'] as $section) { ?>
                            <li><a class="dropdown-item" href="<?= URLROOT . '/section/' . $section['id'];?>"><?=$section['name'];?></a></li>
                        <?php    }
                        }
                        ?>
                        <li><a class="dropdown-item" href="#"> Dropdown item 2 » </a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                                <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
                                <li><a class="dropdown-item" href="#">Submenu item 3 » </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                                        <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
                                <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                        <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
                        </li></ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/table">Таблица товаров</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/add">Добавить товар</a>
                </li>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <?php if ($_SESSION['user_role'] == 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT; ?>/user">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT; ?>/admin/files">Файлы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT; ?>/admin/directories">Папки</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT; ?>/file">Ваши файлы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT; ?>/directory">Ваши папки</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT; ?>/files/shared">Доступные файлы</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Добавить
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= URLROOT; ?>/file/add">Добавить файл</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= URLROOT; ?>/directory/add">Добавить папку</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                <?php }; ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <span class="nav-link">Добро пожаловать,
                            <a href="<?= URLROOT; ?>/users/<?= $_SESSION['user_id']; ?>"><?= $_SESSION['user_email']; ?></a>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/user/logout">Выйти</a>
                    </li>
                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/user/register">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/user/login">Войти</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<body>
<div class="container-xxl bd-gutter py-4">

