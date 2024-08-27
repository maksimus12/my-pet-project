<?php

class UserController
{
    private $model;
    private $errors = [];

    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }

    public function userListPage()
    {
        //Эта переменная должна называться точно так же, как и в файле index.php
        //по которой делается foreach
        $users = $this->model->getRecords();

        include_once __DIR__ . '/../Views/user_list.php';
    }

    public function addUserPage($post)
    {
        if (isset($post['submit'])) {
            $data = [
                'name' => $post['name'],
                'email' => $post['email'],
                'phone' => $post['phone'],
            ];

            if (empty($data['name'])) {
                $this->errors['name'] = "Name field is required*";
            }
            if (empty($data['email'])) {
                $this->errors['email'] = "Email field is required*";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = "Should be a valid email*";
            }
            if (empty($data['phone'])) {
                $this->errors['phone'] = "Phone field is required*";
            } elseif (!is_numeric($data['phone'])) {
                $this->errors['phone'] = "Should be a valid number*";
            }

            if (empty($this->errors)) {
                if ($this->model->insertUser($data)) {
                    header('Location: /users');
                } else {
                    echo 'Insert error';
                }
            }
        }

        //Нужно объявить переменную $errors, чтобы в файле add.php она была доступна.
        //Все переменные которые нужны во view, должны быть объявлены тут.
        $errors = $this->errors;

        include_once __DIR__ . '/../Views/add.php';
    }
}
