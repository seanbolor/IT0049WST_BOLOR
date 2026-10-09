<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        return view('users', [
            'users' => $userModel
                ->orderBy('created_at', 'DESC')
                ->findAll(),
        ]);
    }

    public function new()
    {
        helper(['form', 'url']);

        return view('user_new');
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        $messages = [
            'username' => [
                'required'  => 'Username is required.',
                'is_unique' => 'This username is already being used.',
            ],
            'full_name' => [
                'required' => 'Full name is required.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput();
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => trim($this->request->getPost('username')),
            'full_name'  => trim($this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to('/users')
            ->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        helper(['form', 'url']);

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            return redirect()->to('/users');
        }

        return view('user_edit', [
            'user' => $user,
        ]);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            return redirect()->to('/users');
        }

        $avatar = $this->request->getFile('avatar');

        $rules = [
            'username' => [
                'rules' => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
                'errors' => [
                    'required'  => 'Username is required.',
                    'is_unique' => 'This username is already being used.',
                ],
            ],
            'full_name' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Full name is required.',
                ],
            ],
        ];

        $hasNewAvatar = $avatar !== null
            && $avatar->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasNewAvatar) {
            $rules['avatar'] = [
                'label' => 'Profile picture',
                'rules' => [
                    'uploaded[avatar]',
                    'max_size[avatar,2048]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpeg,image/png]',
                    'ext_in[avatar,jpg,jpeg,png]',
                ],
                'errors' => [
                    'uploaded' => 'Please select an image.',
                    'max_size'  => 'The image must not exceed 2MB.',
                    'is_image'  => 'The uploaded file must be an image.',
                    'mime_in'   => 'Only JPG and PNG images are allowed.',
                    'ext_in'    => 'Only JPG and PNG files are allowed.',
                ],
            ];
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username'  => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
        ];

        if ($hasNewAvatar && $avatar->isValid() && ! $avatar->hasMoved()) {
            $uploadPath = FCPATH . 'uploads';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            $newName = $avatar->getRandomName();
            $avatar->move($uploadPath, $newName);

            service('image')
                ->withFile($uploadPath . DIRECTORY_SEPARATOR . $newName)
                ->fit(300, 300, 'center')
                ->save($uploadPath . DIRECTORY_SEPARATOR . $newName);

            $data['avatar'] = $newName;
        }

        $userModel->update($id, $data);

        return redirect()
            ->to('/users')
            ->with('success', 'User updated successfully.');
    }
}