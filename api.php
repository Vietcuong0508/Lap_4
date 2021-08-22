<?php
require 'resful_api.php';
class api extends restful_api{
    function __construct(){
        parent::__construct();
    }

    function user(){
        if ($this->method == 'GET'){
            $connection = new mysqli("localhost", 'root', '','php_demo');
            $query = $connection->query('SELECT * FROM customers');
            $data = array();
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
            $this->response(200, $data);
        }else if ($this->method == 'POST'){
            $id = '';
            $name = '';
            $price = '';
            $thumbnail = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["id"])) {
                    $id = $_POST['id'];
                }
                if (isset($_POST["name"])) {
                    $name = $_POST['name'];
                }
                if (isset($_POST["price"])) {
                    $price = $_POST['price'];
                }
                if (isset($_POST["thumbnail"])) {
                    $thumbnail = $_POST['thumbnail'];
                }
            }
            $connection = new mysqli("localhost", 'root', '','laravel_demo');
            $query = $connection->query("INSERT INTO customers (id, name, price, thumbnail)
    VALUES ('$id', '$name', '$price', '$thumbnail')");
            if ($query === TRUE) {
                echo "Thêm dữ liệu thành công";
            } else {
                echo "Error: " . "<br>" . $connection->error;
            }
//Đóng database
            $connection->close();
        }
    }
}

$user_api = new api();
