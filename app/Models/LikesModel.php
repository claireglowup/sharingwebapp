<?php

namespace App\Models;

use CodeIgniter\Model;

class LikesModel extends Model
{
    protected $table = "likes";
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'id_author', 'id_blog'];

    public function getLikesById($id)
    {
        try {
            $query = "SELECT likes.id_author
                  FROM likes 
                  JOIN blog on blog.id = likes.id_blog
                  WHERE blog.id = ?";
            return $this->db->query($query, [$id])->getResult();
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }
}
