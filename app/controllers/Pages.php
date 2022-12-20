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

    public function township() {
        $this->view('pages/township_list');
    }

    public function townshipEdit() {
        $this->view('pages/township_list');
    }

    public function street() {
        $this->view('pages/street_name_list');
    }
    
    public function semester() {
        $this->view('pages/semester');
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