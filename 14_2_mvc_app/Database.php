<?php

    namespace app;

    use PDO;

    class Database 
    {
        public \PDO $pdo;
        
        public function __construct()
        {
            $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function getProducts($search = '')
        {
            if (!empty($search)) {
                $statment = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
                $statment->bindValue(':title', "%$search%");
            } else {
                $statment = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
            }

            $statment->execute();
            
            return $statment->fetchAll(PDO::FETCH_ASSOC); // Fetch as Associative array.
        }
    }
?>