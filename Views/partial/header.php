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
                  </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/table">Таблица товаров</a>
                </li>
                <?php if (isset($_SESSION['user_id'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/add">Добавить товар</a>
                </li>
                <?php } ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <span class="nav-link">Добро пожаловать, <?= $_SESSION['user_name']; ?></a>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/logout">Выйти</a>
                    </li>
                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/register">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/login">Войти</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<body>
<div class="container-xxl bd-gutter py-4">

