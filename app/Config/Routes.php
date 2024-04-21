<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//view
$routes->get('/', 'Home::index');
$routes->get('/signup', 'Auth::signupV');
$routes->get('/login', 'Auth::loginV');

$routes->get('/write', 'Author::index');
$routes->get('/blog', 'Author::readBlog');
$routes->get('/inventori', 'Author::inventori');
$routes->get("/blog/fix", "Author::edit");
$routes->get("/blogs", "Author::getAllBlogs");




//action
$routes->get('/logout', 'Auth::logout');
$routes->post('/signup', 'Auth::signup');
$routes->post('/login', 'Auth::login');
$routes->post('/write', 'Author::addBlog');
$routes->post("/blog/fix", "Author::editAction");
$routes->get("blog/delete", "Author::deleteBlog");
$routes->post("/like", "Author::likeBlog");
