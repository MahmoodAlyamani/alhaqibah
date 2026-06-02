<?php

require_once 'includes/auth.php';

requireLogin();

require_once '../includes/functions.php';

$products = getProducts();

?>

<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        إدارة الملفات

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

            <div>

                <!-- LOGO -->

                <div class="admin-logo">

                    <i class="fa-solid fa-layer-group"></i>

                    <h2>

                        الحقيبة التعليمية

                    </h2>

                </div>

                <!-- MENU -->

                <ul class="admin-menu">

                    <li>

                        <a href="dashboard.php">

                            <i class="fa-solid fa-house"></i>

                            الرئيسية

                        </a>

                    </li>

                    <li class="active">

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

            </div>

        </aside>

        <!-- CONTENT -->

        <main class="admin-content">

            <!-- TOPBAR -->

            <div class="admin-page-header">

                <div>

                    <h1>

                        إدارة الملفات

                    </h1>

                    <p>

                        إدارة جميع الملفات التعليمية والإدارية

                    </p>

                </div>

                <a
                    href="add-product.php"
                    class="admin-add-btn">

                    <i class="fa-solid fa-plus"></i>

                    إضافة ملف جديد

                </a>

            </div>

            <!-- TABLE -->

            <div class="admin-table-wrapper">

                <table class="admin-table">

                    <thead>


                        <tr>

                            <th>

                                الصورة

                            </th>

                            <th>

                                اسم الملف

                            </th>

                            <th>

                                القسم

                            </th>

                            <th>

                                السعر

                            </th>

                            <th>

                                الإجراءات

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>

                                <tr>

                                    <!-- IMAGE -->

                                    <td>

                                        <img
                                            src="../<?php echo htmlspecialchars($product['image'] ?? ''); ?>"
                                            class="admin-product-image"
                                            alt="<?php echo htmlspecialchars($product['title'] ?? ''); ?>">

                                    </td>

                                    <!-- TITLE -->

                                    <td>

                                        <?php echo htmlspecialchars($product['title'] ?? ''); ?>

                                    </td>

                                    <!-- CATEGORY -->

                                    <td>

                                        <span class="admin-category">

                                            <?php echo htmlspecialchars($product['category'] ?? ''); ?>

                                        </span>

                                    </td>

                                    <!-- PRICE -->

                                    <td>

                                        <?php echo !empty($product['price']) ? $product['price'] . ' ريال' : '-'; ?>

                                    </td>

                                    <!-- ACTIONS -->

                                    <td>

                                        <div class="admin-actions">

                                            <!-- EDIT -->

                                            <a
                                                href="edit-product.php?id=<?php echo $product['id']; ?>"
                                                class="edit-btn">

                                                <i class="fa-solid fa-pen"></i>

                                            </a>

                                            <!-- DELETE -->

                                            <a
                                                href="delete-product.php?id=<?php echo $product['id']; ?>"
                                                class="delete-btn"
                                                onclick="return confirm('هل أنت متأكد من حذف الملف؟')">

                                                <i class="fa-solid fa-trash"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="5" style="text-align:center;padding:30px;">

                                    لا توجد ملفات مضافة حالياً

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</body>

</html>