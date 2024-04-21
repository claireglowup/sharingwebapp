<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\LikesModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\API\ResponseTrait;
use Ramsey\Uuid\Uuid;



class Author extends BaseController
{
    use ResponseTrait;

    protected $blogModel;
    protected $likesModel;
    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->likesModel = new LikesModel();
    }

    public function index()
    {
        if (session()->get("userId")) {
            return view("pages/write", ['title' => "Write"]);
        } else {
            return redirect()->to("/login");
        }
    }

    public function getAllBlogs()
    {

        $id = session()->get("userId");
        if ($id) {

            $request = service('request');
            $currentPage = $request->getVar('page');
            $perpage = (int) 8;
            $offset = (int) ($currentPage - 1) * $perpage;
            $totalRows = ceil($this->blogModel->getRowsBlog() / $perpage);

            $data = $this->blogModel->getAllBlogs($perpage, $offset);
            return view("/pages/allblogs", ["blogs" => $data, "rows" => $totalRows, 'title' => "All Blogs"]);
        } else {
            return redirect()->to("/login");
        }
    }

    public function inventori()
    {
        $id = session()->get("userId");
        if ($id) {
            $request = service('request');
            $currentPage = $request->getVar('page');
            $perpage = (int) 4;
            $offset = (int) ($currentPage - 1) * $perpage;

            $totalRows = ceil($this->blogModel->getRowsBlogById($id) / $perpage);

            $blogs = $this->blogModel->getBlogForInventori($id, $perpage, $offset);

            return view("pages/inventori", ['blogs' => $blogs, 'rows' => $totalRows, 'title' => "Inventori"]);
        } else {
            return redirect()->to("/login");
        }
    }

    public function edit()
    {

        $request = service('request');
        $parameter = $request->getVar('id');
        $blog = $this->blogModel->getBlogById($parameter);

        return view("pages/edit", ["blog" => $blog, 'title' => "Blog"]);
    }




    public function addBlog()
    {

        if (session()->get("userId")) {
            try {

                $title = $this->request->getPost("title");
                $content = $this->request->getPost("content");
                $uuid = Uuid::uuid4();
                $id = $uuid->toString();

                $data = [
                    'id' => $id,
                    'title' => $title,
                    'content' => $content,
                    'id_author' => session()->get("userId")

                ];

                $this->blogModel->insert($data);

                return redirect()->to("/inventori?page=1");
            } catch (\Exception $e) {

                log_message('error', 'Gagal menyimpan data author: ' . $e->getMessage());
                echo "gagal bang";
            }
        } else {
            return redirect()->to("/login");
        }
    }
    public function readBlog()
    {
        $request = service('request');
        $parameter = $request->getVar('id');
        $blog = $this->blogModel->getBlogById($parameter);

        $cekLike = false;
        $likes = $this->likesModel->getLikesById($parameter);

        // Ekstrak id_author dari setiap hasil likes
        $likedAuthors = array_column($likes, 'id_author');

        // Periksa apakah userId ada dalam likedAuthors
        if (in_array(session()->get("userId"), $likedAuthors)) {
            $cekLike = true;
        }

        return view("pages/blog", ['blog' => $blog, "isLiked" => $cekLike, 'title' => "Blog"]);
    }

    public function editAction()
    {
        if (session()->get("userId")) {
            $request = service('request');
            $parameter = $request->getVar('id');

            $title = $this->request->getPost("title");
            $content = $this->request->getPost("content");



            $this->blogModel->updateBlog($parameter, $title, $content);

            return redirect()->to("/inventori?page=1");
        } else {
            return redirect()->to("/login");
        }
    }

    public function likeBlog()
    {
        // Mengambil data JSON dari permintaan
        if (session()->get("userId")) {
            $data = $this->request->getJSON();

            // Memeriksa apakah properti yang diperlukan ada dalam data
            if (!isset($data->id_blog) || !isset($data->id_author)) {
                // Jika properti tidak lengkap, memberikan respons dengan pesan kesalahan
                return $this->fail('Missing required data', 400);
            }
            $uuid = Uuid::uuid4();
            $id = $uuid->toString();

            $likeData = [
                'id' => $id,
                'id_blog' => (string) $data->id_blog,
                'id_author' => (string)$data->id_author
            ];



            $this->likesModel->insert($likeData);

            $responseData = [
                'message' => 'Success: Blog liked',
            ];

            return $this->respond($responseData, 200);
        } else {
            $responseData = [
                'message' => 'UNAUTHORIZED',
            ];
            return $this->respond($responseData, 401);
        }
    }

    public function deleteBlog()
    {

        if (session()->get("userId")) {

            $request = service('request');
            $parameter = $request->getVar('id');

            $this->blogModel->deleteBlog($parameter);

            return redirect()->to("/inventori?page=1");
        } else {
            return redirect()->to("/login");
        }
    }
}
