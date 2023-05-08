<?php
const ROUTES = [
    '' => ['GET' => 'MainController::main()'],
    'table'=>['GET' => 'ProductController::getTable()'],
    'section_params/{id}'=>['GET' => 'ProductController::getSectionParams()'],
    'add'=>['GET' => 'ProductController::addForm()', 'POST' => 'ProductController::addProduct()'],
    'product/{id}'=>['GET' => 'ProductController::getProduct()'],
    'section/{id}'=>['GET' => 'ProductController::getProductsBySection()'],

    'register' => ['GET' => 'UserController::getRegister()', 'POST' => 'UserController::register()'],
    'login' => ['GET' => 'UserController::getLogin()', 'POST' => 'UserController::login()'],
    'logout' => ['GET' => 'UserController::logout()'],
    'profile' => ['GET' => 'UserController::getProfile()', 'POST' => 'UserController::editProfile()'],
];