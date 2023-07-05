<?php 
class UserModel {
    public function getAllUsers() {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Chuẩn bị truy vấn SQL
        $query = "SELECT * FROM users";
    
        // Thực thi truy vấn SQL
        $statement = $db->query($query);
    
        // Lấy danh sách người dùng từ kết quả truy vấn
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Trả về danh sách người dùng
        return $users;
    }

    public function getUserById($id) {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Chuẩn bị truy vấn SQL
        $query = "SELECT * FROM users WHERE id = $id";
    
        // Thực thi truy vấn SQL
        $statement = $db->query($query);
    
        // Lấy thông tin người dùng từ kết quả truy vấn
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Trả về danh sách người dùng
        return $users;
    }

    public function createUser($data) {
        // Kết nối đến cơ sở dữ liệu
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Lấy dữ liệu từ mảng $data
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $fullname = $data['fullname'];
        $address = $data['address'];

        // Chuẩn bị truy vấn SQL
        $query = "INSERT INTO users (username, password ,email ,fullname ,address) VALUES (:username, :password, :email, :fullname, :address)";

        // Tạo prepared statement
        $statement = $db->prepare($query);

        // Gán giá trị vào các tham số
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fullname', $fullname);
        $statement->bindValue(':address', $address);

        // Thực thi truy vấn SQL
        $result = $statement->execute();

        // Kiểm tra kết quả thực thi
            if ($result) {
            // Trả về ID của người dùng vừa tạo
                return $db->lastInsertId();
            } else {
            // Trả về giá trị sai nếu có lỗi xảy ra
                return false;
            }
    }

    public function updateUser($id, $data) {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Lấy dữ liệu từ mảng $data
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $fullname = $data['fullname'];
        $address = $data['address'];

        // Chuẩn bị truy vấn SQL
        $query = "UPDATE users SET username = :username, password = :password, email = :email, fullname = :fullname, address = :address WHERE id = :id";

        // Tạo prepared statement
        $statement = $db->prepare($query);

        // Gán giá trị vào các tham số
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fullname', $fullname);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':id', $id);

        // Thực thi truy vấn SQL
        $result = $statement->execute();

        // Trả về result
        return $result;
    }

    public function deleteUser($id) {
        $db = new PDO('mysql:host=localhost;dbname=webbandienthoai', 'root', '');

        // Chuẩn bị truy vấn SQL
        $query = "DELETE * FROM users WHERE id = $id";
    
        // Thực thi truy vấn SQL
        $statement = $db->query($query);
    
        // Lấy thông tin người dùng từ kết quả truy vấn
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Trả về danh sách người dùng
        return $result;
    }
}
?>