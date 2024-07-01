<?php
require '../function.php';
$security_question = '';
$error = '';

if (isset($_POST['check_user'])) {
    $username = $_POST['username'];

    $query = "SELECT security_question FROM user WHERE username = '$username' OR user_id = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $security_question = $row['security_question'];
    } else {
        $error = 'Username tidak ditemukan di database!';
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $security_answer = $_POST['security_answer'];

    $query = "SELECT * FROM user WHERE username = '$username' OR user_id = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['security_answer'] === $security_answer) {
            // Redirect ke halaman reset password atau tampilkan form reset password
            header("Location: reset-password.php?username=$username");
            exit;
        } else {
            echo "<script>alert('Jawaban pertanyaan keamanan salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan di database!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | KANTOR IMIGRASI KELAS II TPI LHOKSEUMAWE</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap4/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Forgot Password</h4>
                        
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>

                        <?php if (empty($security_question)): ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" required>
                                </div>
                                <button class="btn btn-primary" name="check_user">Check Username</button>
                            </form>
                        <?php else: ?>
                            <form action="" method="post">
                                <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
                                <div class="form-group">
                                    <label for="security_question">Security Question</label>
                                    <input type="text" class="form-control" name="security_question" id="security_question" value="<?= htmlspecialchars($security_question) ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="security_answer">Security Answer</label>
                                    <input type="text" class="form-control" name="security_answer" id="security_answer" required>
                                </div>
                                <button class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        <?php endif; ?>
                        
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
