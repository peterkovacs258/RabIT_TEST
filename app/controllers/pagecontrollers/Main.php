<?php
class Main extends Controller {
    public function __construct() {
    }

    //Index
    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }


}
