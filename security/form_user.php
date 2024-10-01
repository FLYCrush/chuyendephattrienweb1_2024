<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Thêm 1 user mới
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = base64_decode($_GET['id']); // Mã hóa ID
    $user = $userModel->findUserById($_id); // Update thông tin user
}

// Kiểm tra 
if (!empty($_POST['submit'])) {
    // Kiểm tra tên
    if (empty($_POST['name'])) {
        $errors['name'] = "Bạn bắt buộc phải nhập tên!!!";
    } else if (!preg_match("/^[A-Za-z0-9]{5,15}$/", $_POST['name'])) {
        $errors['name'] = "Tên phải chứa ký tự hợp lệ như sau: A-Z, a-z, 0-9 và có chiều dài từ 5 đến 15 ký tự!!!";
    }

    //  Kiểm tra password
    if (empty($_POST['password'])) {
        $errors['password'] = "Bạn bắt buộc phải nhập mật khẩu!!!";
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()])[A-Za-z0-9~!@#$%^&*()]{5,10}$/", $_POST['password'])) {
        $errors['password'] = "Mật khẩu bao gồm: chữ viết thường a-z, chữ viết HOA A-Z, số từ 0-9 và các ký tự đặc biệt sau: ~!@#$%^&*()";
    }

    if (empty($errors)) {
        $_user_id = $_SESSION['user_id'] ?? NULL; 
        if (!empty($_user_id)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        unset($_SESSION['user_id']); 
        header('Location: list_users.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    <?php if (isset($errors['name'])): ?>
                        <div class="text-danger"><?php echo $errors['name']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <?php if (isset($errors['password'])): ?>
                        <div class="text-danger"><?php echo $errors['password']; ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
                </div>
        <?php } ?>
    </div>
</body>
</html>