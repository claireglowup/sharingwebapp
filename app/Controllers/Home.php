<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\BlogModel;



class Home extends BaseController
{
    protected $authorModel;
    protected $blogModel;
    public function __construct()
    {
        $this->authorModel = new AuthorModel();
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        $userId = session()->get("userId");
        $blogs = $this->blogModel->getBlog();

        if ($userId) {
            $user = $this->authorModel->where('id', $userId)->first();

            return view('pages/home',  ['user' => $user, 'blogs' => $blogs, 'title' => "Sharing"]);
        } else {
            return view('pages/home', ['blogs' => $blogs, 'title' => "Sharing"]);
        }
    }
}
