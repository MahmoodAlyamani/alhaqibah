<?php

require_once 'includes/auth.php';

requireLogin();

require_once '../includes/functions.php';

$products = getProducts();

$totalProducts = count($products);

$totalCategories = [];

foreach ($products as $product) {

    if (!empty($product['category'])) {

        $totalCategories[] = $product['category'];
    }
}

$totalCategories = count(array_unique($totalCategories));

$featuredProducts = 0;

foreach ($products as $product) {

    if (!empty($product['featured'])) {

        $featuredProducts++;
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

        لوحة التحكم

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

    <div class="admin-dashboard">

        <!-- SIDEBAR -->

        <aside class="admin-sidebar">

            <!-- LOGO -->

            <div class="admin-logo">

                <i class="fa-solid fa-layer-group"></i>

                <h2>

                    الحقيبة التعليمية

                </h2>

            </div>

            <!-- MENU -->

            <ul class="admin-menu">

                <li class="active">

                    <a href="dashboard.php">

                        <i class="fa-solid fa-house"></i>

                        الرئيسية

                    </a>

                </li>

                <li>

                    <a href="products.php">

                        <i class="fa-solid fa-file-lines"></i>

                        إدارة الملفات

                    </a>

                </li>

                <li>

                    <a href="add-product.php">

                        <i class="fa-solid fa-plus"></i>

                        إضافة ملف

                    </a>

                </li>

                <li>

                    <a href="logout.php">

                        <i class="fa-solid fa-right-from-bracket"></i>

                        تسجيل الخروج

                    </a>

                </li>

            </ul>

        </aside>

        <!-- CONTENT -->

        <main class="admin-content">

            <!-- TOP -->

            <div class="admin-topbar">

                <h1>

                    لوحة التحكم

                </h1>

                <span>

                    مرحباً بك 👋

                </span>

            </div>

            <!-- STATS -->

            <div class="admin-stats">

                <!-- CARD -->

                <div class="admin-stat-card">

                    <div class="stat-icon">

                        <i class="fa-solid fa-file-lines"></i>

                    </div>

                    <div>

                        <h3>

                            <?php echo $totalProducts; ?>

                        </h3>

                        <p>

                            إجمالي الملفات

                        </p>

                    </div>

                </div>

                <!-- CARD -->

                <div class="admin-stat-card">

                    <div class="stat-icon">

                        <i class="fa-solid fa-layer-group"></i>

                    </div>

                    <div>

                        <h3>

                            <?php echo $totalCategories; ?>

                        </h3>

                        <p>

                            الأقسام

                        </p>

                    </div>

                </div>

                <!-- CARD -->

                <div class="admin-stat-card">

                    <div class="stat-icon">

                        <i class="fa-solid fa-star"></i>

                    </div>

                    <div>

                        <h3>

                            <?php echo $featuredProducts; ?>

                        </h3>

                        <p>

                            الملفات المميزة

                        </p>

                    </div>

                </div>

            </div>

            <!-- WELCOME -->

            <div class="admin-welcome-box">

                <h2>

                    أهلاً بك في لوحة التحكم ✨

                </h2>

                <p>

                    يمكنك إدارة الملفات التعليمية
                    والإدارية وإضافة الملفات
                    وتعديلها وحذفها بسهولة من
                    مكان واحد.
                </p>

            </div>

        </main>

    </div>

</body>

</html>