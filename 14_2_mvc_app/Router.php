<?php

    namespace app;

    class Router 
    {

        public array $getRoutes = [];
        public array $postRoutes = [];
        public ?Database $database = null;
        
        public function __construct()
        {
            $this->db = new Database();
        }

        public function get($url, $fn)
        {
            $this->getRoutes[$url] = $fn;
        }   

        public function post($url, $fn)
        {
            $this->postRoutes[$url] = $fn;
        }
    
        public function renderView($view, $params = []) //Excepts: 'products/index'
        {
            foreach ($params as $key => $value) {
                $$key = $value;
            }

            ob_start();
            include_once __DIR__."/views/$view.php";
            $content = ob_get_clean();
            include_once __DIR__."/views/layouts/index.php";
        }

        public function resolve()
        {
            $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
            $method = $_SERVER['REQUEST_METHOD'];

            // Step 01: Determine GET and POST routes to update the function.
            if ($method === 'GET') {
                $fn = $this->getRoutes[$currentUrl] ?? null;
            } else {
                $fn = $this->postRoutes[$currentUrl] ?? null;
            }

            // Step 01: Handle the router function for delegation.
            if ($fn) {
                call_user_func($fn, $this);
            } else {
                echo "Page not found!";
            }
        }   
    }

?>