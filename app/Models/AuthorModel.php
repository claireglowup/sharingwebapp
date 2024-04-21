<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table = "author";
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'email', 'username', 'password', 'bio'];
}
