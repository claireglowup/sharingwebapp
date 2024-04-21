<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use Exception;
use Ramsey\Uuid\Uuid;


class Auth extends BaseController
{

    protected $authorModel;
    public function __construct()
    {
        $this->authorModel = new AuthorModel();
    }

    public function loginV()
    {
        if (session()->get("userId")) {
            return redirect()->to("/");
        } else {
            return view("pages/login", ['title' => "Login"]);
        }
    }

    public function signupV()
    {
        if (session()->get("userId")) {
            return redirect()->to("/");
        } else {
            return view("pages/signup", ['title' => "Sign up"]);
        }
    }


    public function signup()
    {
        try {
            $pw = $this->request->getPost("password");
            $password = password_hash(strval($pw), PASSWORD_DEFAULT);
            $uuid = Uuid::uuid4();
            $id = $uuid->toString();

            $data = [
                'id' => $id,
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $password
            ];

            $this->authorModel->insert($data);

            return redirect()->to("/login");
        } catch (\Exception $e) {

            log_message('error', 'Gagal menyimpan data author: ' . $e->getMessage());
            echo "gagal bang";
        }
    }


    public function login()
    {


        try {
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            // Ambil data pengguna berdasarkan email
            $user = $this->authorModel->where('email', $email)->first();


            // Periksa apakah data pengguna ditemukan
            if ($user) {
                // Jika ditemukan, Anda bisa mencetak atribut-atribut pengguna
                if (password_verify(strval($password), $user['password'])) {
                    $session = session();
                    $session->set('isLoggedIn', true);
                    $session->set('userId', $user['id']);

                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('password', "Password Salah");
                    session()->setFlashdata('emailV', $email);
                    session()->setFlashdata('passwordV', $password);

                    return view('pages/login', ['title' => "Login"]);
                }
            } else {
                session()->setFlashdata('email', "Email tidak ditemukan");
                session()->setFlashdata('emailV', $email);
                session()->setFlashdata('passwordV', $password);

                return view('pages/login', ['title' => "Login"]);
            }
        } catch (Exception $e) {
            // Tangkap dan tangani kesalahan yang terjadi
            echo "Terjadi kesalahan: " . $e->getMessage();
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
