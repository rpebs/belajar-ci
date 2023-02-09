<?php

namespace App\Libraries;

use App\Models\News;

class Widget
{

    public function recentPost(array $params)
    {
        $model = model(News::class);
        $data['news'] = $model->findAll();
        return view('widget/recent_post', $data, $params);
    }
}
