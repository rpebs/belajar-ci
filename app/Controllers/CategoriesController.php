<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Categories;
use App\Models\CategoriesModel;

class CategoriesController extends BaseController
{
    public function index()
    {
        $categories = new CategoriesModel();
        $data['categories'] = $categories->findAll();

        return view('categories_list', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(['name' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $categories = new CategoriesModel();
            $categories->insert([
                'name' => $this->request->getPost('name'),
            ]);
            return redirect('admin/categories');
        }

        return view('categories_create');
    }

    public function edit($id)
    {
        $categories = new CategoriesModel();
        $data['categories'] = $categories->where('id', $id)->first();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'name' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $categories->update($id, [
                'name' => $this->request->getPost('name'),
            ]);
            return redirect('admin/categories');
        }

        return view('categories_edit', $data);
    }

    public function delete($id)
    {
        $cat = new CategoriesModel();
        $cat->delete($id);
        return redirect('admin/categories');
    }
}
