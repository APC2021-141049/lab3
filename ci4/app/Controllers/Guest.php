<?php

namespace App\Controllers;

use App\Models\GuestModel;

class Guest extends BaseController
{
    public function index()
    {
        $model = model(GuestModel::class);

        $data = [
            'email'  => $model->getGuest(),
            'title' => 'Guest list',
        ];

        return view('templates/header', $data)
            . view('pages/list')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(GuestModel::class);

        $data['email'] = $model->getGuest($slug);

        if (empty($data['email'])) {
            throw new PageNotFoundException('Cannot find the guest: ' . $slug);
        }

        $data['name'] = $data['email']['name'];

        return view('templates/header', $data)
            . view('pages/list')
            . view('templates/footer');
    }
	public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['name' => 'Guest list'])
                . view('pages/main')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['name', 'comment']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'name' => 'required|max_length[255]|min_length[3]',
            'comment'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['name' => 'Guest list'])
                . view('pages/main')
                . view('templates/footer');
        }

        $model = model(GuestModel::class);

        $model->save([
            'name' => $post['name'],
            'email'  => url_title($post['name'], '-', true),
            'comments'  => $post['comments'],
        ]);

        return view('templates/header', ['name' => 'Guest list'])
            . view('pages/success')
            . view('templates/footer');
    }
}