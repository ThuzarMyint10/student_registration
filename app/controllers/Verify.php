<?php
session_start();
class Verify extends Controller
{
    public function __construct()
    {
        $this->db = new Database();
        $is_confrimed = $this->db->setConfirmAndActive($_SESSION['email']);
        redirect('pages/login');

    }

    public function index()
    {

    }
}

?>