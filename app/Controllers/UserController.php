<?php

namespace App\Controllers;


use App\Models\UserModel;
use App\Models\GenderModel;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function adduser()
    {
        $data = array();
        helper('form');

        if ($this->request->is('post')) {
            $post = $this->request->getPost([
                "first_name",
                "middle_name",
                "last_name",
                "age",
                "gender_id",
                "email",
                "password"
            ]);

            $rules = [
                'first_name' => [
                    'label' => 'First Name',
                    'rules' => 'required'
                ],
                'middle_name' => [
                    'label' => 'Middle Name',
                    'rules' => 'permit_empty'
                ],

                'last_name' => [
                    'label' => 'Last Name',
                    'rules' => 'required'
                ],

                'age' => [
                    'label' => 'Age',
                    'rules' => 'required|numeric'
                ],

                'gender_id' => [
                    'label' => 'Gender Id',
                    'rules' => 'required|numeric'
                ],

                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|numeric|is_unique[users.email]'
                ],

                'password' => [
                    'label' => 'Password',
                    'rules' => 'required'
                ],

                'confirm_password' => [
                    'label' => 'Password',
                    'rules' => 'required_with[password]|matches[password]'
                ],
            ];

            if ($this->validate($rules)) {
                $data['validtion'] = $this->validator;
            } else {
                $userModel = new UserModel();
                $post['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
                $userModel->insert($data);

                return "User Sucessfully Saved";
            }
        }

        $genderModel = new GenderModel();
        $genders = $genderModel->findAll();

        $data['genders'] = $genders;

        return view('user/add', $data);
    }
}
