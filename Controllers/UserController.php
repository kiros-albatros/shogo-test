<?php

class UserController extends Controller
{
    protected $userModel;
    protected $sectionModel;
    protected $sections;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->sectionModel = $this->model('SectionModel');
        $this->sections = $this->sectionModel->findAllSections();
    }

    function sanitize($str): string
    {
        return trim(htmlspecialchars($str));
    }

    public function createUserSession($user)
    {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
        $session_id = sha1(random_bytes(100)) . sha1(random_bytes(100));
        setcookie('session_id', $session_id, 0, '/', '', false, true);
    }

    public function getLogin()
    {
        $data['sections'] = $this->sections;
        $data['form'] = [
            'email' => '',
            'password' => '',
            'password_err' => '',
            'email_err' => '',
            'empty_err' => ''
        ];
        $this->view('login', $data);
    }

    public function login()
    {
        $data['form'] = [
            'email' => '',
            'password' => '',
            'password_err' => '',
            'email_err' => '',
            'empty_err' => ''
        ];
        $data['sections'] = $this->sections;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
                $data['form']['email'] = $this->sanitize($_POST['email']);
                $data['form']['password'] = $this->sanitize($_POST['password']);

                $user = $this->userModel->findUserByEmail($data['form']['email']);
                if ($user) {
                    if ($user['password'] === $data['form']['password']) {
                        $this->createUserSession($user);
                        $path = 'Location:' . URLROOT;
                        header($path);
                    } else {
                        $data['form']['password_err'] = "Неверный пароль";
                        $this->view('login', $data);
                    }
                } else {
                    $data['form']['email_err'] = 'Пользователь с такой почтой не зарегистрирован';
                    $this->view('login', $data);
                }
            }
        }
        $data['form']['empty_err'] = 'Заполните все поля';
        $this->view('login', $data);
    }

    public function logout()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            session_destroy();
            $path = 'Location:' . URLROOT;
            header($path);
        } else {
            echo 'Вы не авторизованы';
        }
    }

    public function getRegister()
    {
        $data['form'] = [
            'name' => '',
            'email' => '',
            'password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'empty_err' => ''
        ];
        $data['sections'] = $this->sections;
        $this->view('register', $data);
    }

    public function register()
    {
        $data['sections'] = $this->sections;
        $data['form'] = [
            'name' => '',
            'email' => '',
            'password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'empty_err' => ''
        ];
        if (isset($_POST['name']) && isset($_POST['email'])
            && isset($_POST['password']) && isset($_POST['repeat_password'])
        ) {
            if ($_POST['password'] !== $_POST['repeat_password']) {
                $data['form']['password_err'] = 'Пароли должны быть одинаковыми';
            } elseif ($this->userModel->findUserByName(trim($_POST['name']))) {
                $data['form']['name_err'] = 'Это имя уже занято';
            } elseif ($this->userModel->findUserByEmail(trim($_POST['email']))) {
                $data['form']['email_err'] = 'Эта почта уже используется';
            } else {
                $userData['name'] = $this->sanitize(trim($_POST['name']));
                $userData['email'] = $this->sanitize(trim($_POST['email']));
                $userData['password'] = $this->sanitize(trim($_POST['password']));
                $this->userModel->addUser($userData);
                $user = $this->userModel->findUserByName(trim($_POST['name']));
                $this->createUserSession($user);
                $path = 'Location:' . URLROOT;
                header($path);
            }
        } else {
            $data['form']['empty_err'] = 'Заполните все поля';
        }
        $data['form']['name'] = $_POST['name'];
        $data['form']['email'] = $_POST['email'];
        $data['form']['password'] = $_POST['password'];
        $this->view('register', $data);
    }

    public function getProfile()
    {
        if (!isset($_SESSION['user_id'])) {
            $path = 'Location:' . URLROOT;
            header($path);
        } else {
            $user = $this->userModel->findUserById($_SESSION['user_id']);
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'telephone' => $user->telephone,
                'password' => $user->password,
                'name_err' => '',
                'email_err' => '',
                'telephone_err' => '',
                'password_err' => '',
                'empty_err' => ''
            ];
            $this->view('profile', $data);
        }
    }
}