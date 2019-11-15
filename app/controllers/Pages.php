<?php
    class Pages extends Controller
    {
        public function index($data = [])
        {
            $this->view('pages/index');
        }

        public function about($data = [])
        {
            echo 'about' . $data[0];
        }
    }
    