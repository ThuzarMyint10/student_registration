<?php

class Pages extends Controller
{

    private $db;
    public function __construct() {
        $this->db = new Database();
    }

    public function index()
    {
        $this->view('pages/register');
    }

    public function login() {
        $this->view('pages/login');
    }

    public function create() {
        $this->view('pages/create');
    }

    public function register() {
        $this->view('pages/register');
    }

    public function about()
    {
        $this->view('pages/about');
    }

    public function dashboard()
    {
        $this->view('pages/dashboard');
    }

}