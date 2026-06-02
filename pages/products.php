<?php

include '../includes/functions.php';

$products = getProducts();

$pageTitle = 'جميع الملفات';

include '../includes/header.php';

?>

<!-- ===================================================== -->
<!-- HERO -->
<!-- ===================================================== -->

<section class="section-hero">

    <div class="section-heading">

        <span>

          مكتبة الملفات التعليمية والإدارية

        </span>

        <h1>

            تصفح كافة الملفات التعليمية والإدارية

        </h1>

        <p>

            مجموعة متنوعة من الملفات التعليمية
            والإدارية المصممة بعناية لتلبية
            احتياجات الكادر التعليمي والإداري.

        </p>

    </div>

</section>

<!-- ===================================================== -->
<!-- SEARCH -->
<!-- ===================================================== -->

<section class="search-section">

    <form class="search-form">

        <input
            type="text"
            id="liveSearch"
            placeholder="ابحث عن ملف...">

        <button type="button">

            <i class="fa-solid fa-magnifying-glass"></i>

            بحث

        </button>

    </form>

</section>

<!-- ===================================================== -->
<!-- PRODUCTS -->
<!-- ===================================================== -->

<section class="featured-section">

    <div class="featured-grid" id="productsGrid">
        <div
            id="emptySearch"
            style="display:none;"
            class="empty-products">

            <h2>

                لا توجد نتائج مطابقة

            </h2>
            <p>

                حاول استخدام كلمات بحث أخرى.

            </p>

        </div>

        <?php foreach ($products as $product): ?>

            <div
                class="product-card reveal searchable-item">

                <!-- IMAGE -->

                <div class="product-image">

                    <img
                        src="../<?php echo $product['image']; ?>"
                        alt="<?php echo htmlspecialchars($product['title']); ?>">

                    <?php if (!empty($product['badge'])): ?>

                        <span class="product-badge">

                            <?php echo htmlspecialchars($product['badge']); ?>

                        </span>

                    <?php endif; ?>

                </div>

                <!-- CONTENT -->

                <div class="product-content">

                    <span class="product-category">

                        <?php echo htmlspecialchars($product['category']); ?>

                    </span>

                    <h3 class="search-title">

                        <?php echo htmlspecialchars($product['title']); ?>

                    </h3>

                    <p>

                        <?php echo htmlspecialchars($product['description']); ?>

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

    </div>

</section>

<!-- ===================================================== -->
<!-- LIVE SEARCH -->
<!-- ===================================================== -->

<script>
    const liveSearch =
        document.getElementById('liveSearch');

    const emptySearch =
        document.getElementById('emptySearch');

    liveSearch.addEventListener('keyup', function() {

        let value =
            this.value.toLowerCase();

        let items =
            document.querySelectorAll('.searchable-item');

        let visibleCount = 0;

        items.forEach(item => {

            let title =
                item.querySelector('.search-title')
                .innerText
                .toLowerCase();

            let category =
                item.querySelector('.product-category')
                .innerText
                .toLowerCase();

            let description =
                item.querySelector('.product-content p')
                .innerText
                .toLowerCase();

            let fullText =
                title + " " +
                category + " " +
                description;

            if (fullText.includes(value)) {

                item.style.display = '';

                visibleCount++;

            } else {

                item.style.display = 'none';

            }

        });

        if (visibleCount === 0) {

            emptySearch.style.display = 'flex';

        } else {

            emptySearch.style.display = 'none';

        }

    });
</script>
<?php include '../includes/footer.php'; ?>