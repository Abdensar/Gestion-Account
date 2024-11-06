<?php
session_start();
include('validation.php');
$redirect = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['email'] = trim($_POST['email']);
    $_SESSION['password'] = $_POST['password'];

    $validation_result = validate($_POST['email'], $_POST['password'], $redirect, "login");

    if ($validation_result == 2) {
        // Only set the session email if validation is successful
        $_SESSION['email'] = $_POST['email'];
        header("Location: home.php");
        exit();
    } else {
        // Clear the session email if validation fails
        unset($_SESSION['email']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('navbar.php'); ?>

    <form class="m-4" method="post">
        <div class="form-group mb-3">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" required>
            <small class="text-danger">
                <?php echo isset($_SESSION['erroremailLogin']) ? $_SESSION['erroremailLogin'] : ''; ?>
            </small>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            <small class="text-danger">
                <?php echo isset($_SESSION['errorpasswordLogin']) ? $_SESSION['errorpasswordLogin'] : ''; ?>
            </small>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>

</html>