<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = "blog";
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'title', 'content', 'id_author', 'created_at'];

    public function getBlogById($id)
    {
        try {

            $query = "SELECT blog.id, blog.title, blog.content, author.username, COUNT(likes.id) AS total_likes, author.id as id_author
            FROM blog
            JOIN author ON blog.id_author = author.id
            LEFT JOIN likes ON likes.id_blog = blog.id
            WHERE blog.id = ?
            GROUP BY blog.id, blog.title, blog.created_at, author.username
        ";

            return $this->db->query($query, [$id])->getRow();
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }

    public function getBlog()
    {

        try {

            $query = "SELECT blog.id, blog.title, blog.created_at, author.username, COUNT(likes.id) AS total_likes
                        FROM blog
                        JOIN author ON blog.id_author = author.id
                        LEFT JOIN likes ON likes.id_blog = blog.id
                        GROUP BY blog.id, blog.title, blog.created_at, author.username
                        ORDER BY total_likes DESC
                        LIMIT 4
                    ";


            return $this->db->query($query)->getResult();
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }

    public function getBlogForInventori($id, int $limit, int $offset)
    {

        try {

            $query = "SELECT blog.id, blog.title, blog.created_at, author.username, COUNT(likes.id) AS total_likes
                        FROM blog
                        JOIN author ON blog.id_author = author.id
                        LEFT JOIN likes ON likes.id_blog = blog.id
                        WHERE author.id = ?
                        GROUP BY blog.id, blog.title, blog.created_at, author.username
                        LIMIT ? OFFSET ?";

            return $this->db->query($query, [$id, $limit, $offset])->getResult();
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }

    public function getAllBlogs(int $limit, int $offset)
    {

        try {

            $query = "SELECT blog.id, blog.title, blog.created_at, author.username, COUNT(likes.id) AS total_likes
                        FROM blog
                        JOIN author ON blog.id_author = author.id
                        LEFT JOIN likes ON likes.id_blog = blog.id
                        GROUP BY blog.id, blog.title, blog.created_at, author.username
                        LIMIT ? OFFSET ?";


            return $this->db->query($query, [$limit, $offset])->getResult();
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }

    public function getRowsBlogById($id)
    {
        try {

            $query = "SELECT COUNT(*) as total_rows
                        FROM blog
                        JOIN author ON blog.id_author = author.id
                        WHERE author.id = ?";

            $result = $this->db->query($query, [$id])->getRow();
            return $result->total_rows;
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }
    public function getRowsBlog()
    {
        try {

            $query = "SELECT COUNT(*) as total_rows
                        FROM blog
                        JOIN author ON blog.id_author = author.id";

            $result = $this->db->query($query)->getRow();
            return $result->total_rows;
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }

    public function updateBlog($id, $title, $content)
    {
        try {
            $query = "UPDATE blog
                      SET title = ?, content = ?
                      WHERE id = ?";

            $this->db->query($query, [$title, $content, $id]);
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }

    public function deleteBlog($id)
    {

        try {
            $query = "DELETE FROM blog WHERE id = ?";

            $this->db->query($query, [$id]);
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            log_message('error', $e->getMessage()); // Misalnya, log pesan kesalahan

        }
    }
}
