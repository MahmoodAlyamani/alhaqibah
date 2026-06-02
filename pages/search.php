<?php

include '../includes/functions.php';

$query = isset($_GET['q'])
    ? trim($_GET['q'])
    : '';

$results = [];

if (!empty($query)) {

    $results = searchProducts($query);
}

$pageTitle = 'البحث';

include '../includes/header.php';

?>

<!-- ========================= -->
<!-- SEARCH HERO -->
<!-- ========================= -->

<section class="page-hero">

    <span class="page-badge">

        البحث داخل الملفات

    </span>

    <h1>

        نتائج البحث

    </h1>

    <p>

       ابحث عن أي ملف أو سجل أو نموذج داخل المكتبة التعليمية.

    </p>

</section>

<!-- ========================= -->
<!-- SEARCH FORM -->
<!-- ========================= -->

<section class="search-section">

    <form
    action="search.php"
    method="GET"
    class="search-form">

        <input
        type="text"
        name="q"
        placeholder="ابحث عن ملف..."
        value="<?php echo htmlspecialchars($query); ?>">

        <button type="submit">

            <i class="fa-solid fa-magnifying-glass"></i>

            بحث

        </button>

    </form>

</section>

<!-- ========================= -->
<!-- RESULTS -->
<!-- ========================= -->

<section class="featured-section">

    <div class="featured-grid">

        <?php if (!empty($results)): ?>

            <?php foreach ($results as $product): ?>

                <div class="product-card reveal">

                    <div class="product-image">

                        <img
                        src="../<?php echo $product['image']; ?>"
                        alt="<?php echo $product['title']; ?>">

                    </div>

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

                        <div class="product-buttons">

                            <a
                            href="product.php?id=<?php echo $product['id']; ?>"
                            class="details-btn">

                                عرض التفاصيل

                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty-products">

                <h2>

                    لا توجد نتائج مطابقة

                </h2>

            </div>

        <?php endif; ?>

    </div>

</section>

<?php include '../includes/footer.php'; ?>