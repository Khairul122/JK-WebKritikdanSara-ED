<?php
require '../function.php';

if (!isset($_GET['username'])) {
    header("Location: forgot-password.php");
    exit;
}

$username = $_GET['username'];

if (isset($_POST['reset'])) {
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $query = "UPDATE user SET password = '$new_password' WHERE username = '$username' OR user_id = '$username'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Password berhasil direset!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat mereset password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | KANTOR IMIGRASI KELAS II TPI LHOKSEUMAWE</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap4/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Reset Password</h4>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" required>
                            </div>
                            <button class="btn btn-primary" name="reset">Reset Password</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap4/js/bootstrap.min.js"></script>
</body>

</html>
