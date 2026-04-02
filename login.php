<?php
require_once __DIR__ . '/includes/db.php';

if (!empty($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
    redirect_to('dashboard.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = 'Please enter both email and password.';
    } else {
        $stmt = $conn->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            redirect_to('dashboard.php');
        } else {
            $error = 'Invalid email or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px 20px;
        }

        .login-box {
            max-width: 420px;
            margin: 0 auto;
            background: #ffffff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            border: 0;
            border-radius: 4px;
            background: #0b5ed7;
            color: #ffffff;
            cursor: pointer;
        }

        .error {
            margin-bottom: 16px;
            padding: 10px;
            border-radius: 4px;
            background: #f8d7da;
            color: #842029;
        }

        .register-link {
            margin-top: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        <?php if ($error !== ''): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            <a href="<?php echo app_url('register.php'); ?>">Create an account</a>
        </div>
    </div>
</body>
</html>
