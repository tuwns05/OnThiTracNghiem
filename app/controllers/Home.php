<?php
namespace App\Controllers;
use App\Core\Controller;

class Home extends Controller {

    public function index() {
        $this->view('pages/index');
    }

    public function dangky() {
        $this->view('pages/dangky');        
    }

    public function dangnhap() {
        $this->view('pages/dangnhap');
    }
}