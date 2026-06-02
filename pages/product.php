<?php

require_once '../includes/functions.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$product = getProductById($id);

if (!$product) {
  die('المنتج غير موجود');
}

$pageTitle =
  htmlspecialchars(
    $product['title'] ?? ''
  );

?>

<!doctype html>

<html lang="ar" dir="rtl">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title><?php echo $pageTitle; ?></title>

  <!-- Google Font -->

  <link rel="preconnect" href="https://fonts.googleapis.com" />

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;800&display=swap"
    rel="stylesheet" />

  <!-- Font Awesome -->

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- CSS -->

  <link rel="stylesheet" href="../assets/css/style.css" />

</head>

<body>

  <!-- NAVBAR -->

  <?php include '../includes/header.php'; ?>

  <!-- ===================================================== -->
  <!-- PREMIUM PRODUCT HERO -->
  <!-- ===================================================== -->

  <section class="premium-product-hero">

    <div class="premium-product-badge">

      <i class="fa-solid fa-file-lines"></i>

      <span>

        حقيبة تعليمية جاهزة

      </span>

    </div>

    <h1>

      <?php echo $product['title']; ?>

    </h1>

    <p>

      <?php echo $product['description']; ?>

    </p>

  </section>

  <!-- PRODUCT PAGE -->

  <section class="product-page premium-product-layout">

    <!-- LEFT -->

    <div class="product-gallery reveal">

      <!-- MAIN IMAGE -->

      <div class="main-image">

        <img
          id="productImage"
          src="../<?php echo $product['image']; ?>"
          alt="<?php echo $product['title']; ?>"
          class="main-product-image"
          onclick="openLightbox(this.src)">

      </div>

      <!-- THUMBNAILS -->

      <div class="product-slider-wrapper">

        <!-- MAIN IMAGE -->

        <div class="main-image">

          <img
            id="productImage"
            src="../<?php echo $product['image']; ?>"
            alt="<?php echo $product['title']; ?>"
            class="main-product-image"
            onclick="openLightbox(this.src)">

          <!-- ARROWS -->

          <button
            class="slider-arrow prev-arrow"
            onclick="prevSlide()">

            <i class="fa-solid fa-chevron-right"></i>

          </button>

          <button
            class="slider-arrow next-arrow"
            onclick="nextSlide()">

            <i class="fa-solid fa-chevron-left"></i>

          </button>

        </div>

        <!-- THUMBNAILS -->

        <div class="gallery-grid">

          <img
            src="../<?php echo $product['image']; ?>"
            class="gallery-item active-thumb"
            onclick="changeImageByIndex(0)">

          <?php if (!empty($product['images'])): ?>

            <?php foreach ($product['images'] as $index => $image): ?>

              <img
                src="../<?php echo $image; ?>"
                class="gallery-item"
                onclick="changeImageByIndex(<?php echo $index + 1; ?>)">

            <?php endforeach; ?>

          <?php endif; ?>

        </div>

      </div>

      <!-- RIGHT -->

      <div class="product-info reveal delay-1">

        <span class="product-category" id="productCategory">

          <?php echo $product['category']; ?>

        </span>

        <h1 id="productTitle">

          <?php echo $product['title']; ?>

        </h1>

        <p id="productDescription">

          <?php echo $product['description']; ?>

        </p>

        <!-- FEATURES -->

        <div class="product-features">

          <?php if (!empty($product['features'])): ?>

            <?php foreach ($product['features'] as $feature): ?>

              <div class="feature-box">

                <i class="fa-solid fa-check"></i>

                <div>

                  <h4>

                    <?php echo $feature; ?>

                  </h4>

                </div>

              </div>

            <?php endforeach; ?>

          <?php endif; ?>

        </div>


        <div class="feature-box">

          <i class="fa-solid fa-shield"></i>

          <div>

            <h4>جودة عالية</h4>

            <span>

              وفق المعايير التعليمية

            </span>

          </div>

        </div>

        <div class="feature-box">

          <i class="fa-solid fa-bolt"></i>

          <div>

            <h4>جاهز للاستخدام</h4>

            <span>

              مباشرة بعد الطلب

            </span>

          </div>

        </div>

      </div>

      <!-- PRODUCT META -->

      <div class="product-meta">

        <div class="meta-card">

          <i class="fa-solid fa-file-pdf"></i>

          <div>

            <h4>

              نوع الملف

            </h4>

            <span>

              PDF قابل للطباعة

            </span>

          </div>

        </div>

        <div class="meta-card">

          <i class="fa-solid fa-layer-group"></i>

          <div>

            <h4>

              المحتوى

            </h4>

            <span>

              متكامل ومنظم

            </span>

          </div>

        </div>

        <div class="meta-card">

          <i class="fa-solid fa-clock"></i>

          <div>

            <h4>

              التسليم

            </h4>

            <span>

              خلال وقت قصير

            </span>

          </div>

        </div>

      </div>

      <!-- PRICE -->

      <div class="product-price-box">

        <span>

          معلومات الملف

        </span>

        <h2>

          <?php echo htmlspecialchars($product['category']); ?>

        </h2>

        <p>

          ملف جاهز للاستخدام والطباعة

        </p>

      </div>

      <!-- BUTTONS -->

      <div class="product-buttons">

        <a
          href="<?php echo $product['whatsapp']; ?>"
          target="_blank"
          class="buy-btn">

          <i class="fa-brands fa-whatsapp"></i>

          التواصل عبر الواتساب

        </a>

        <?php if (!empty($product['pdf'])): ?>

          <button
            class="back-btn preview-btn"
            onclick="openPreview()">

            <i class="fa-solid fa-file-pdf"></i>

            معاينة الملف

          </button>

        <?php endif; ?>

      </div>

    </div>

  </section>

  <!-- RELATED PRODUCTS -->

  <section class="related-products">

    <div class="section-title reveal">

      <span>

        ملفات مشابهة

      </span>

      <h2>

        قد يعجبك أيضاً

      </h2>

    </div>

    <div class="products-grid">

      <?php

      $relatedProducts =
        getRelatedProducts(
          $product['category_slug'] ?? '',
          $product['id'],
          4
        );

      foreach ($relatedProducts as $related):

      ?>

        <div class="product-card reveal">

          <div class="product-image">

            <img
              src="../<?php echo $related['image']; ?>"
              alt="<?php echo $related['title']; ?>">

          </div>

          <div class="product-content">

            <span class="product-category">

              <?php echo $related['category']; ?>

            </span>

            <h3>

              <?php echo $related['title']; ?>

            </h3>

            <div class="product-price">

              <?php echo $related['price']; ?> ريال

            </div>

            <a
              href="product.php?id=<?php echo $related['id']; ?>"
              class="details-btn">

              عرض التفاصيل

            </a>

          </div>

        </div>

      <?php endforeach; ?>

    </div>

  </section>

  <!-- FOOTER -->
  <!-- PDF PREVIEW MODAL -->

  <div class="pdf-modal" id="pdfModal">

    <div class="pdf-overlay"
      onclick="closePreview()"></div>

    <div class="pdf-container">

      <!-- HEADER -->

      <div class="pdf-header">

        <h3>

          <i class="fa-solid fa-file-pdf"></i>

          معاينة الملف

        </h3>

        <button
          class="close-pdf"
          onclick="closePreview()">

          <i class="fa-solid fa-xmark"></i>

        </button>

      </div>

      <!-- PDF -->

      <iframe
        src="../<?php echo $product['pdf']; ?>"
        frameborder="0"></iframe>

      <!-- ACTIONS -->

      <div class="pdf-actions">

        <a
          href="javascript:void(0)"
          onclick="openPreview('../<?php echo $product['pdf']; ?>')"
          class="back-btn">

          <i class="fa-solid fa-file-pdf"></i>

          معاينة الملف

        </a>

      </div>

    </div>

  </div>

  <!-- ===================================== -->
  <!-- IMAGE LIGHTBOX -->
  <!-- ===================================== -->

  <div
    class="image-lightbox"
    id="imageLightbox">

    <button
      class="lightbox-close"
      onclick="closeLightbox()">

      <i class="fa-solid fa-xmark"></i>

    </button>

    <img
      id="lightboxImage"
      src="">

  </div>

  <?php include '../includes/footer.php'; ?>

  <!-- JS -->

  <script src="../assets/js/main.js"></script>

  <script>
    function openPreview() {

      document
        .getElementById('pdfModal')
        .classList.add('active');
    }

    function closePreview() {

      document
        .getElementById('pdfModal')
        .classList.remove('active');
    }
  </script>

<script>

const galleryImages = [

    "../<?php echo $product['image']; ?>",

    <?php if (!empty($product['images'])): ?>

        <?php foreach ($product['images'] as $image): ?>

            "../<?php echo $image; ?>",

        <?php endforeach; ?>

    <?php endif; ?>

];

let currentSlide = 0;

/* CHANGE IMAGE */

function changeImageByIndex(index)
{
    currentSlide = index;

    updateSlider();
}

/* UPDATE */

function updateSlider()
{
    const mainImage =
    document.getElementById('productImage');

    mainImage.src =
    galleryImages[currentSlide];

    document
    .querySelectorAll('.gallery-item')
    .forEach(item => {

        item.classList.remove('active-thumb');

    });

    if (
        document.querySelectorAll('.gallery-item')[currentSlide]
    ) {

        document
        .querySelectorAll('.gallery-item')[currentSlide]
        .classList.add('active-thumb');
    }
}

/* NEXT */

function nextSlide()
{
    currentSlide++;

    if (currentSlide >= galleryImages.length) {

        currentSlide = 0;
    }

    updateSlider();
}

/* PREV */

function prevSlide()
{
    currentSlide--;

    if (currentSlide < 0) {

        currentSlide =
        galleryImages.length - 1;
    }

    updateSlider();
}

/* AUTO SLIDE */

setInterval(() => {

    nextSlide();

}, 5000);

/* LIGHTBOX */

function openLightbox(src)
{
    document
    .getElementById('imageLightbox')
    .classList.add('active');

    document
    .getElementById('lightboxImage')
    .src = src;
}

function closeLightbox()
{
    document
    .getElementById('imageLightbox')
    .classList.remove('active');
}

</script>

</body>

</html>