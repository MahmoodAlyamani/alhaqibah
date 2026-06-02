<?php

require_once 'includes/config.php';

$pageTitle = SITE_NAME;

?>
<?php

include 'includes/functions.php';

$products = getProducts();

$pageTitle = 'الرئيسية';

include 'includes/header.php';

?>


<!-- ========================= -->
<!-- HERO -->
<!-- ========================= -->

<section class="hero">

    <!-- HERO CENTER -->

    <div class="hero-wrapper">

        <!-- VISUAL -->

        <div class="hero-visual">

            <div class="orbit-container">

                <div class="center-logo">
                    <img src="<?php echo BASE_URL; ?>/assets/images/logo.png" alt="logo">
                </div>

                <div class="floating-item item1">
                    <i class="fa-solid fa-user-group"></i>
                    <span>المعلمين</span>
                </div>

                <div class="floating-item item2">
                    <i class="fa-solid fa-school"></i>
                    <span>الإدارة المدرسية</span>
                </div>

                <div class="floating-item item3">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>الوكلاء</span>
                </div>

                <div class="floating-item item4">
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>النشاط الطلابي</span>
                </div>

                <div class="floating-item item5">
                    <i class="fa-solid fa-heart-pulse"></i>
                    <span>التوجيه الصحي</span>
                </div>

                <div class="floating-item item6">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>التطوير المهني</span>
                </div>

            </div>

        </div>

        <!-- CONTENT -->

        <div class="hero-content centered-hero">

            <span class="hero-badge">

                <i class="fa-solid fa-layer-group"></i>

                تصميم وإعداد الملفات التعليمية والإدارية

            </span>

            <h1>

                ملفات الكادر التعليمي
                <span>

                    باحترافية وتميز

                </span>

            </h1>

            <p>

                جميع الملفات والسجلات والخطط التعليمية
                والإدارية مصممة بعناية وجودة عالية
                لتناسب الكادر التعليمي والإداري
                وفق الدليل التنظيمي والإجرائي.

            </p>

            <!-- BUTTONS -->

            <div class="hero-buttons">

                <a href="<?php echo BASE_URL; ?>/pages/sections.php"
                    class="primary-btn">

                    <i class="fa-solid fa-layer-group"></i>

                    استعراض الأقسام

                </a>

                <a
                    href="https://wa.me/966576625873?text=السلام عليكم 🌺 أرغب بالاستفسار عن الملفات التعليمية"
                    class="secondary-btn whatsapp-btn"
                    target="_blank">

                    <i class="fa-brands fa-whatsapp"></i>

                    تواصل واتساب

                </a>

            </div>

            <!-- STATS -->

            <div class="hero-stats">

                <div class="stat-box">

                    <i class="fa-solid fa-file-lines"></i>

                    <h3>

                        +100

                    </h3>

                    <p>

                        ملف احترافي

                    </p>

                </div>

                <div class="stat-box">

                    <i class="fa-solid fa-layer-group"></i>

                    <h3>

                        +15

                    </h3>

                    <p>

                        قسم متنوع

                    </p>

                </div>

                <div class="stat-box">

                    <i class="fa-solid fa-award"></i>

                    <h3>

                        جودة عالية

                    </h3>

                    <p>

                        تصميم متقن

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- FEATURED PRODUCTS -->
<!-- ========================= -->

<section class="featured-section">

    <div class="section-heading">

        <span>

            أحدث الملفات

        </span>

        <h2>

            ملفات تعليمية وإدارية
            <br>

            بتصميم احترافي متقن

        </h2>

        <p>

            مجموعة مميزة من الملفات التعليمية
            والإدارية المصممة بعناية للكادر التعليمي.

        </p>

    </div>

    <!-- PRODUCTS -->

    <div class="featured-grid">

        <?php

        include 'includes/functions.php';

        $featuredProducts = getFeaturedProducts(6);

        ?>

        <?php if (!empty($featuredProducts)): ?>

            <?php foreach ($featuredProducts as $product): ?>

                <div class="product-card reveal">

                    <!-- IMAGE -->

                    <div class="product-image">

                        <img
                            src="<?php echo $product['image']; ?>"
                            alt="<?php echo $product['title']; ?>">

                        <?php if (!empty($product['badge'])): ?>

                            <span class="product-badge">

                                <?php echo $product['badge']; ?>

                            </span>

                        <?php endif; ?>

                    </div>

                    <!-- CONTENT -->

                    <div class="product-content">

                        <span class="product-category">

                            <?php echo $product['category']; ?>

                        </span>

                        <h3>

                            <?php echo $product['title']; ?>

                        </h3>

                        <p>

                            <?php echo $product['description']; ?>

                        </p>

                        <!-- BUTTONS -->

                        <div class="product-buttons">

                            <a
                                href="pages/product.php?id=<?php echo $product['id']; ?>"
                                class="details-btn">

                                عرض التفاصيل

                            </a>

                            <?php if (!empty($product['whatsapp'])): ?>

                                <a
                                    href="<?php echo $product['whatsapp']; ?>"
                                    target="_blank"
                                    class="buy-btn">

                                    <i class="fa-brands fa-whatsapp"></i>

                                    طلب الآن

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</section>

<!-- ========================= -->
<!-- QUICK SECTIONS -->
<!-- ========================= -->

<section class="quick-sections">

    <div class="section-heading">

        <span>

            الأقسام الرئيسية

        </span>

        <h2>

            تصفح الأقسام التعليمية

        </h2>

    </div>

    <div class="quick-grid">

        <!-- CARD -->

        <a href="<?php echo BASE_URL; ?>/pages/teachers.php"
            class="quick-card">

            <i class="fa-solid fa-user-group"></i>

            <h3>

                ملفات المعلمين

            </h3>

        </a>

        <!-- CARD -->

        <a href="<?php echo BASE_URL; ?>/pages/management.php"
            class="quick-card">

            <i class="fa-solid fa-school"></i>

            <h3>

                الإدارة المدرسية

            </h3>

        </a>

        <!-- CARD -->

        <a href="<?php echo BASE_URL; ?>/pages/supervisors.php"
            class="quick-card">

            <i class="fa-solid fa-user-tie"></i>

            <h3>

                الوكلاء

            </h3>

        </a>

        <!-- CARD -->

        <a href="<?php echo BASE_URL; ?>/pages/activity.php"
            class="quick-card">

            <i class="fa-solid fa-lightbulb"></i>

            <h3>

                النشاط الطلابي

            </h3>

        </a>

        <!-- CARD -->

        <a href="<?php echo BASE_URL; ?>/pages/health.php"
            class="quick-card">

            <i class="fa-solid fa-heart-pulse"></i>

            <h3>

                التوجيه الصحي

            </h3>

        </a>

        <!-- CARD -->

        <a href="<?php echo BASE_URL; ?>/pages/professional-development.php"
            class="quick-card">

            <i class="fa-solid fa-graduation-cap"></i>

            <h3>

                التطوير المهني

            </h3>

        </a>

    </div>

</section>

<!-- ========================= -->
<!-- WHY US -->
<!-- ========================= -->

<section class="why-us">

    <div class="section-heading">

        <span>

            لماذا نحن ؟

        </span>

        <h2>

            لماذا يختارنا الكادر التعليمي ؟

        </h2>

    </div>

    <div class="why-grid">

        <!-- BOX -->

        <div class="why-box">

            <i class="fa-solid fa-award"></i>

            <h3>

                جودة عالية

            </h3>


            <p>

                تصميم احترافي ومتقن
                وفق أعلى معايير الجودة.

            </p>

        </div>

        <!-- BOX -->

        <div class="why-box">

            <i class="fa-solid fa-bolt"></i>

            <h3>

                جاهزية فورية

            </h3>

            <p>

                الملفات جاهزة مباشرة
                بعد الطلب والمعاينة.

            </p>

        </div>

        <!-- BOX -->

        <div class="why-box">

            <i class="fa-solid fa-layer-group"></i>

            <h3>

                تنوع كبير

            </h3>

            <p>

                أقسام متعددة تشمل
                كافة الكوادر التعليمية.

            </p>

        </div>

    </div>

</section>

<?php include "includes/footer.php"; ?>