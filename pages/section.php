<?php

include '../includes/functions.php';

$category = isset($_GET['category'])
    ? $_GET['category']
    : '';

$search = isset($_GET['search'])
    ? trim($_GET['search'])
    : '';

$categoryMap = [

    'teachers' => 'ملفات المعلمين',

    'management' => 'الإدارة المدرسية',

    'supervisors' => 'الوكلاء',

    'activity' => 'النشاط الطلابي',

    'health' => 'التوجيه الصحي',

    'professional-development' => 'التطوير المهني'

];

$realCategory = $categoryMap[$category] ?? '';

$products = getProductsByCategory($realCategory);
if (!empty($search)) {

    $filtered = [];

    foreach ($products as $product) {

        $text =
            $product['title'] . ' ' .
            $product['description'];

        if (
            stripos($text, $search) !== false
        ) {

            $filtered[] = $product;
        }
    }

    $products = $filtered;
}

include '../includes/header.php';

?>

<!-- ========================= -->
<!-- SECTION HERO -->
<!-- ========================= -->

<?php

$categories = [

    'teachers' => [

        'title' => 'ملفات المعلمين',
        'icon'  => 'fa-user-group',
        'desc'  => 'ملفات وسجلات وخطط المعلمين والمعلمات باحترافية عالية.'

    ],

    'management' => [

        'title' => 'الإدارة المدرسية',
        'icon'  => 'fa-school',
        'desc'  => 'نماذج الإدارة المدرسية والتنظيم الإداري والملفات الرسمية.'

    ],

    'supervisors' => [

        'title' => 'الوكلاء',
        'icon'  => 'fa-user-tie',
        'desc'  => 'ملفات الوكلاء وخطط المتابعة والتنظيم والإشراف.'

    ],

    'activity' => [

        'title' => 'النشاط الطلابي',
        'icon'  => 'fa-lightbulb',
        'desc'  => 'خطط وبرامج وأنشطة طلابية احترافية جاهزة.'

    ],

    'health' => [

        'title' => 'التوجيه الصحي',
        'icon'  => 'fa-heart-pulse',
        'desc'  => 'ملفات وبرامج التوعية والصحة المدرسية.'

    ],

    'professional-development' => [

        'title' => 'التطوير المهني',
        'icon'  => 'fa-graduation-cap',
        'desc'  => 'برامج التطوير المهني والنمو المهني للكادر التعليمي.'

    ]

];

$currentCategory = $categories[$category] ?? null;

$pageTitle = $currentCategory['title'] ?? 'القسم';

?>

<!-- ========================= -->
<!-- BREADCRUMB -->
<!-- ========================= -->

<div class="breadcrumb">

    <a href="../index.php">

        الرئيسية

    </a>

    <span>/</span>

    <a href="sections.php">

        الأقسام

    </a>

    <span>/</span>

    <span>

        <?php echo $currentCategory['title'] ?? 'القسم'; ?>

    </span>

</div>

<!-- ========================= -->
<!-- HERO -->
<!-- ========================= -->

<section class="section-hero premium-section-hero">

    <div class="section-hero-content">

        <div class="section-icon">

            <i class="fa-solid <?php echo $currentCategory['icon']; ?>"></i>

        </div>

        <span class="section-badge">

           استعراض ملفات القسم

        </span>

        <h1>

            <?php echo $currentCategory['title']; ?>

        </h1>

        <p>

            <?php echo $currentCategory['desc']; ?>

        </p>

        <div class="section-stats">

            <div class="section-stat">

                <strong>

                    <?php echo count($products); ?>

                </strong>

                <span>

                    ملف داخل القسم

                </span>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- CATEGORY NAVIGATION -->
<!-- ========================= -->

<section class="category-navigation">

    <a href="section.php?category=teachers"
        class="<?php echo $category == 'teachers' ? 'active' : ''; ?>">

        <i class="fa-solid fa-user-group"></i>

        <span>

            المعلمين

        </span>

    </a>

    <a href="section.php?category=management"
        class="<?php echo $category == 'management' ? 'active' : ''; ?>">

        <i class="fa-solid fa-school"></i>

        <span>

            الإدارة المدرسية

        </span>

    </a>

    <a href="section.php?category=supervisors"
        class="<?php echo $category == 'supervisors' ? 'active' : ''; ?>">

        <i class="fa-solid fa-user-tie"></i>

        <span>

            الوكلاء

        </span>

    </a>

    <a href="section.php?category=activity"
        class="<?php echo $category == 'activity' ? 'active' : ''; ?>">

        <i class="fa-solid fa-lightbulb"></i>

        <span>

            النشاط الطلابي

        </span>

    </a>

    <a href="section.php?category=health"
        class="<?php echo $category == 'health' ? 'active' : ''; ?>">

        <i class="fa-solid fa-heart-pulse"></i>

        <span>

            التوجيه الصحي

        </span>

    </a>

    <a href="section.php?category=professional-development"
        class="<?php echo $category == 'professional-development' ? 'active' : ''; ?>">

        <i class="fa-solid fa-graduation-cap"></i>

        <span>

            التطوير المهني

        </span>

    </a>

</section>


<!-- ========================= -->
<!-- FILTER -->
<!-- ========================= -->

<section class="search-section premium-search-section">

    <form
        method="GET"
        class="search-form premium-search-form">

        <input
            type="hidden"
            name="category"
            value="<?php echo $category; ?>">

        <div class="search-input-wrapper">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                name="search"
                placeholder="ابحث داخل القسم..."
                value="<?php echo htmlspecialchars($search); ?>">

        </div>

        <button type="submit">

            بحث

        </button>

    </form>

</section>



<!-- ========================= -->
<!-- PRODUCTS -->
<!-- ========================= -->

<section class="featured-section">

    <div class="featured-grid">

        <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>

                <div class="product-card reveal">

                    <!-- IMAGE -->

                    <div class="product-image">

                        <img
                            src="../<?php echo $product['image']; ?>"
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
                                href="product.php?id=<?php echo $product['id']; ?>"
                                class="details-btn">

                                عرض التفاصيل

                            </a>

                            <?php if (!empty($product['whatsapp'])): ?>

                                <a
                                    href="<?php echo $product['whatsapp']; ?>"
                                    target="_blank"
                                    class="buy-btn">

                                    <i class="fa-brands fa-whatsapp"></i>

                                  التواصل عبر واتساب

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty-products">

                <div class="empty-icon">

                    <i class="fa-regular fa-folder-open"></i>

                </div>

                <h2>

                    لا توجد ملفات داخل هذا القسم حالياً

                </h2>

                <p>

                    سيتم إضافة ملفات جديدة قريباً بإذن الله

                </p>

            </div>


        <?php endif; ?>

    </div>

</section>

<?php include '../includes/footer.php'; ?>