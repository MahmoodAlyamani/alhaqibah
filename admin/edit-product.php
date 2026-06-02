<?php

require_once 'includes/auth.php';

require_once '../includes/functions.php';

requireLogin();

$products = getProducts();

$id = $_GET['id'] ?? '';

$currentProduct = null;

foreach ($products as $product) {

    if ($product['id'] === $id) {

        $currentProduct = $product;

        break;
    }
}

if (!$currentProduct) {

    die('المنتج غير موجود');
}

$pageTitle = 'تعديل الملف';

include 'includes/header.php';

?>

<div class="edit-page">

    <!-- HEADER -->

    <div class="edit-header">

        <div>

            <span>

                لوحة التحكم

            </span>

            <h1>

                تعديل الملف

            </h1>

        </div>

        <a
            href="products.php"
            class="back-products-btn">

            العودة للملفات

        </a>

    </div>

    <!-- CONTENT -->

    <div class="edit-layout">

        <!-- LEFT -->

        <div class="edit-preview-card">

            <img
                src="../<?php echo $currentProduct['image']; ?>"
                alt="preview">

            <div class="preview-content">

                <span>

                    <?php echo htmlspecialchars($currentProduct['category'] ?? ''); ?>

                </span>

                <h3>

                    <?php echo htmlspecialchars($currentProduct['title'] ?? ''); ?>

                </h3>

                <p>

                    <?php echo htmlspecialchars($currentProduct['description'] ?? ''); ?>

                </p>

                <?php if (!empty($currentProduct['pdf'])): ?>

                    <a
                        href="../<?php echo $currentProduct['pdf']; ?>"
                        target="_blank"
                        class="preview-pdf-btn">

                        معاينة PDF

                    </a>

                <?php endif; ?>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="edit-form-card">

            <form
                action="update-product.php"
                method="POST"
                enctype="multipart/form-data"
                class="edit-form">

                <input
                    type="hidden"
                    name="id"
                    value="<?php echo $currentProduct['id']; ?>">

                <!-- TITLE -->

                <div class="form-group">

                    <label>

                        عنوان الملف

                    </label>

                    <input
                        type="text"
                        name="title"
                        required
                        value="<?php echo htmlspecialchars($currentProduct['title'] ?? ''); ?>">

                </div>

                <!-- CATEGORY -->

                <div class="form-group">

                    <label>

                        التصنيف

                    </label>

                    <select
                        name="category"
                        required>

                        <option value="ملفات المعلمين"
                            <?php if ($currentProduct['category'] === 'ملفات المعلمين') echo 'selected'; ?>>

                            ملفات المعلمين

                        </option>

                        <option value="الإدارة المدرسية"
                            <?php if ($currentProduct['category'] === 'الإدارة المدرسية') echo 'selected'; ?>>

                            الإدارة المدرسية

                        </option>

                        <option value="الموجهون التربويون"
                            <?php if ($currentProduct['category'] === 'الموجهون التربويون') echo 'selected'; ?>>

                            الموجهون التربويون

                        </option>

                        <option value="النشاط الطلابي"
                            <?php if ($currentProduct['category'] === 'النشاط الطلابي') echo 'selected'; ?>>

                            النشاط الطلابي

                        </option>

                        <option value="الصحة المدرسية"
                            <?php if ($currentProduct['category'] === 'الصحة المدرسية') echo 'selected'; ?>>

                            الصحة المدرسية

                        </option>

                        <option value="التطوير المهني"
                            <?php if ($currentProduct['category'] === 'التطوير المهني') echo 'selected'; ?>>

                            التطوير المهني

                        </option>

                    </select>

                </div>

                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label>

                        الوصف

                    </label>

                    <textarea
                        name="description"
                        required><?php echo htmlspecialchars($currentProduct['description'] ?? ''); ?></textarea>

                </div>

                <!-- PRICE -->

                <div class="form-group">

                    <label>

                        السعر

                    </label>

                    <input
                        type="text"
                        name="price"
                        value="<?php echo htmlspecialchars($currentProduct['price'] ?? ''); ?>">

                </div>

                <!-- WHATSAPP -->

                <div class="form-group">

                    <label>

                        رابط الواتساب

                    </label>

                    <input
                        type="text"
                        name="whatsapp"
                        value="<?php echo htmlspecialchars($currentProduct['whatsapp'] ?? ''); ?>">

                </div>

                <!-- IMAGES -->

                <div class="form-group">

                    <label>

                        صور الملف

                    </label>

                    <input
                        type="file"
                        name="images[]"

                        multiple

                        accept="image/*">

                </div>

                <?php if (!empty($currentProduct['gallery'])): ?>

                    <div class="current-gallery">

                        <?php foreach ($currentProduct['gallery'] as $index => $image): ?>

                            <div class="gallery-item-box">

                                <img
                                    src="../<?php echo $image; ?>"
                                    class="gallery-preview">

                                <a
                                    href="delete-image.php?product=<?php echo $currentProduct['id']; ?>&image=<?php echo $index; ?>"
                                    class="delete-gallery-image"

                                    onclick="return confirm('هل أنت متأكد من حذف الصورة؟')">

                                    <i class="fa-solid fa-trash"></i>

                                </a>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>

                <!-- FEATURES -->

                <div class="form-group">

                    <label>

                        مميزات الملف

                    </label>

                    <div class="features-wrapper">

                        <?php

                        $features =
                            $currentProduct['features'] ?? [];

                        for ($i = 0; $i < 6; $i++):

                        ?>

                            <input
                                type="text"
                                name="features[]"

                                value="<?php echo htmlspecialchars($features[$i] ?? ''); ?>"

                                placeholder="ميزة إضافية">

                        <?php endfor; ?>

                    </div>

                </div>

                <!-- PDF -->

                <div class="form-group">

                    <label>

                        تغيير ملف PDF

                    </label>

                    <input
                        type="file"
                        name="pdf">

                </div>

                <!-- BUTTON -->

                <button
                    type="submit"
                    class="save-btn">

                    حفظ التعديلات

                </button>

            </form>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>