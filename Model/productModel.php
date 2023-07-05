<?php 
class ProductModel {
    public function getAllProduct() {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Chuẩn bị truy vấn SQL
        $query = "SELECT * FROM products";
    
        // Thực thi truy vấn SQL
        $statement = $db->query($query);
    
        // Lấy danh sách sản phẩm từ kết quả truy vấn
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Trả về danh sách sản phẩm
        return $products;
    }

    public function getProductById($id) {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Chuẩn bị truy vấn SQL
        $query = "SELECT * FROM products WHERE id = $id";
    
        // Thực thi truy vấn SQL
        $statement = $db->query($query);
    
        // Lấy thông tin sản phẩm từ kết quả truy vấn
        $product = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Trả về thông tin sản phẩm
        return $product;
    }

    public function createProduct($data) {
        // Kết nối đến cơ sở dữ liệu
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Lấy dữ liệu từ mảng $data
        $name = $data['name'];
        $brand = $data['brand'];
        $price = $data['price'];
        $description = $data['description'];
        $main_image = $data['main_image'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $image3 = $data['image3'];

        // Chuẩn bị truy vấn SQL
        $query = "INSERT INTO products (name, brand ,price ,description ,main_image ,image1 ,image2 ,image3) VALUES (:name, :brand, :price, :description, :main_image, :image1 ,:image2 ,:image3)";

        // Tạo prepared statement
        $statement = $db->prepare($query);

        // Gán giá trị vào các tham số
        $statement->bindValue(':name', $name);
        $statement->bindValue(':brand', $brand);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':main_image', $main_image);
        $statement->bindValue(':image1', $image1);
        $statement->bindValue(':image2', $image2);
        $statement->bindValue(':image3', $image3);

        // Thực thi truy vấn SQL
        $result = $statement->execute();

        // Kiểm tra kết quả thực thi
            if ($result) {
            // Trả về ID của sản phẩm vừa tạo
                return $db->lastInsertId();
            } else {
            // Trả về giá trị sai nếu có lỗi xảy ra
                return false;
            }
    }

    public function updateProduct($id, $data) {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Lấy dữ liệu từ mảng $data
        $name = $data['name'];
        $brand = $data['brand'];
        $price = $data['price'];
        $description = $data['description'];
        $main_image = $data['main_image'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $image3 = $data['image3'];

        // Chuẩn bị truy vấn SQL
        $query = "UPDATE products SET name = :name, brand = :brand, price = :price, description = :description, main_image = :main_image, image1 = :image1, image2 = image2, image3 = image3 WHERE id = :id";

        // Tạo prepared statement
        $statement = $db->prepare($query);

        // Gán giá trị vào các tham số
        $statement->bindValue(':name', $name);
        $statement->bindValue(':brand', $brand);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':main_image', $main_image);
        $statement->bindValue(':image1', $image1);
        $statement->bindValue(':image2', $image2);
        $statement->bindValue(':image3', $image3);
        $statement->bindValue(':id', $id);
        // Thực thi truy vấn SQL
        $result = $statement->execute();

        // Trả về result
        return $result;
    }

    public function deleteProduct($id) {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Chuẩn bị truy vấn SQL
        $query = "DELETE * FROM products WHERE id = $id";
    
        // Thực thi truy vấn SQL
        $statement = $db->query($query);
    
        // Lấy thông tin người dùng từ kết quả truy vấn
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Trả về danh sách người dùng
        return $result;
    }
}
?>