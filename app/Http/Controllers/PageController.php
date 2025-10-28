<?php

namespace App\Http\Controllers;

// Должен наследоваться от Controller
class PageController extends Controller
{
    public function about()
    {
        // Точка используется вместо /.
        // То есть шаблон находится по пути resources/views/page/about.blade.php
        return view('page.about');
    }

    public function team()
    {
        return view('page.team');
    }
}