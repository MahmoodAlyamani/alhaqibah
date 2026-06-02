<?php

require_once __DIR__ . '/config.php';

if (!isset($pageTitle)) {

    $pageTitle = SITE_NAME;
}

?>

<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta
        name="description"
        content="<?php echo htmlspecialchars(SITE_DESCRIPTION); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        <?php echo htmlspecialchars($pageTitle); ?>

    </title>

    <!-- CSS -->

    <link
        rel="stylesheet"
        href="<?php echo BASE_URL; ?>/assets/css/style.css">

    <!-- Google Fonts -->

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="<?php echo BASE_URL; ?>/assets/fontawesome/css/all.min.css">

</head>

<body>

    <!-- ========================= -->
    <!-- NAVBAR -->
    <!-- ========================= -->

    <header class="navbar"
        id="navbar">

        <!-- LOGO -->

        <div class="logo">

            <a href="<?php echo BASE_URL; ?>/index.php">

                <img
                    src="<?php echo BASE_URL; ?>/assets/images/logo.png"
                    alt="logo">

            </a>

            <h2>

                <?php echo SITE_NAME; ?>

            </h2>

        </div>

        <!-- MOBILE MENU BUTTON -->

        <div class="menu-toggle"
            id="menuToggle">

            <i class="fa-solid fa-bars"></i>

        </div>

        <!-- NAVIGATION -->

        <nav id="navMenu">

            <ul>

                <li>

                    <a href="<?php echo BASE_URL; ?>/index.php">

                        الرئيسية

                    </a>

                </li>

                <li>

                    <a href="<?php echo BASE_URL; ?>/pages/sections.php">

                        الأقسام

                    </a>

                </li>

                <li>

                    <a href="<?php echo BASE_URL; ?>/pages/products.php">

                        جميع الملفات 

                    </a>

                </li>




                <li>

                    <a href="<?php echo BASE_URL; ?>/pages/search.php">

                        البحث

                    </a>

                </li>

                <li>

                    <a href="<?php echo BASE_URL; ?>/pages/about.php">

                        من نحن

                    </a>

                </li>

                <li>

                    <a href="#footer">

                        تواصل معنا

                    </a>

                </li>

            </ul>

        </nav>

    </header>