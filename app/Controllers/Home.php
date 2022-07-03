<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Welcome !!';
        return view('Home/IndexView', $data);
    }
}
