<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\News;
use CodeIgniter\Exceptions\PageNotFoundException;

class NewsAdmin extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $news = new News();
        $data = $db->table('news')->select('*, categories.name as categories')->join('categories', 'categories.id = categories_id')->get();
        return view('admin_list_news', ['data' => $data]);
    }

    public function preview($id)
    {
        $news = new News();
        $data['news'] = $news->where('id', $id)->first();

        if (!$data['news']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('news_detail', $data);
    }

    public function create()
    {
        $categories = new CategoriesModel();
        $data['categories'] = $categories->findAll();
        $validation = \Config\Services::validation();
        $validation->setRules(['title' => 'required', 'categories_id' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $news = new News();
            $news->insert([
                'title' => $this->request->getPost('title'),
                'categories_id' => $this->request->getPost('categories_id'),
                'content' => $this->request->getPost('content'),
                'status' => $this->request->getPost('status'),
                'slug' => url_title($this->request->getPost('title'), '-', TRUE)
            ]);
            return redirect('admin/news');
        }

        return view('admin_create_news', $data);
    }

    public function edit($id)
    {
        $news = new News();
        $data['news'] = $news->where('id', $id)->first();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'title' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $news->update($id, [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status')
            ]);
            return redirect('admin/news');
        }

        return view('admin_edit_news', $data);
    }

    public function delete($id)
    {
        $news  = new News();
        $news->delete($id);
        return redirect('admin/news');
    }
}
