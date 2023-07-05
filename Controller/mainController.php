<?php 
include '../Model/productModel.php';
class ProductController {
    private $productModel;
    private $view;

    public function index () {
        // Gọi model để lấy dữ liệu
        $data = $this->productModel->getAllProduct();
        // Gọi view để hiển thị dữ liệu vừa lấy
        $this->view->render('../View/index.php', ['data' => $data]);
    }

    public function detail () {
        // Gọi model để lấy dữ liệu
        $data = $this->productModel->getProductById();
        // Gọi view để hiển thị dữ liệu vừa lấy
        $this->view->render('produc-detail.php',$data);
    }
    public function addToCart () {
        
    }
    public function removeFromCart () {
        
    }
}
class UserController {
    public function login () {
        
    }
    public function register () {
        
    }
    public function doLogin () {
        
    }
    public function doRegister () {
        
    }
    public function logOut () {
        
    }
}


?>