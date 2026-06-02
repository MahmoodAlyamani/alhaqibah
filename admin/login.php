<?php

require_once 'includes/auth.php';

if (isLoggedIn()) {

    header("Location: dashboard.php");

    exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (login($username, $password)) {

        header("Location: dashboard.php");

        exit;
    } else {

        $error = "بيانات الدخول غير صحيحة";
    }
}
?>

<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        تسجيل دخول الأدمن

    </title>

    <!-- FONT -->

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <!-- FONT AWESOME -->

    <link
        rel="stylesheet"
        href="../assets/fontawesome/css/all.min.css">

    <!-- CSS -->

    <link
        rel="stylesheet"
        href="assets/css/admin.css">

</head>

<body>

    <div class="admin-login-page">

        <!-- GLOW -->

        <div class="login-glow glow1"></div>

        <div class="login-glow glow2"></div>

        <!-- LOGIN BOX -->

        <form
            method="POST"
            class="admin-login-box">

            <!-- ICON -->

            <div class="admin-login-icon">

                <i class="fa-solid fa-shield-halved"></i>

            </div>

            <!-- TITLE -->

            <h1>

                لوحة التحكم

            </h1>

            <p>

                قم بتسجيل الدخول لإدارة الموقع

            </p>

            <!-- ERROR -->

            <?php if (!empty($error)): ?>

                <div class="admin-error">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <?php echo htmlspecialchars($error); ?>

                </div>

            <?php endif; ?>

            <!-- INPUT -->

            <div class="admin-input">

                <i class="fa-solid fa-user"></i>

                <input
                    type="text"
                    name="username"
                    placeholder="اسم المستخدم"
                    autocomplete="username"
                    required>

            </div>

            <!-- INPUT -->

            <div class="admin-input">

                <i class="fa-solid fa-lock"></i>

                <input
                    type="password"
                    name="password"
                    placeholder="كلمة المرور"
                    autocomplete="current-password"
                    required>

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="admin-login-btn">

                <i class="fa-solid fa-right-to-bracket"></i>

                تسجيل الدخول

            </button>

        </form>

    </div>

</body>

</html>