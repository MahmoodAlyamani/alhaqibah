<?php

require_once 'includes/auth.php';

requireLogin();

?>
<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        إضافة ملف جديد

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

                    <li>

                        <a href="products.php">

                            <i class="fa-solid fa-file-lines"></i>

                            إدارة الملفات

                        </a>

                    </li>

                    <li class="active">

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

            <!-- HEADER -->

            <div class="admin-page-header">

                <div>

                    <h1>

                        إضافة ملف جديد

                    </h1>

                    <p>

                        إضافة ملف تعليمي أو إداري جديد للموقع

                    </p>

                </div>

            </div>

            <!-- FORM -->

            <div class="admin-form-wrapper">

                <form
                    action="save-product.php"
                    method="POST"
                    enctype="multipart/form-data"
                    class="admin-form">

                    <!-- TITLE -->

                    <div class="form-group">

                        <label>

                            اسم الملف

                        </label>

                        <input
                            type="text"
                            name="title"
                            required>

                    </div>

                    <!-- CATEGORY -->

                    <div class="form-group">

                        <label>

                            القسم

                        </label>

                        <select
                            name="category"
                            required>

                            <option value="ملفات المعلمين">
                                ملفات المعلمين
                            </option>

                            <option value="الإدارة المدرسية">
                                الإدارة المدرسية
                            </option>

                            <option value="الموجهون التربويون">
                                الموجهون التربويون
                            </option>

                            <option value="النشاط الطلابي">
                                النشاط الطلابي
                            </option>

                            <option value="الصحة المدرسية">
                                الصحة المدرسية
                            </option>

                            <option value="التطوير المهني">
                                التطوير المهني
                            </option>

                        </select>

                    </div>

                    <!-- PRICE -->

                    <div class="form-group">

                        <label>

                            السعر

                        </label>

                        <input
                            type="number"
                            name="price"
                            value="0">

                    </div>

                    <!-- DESCRIPTION -->

                    <div class="form-group">

                        <label>

                            وصف الملف

                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            required></textarea>

                    </div>

                    <!-- IMAGE -->

                    <div class="form-group">

                        <label>

                            صورة الملف

                        </label>

                        <input
                            type="file"
                            name="images[]"
                            multiple


                            accept="image/*"
                            required>

                    </div>
                    <!-- FEATURES -->

                    <div class="form-group">

                        <label>

                            مميزات الملف

                        </label>

                        <div class="features-wrapper">

                            <input
                                type="text"
                                name="features[]"
                                placeholder="مثال: قابل للتعديل">

                            <input
                                type="text"
                                name="features[]"
                                placeholder="مثال: جاهز للطباعة">

                            <input
                                type="text"
                                name="features[]"
                                placeholder="مثال: متوافق مع الجودة">

                            <input
                                type="text"
                                name="features[]"
                                placeholder="مثال: تحديثات مجانية">

                        </div>

                    </div>
                    <!-- PDF -->

                    <div class="form-group">

                        <label>

                            ملف PDF

                        </label>

                        <input
                            type="file"
                            name="pdf"
                            accept=".pdf"
                            required>

                    </div>

                    <!-- WHATSAPP -->

                    <div class="form-group">

                        <label>

                            رابط واتساب الطلب

                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            required>

                    </div>

                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="admin-submit-btn">

                        <i class="fa-solid fa-floppy-disk"></i>

                        حفظ الملف

                    </button>

                </form>

            </div>

        </main>

    </div>

</body>

</html>