<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\News as ModelsNews;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    public function index()
    {
        $news = new ModelsNews();
        $data['news'] = $news->where('status', 'published')->findAll();
        return view('news', $data);
    }

    public function viewNews($slug)
    {
        $news = new ModelsNews();
        $data['news'] = $news->where([
            'slug' => $slug,
            'status' => 'published'
        ])->first();

        if (!$data['news']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('news_detail', $data);
    }
}
