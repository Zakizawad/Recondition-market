<?php
@include 'connection.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $pass = md5($_POST['user_password']);
    $cpass = md5($_POST['user_cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM users WHERE user_email = '$email' && user_password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Passwords do not match!';
        } else {
            $insert = "INSERT INTO users(user_name, user_email, user_password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/login_style.css">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>

    <div class="form-container">
        <form action="" method="POST">
            <h3>Register</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>

            <input type="text" name="user_name" required placeholder="Enter your name">
            <input type="text" name="user_email" required placeholder="Enter your email">
            <input type="text" name="user_password" required placeholder="Enter your password">
            <input type="text" name="user_cpassword" required placeholder="confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login_form.php"> Login now</a></p>

        </form>
    </div>

</body>

</html>