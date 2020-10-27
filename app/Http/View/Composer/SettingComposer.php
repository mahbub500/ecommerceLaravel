<?php

namespace App\Http\View\Composer;

use App\Category;
use App\User;
use Illuminate\View\View;

class SettingComposer
{

    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}