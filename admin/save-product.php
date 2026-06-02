<?php

include 'includes/auth.php';

requireLogin();

/* ===================================================== */
/* LOAD PRODUCTS */
/* ===================================================== */

$jsonPath = '../assets/data/products.json';

$products = [];

if (file_exists($jsonPath)) {

    $products = json_decode(
        file_get_contents($jsonPath),
        true
    ) ?: [];
}

/* ===================================================== */
/* FORM DATA */
/* ===================================================== */

$title = trim($_POST['title'] ?? '');

$category = trim($_POST['category'] ?? '');

$price = trim($_POST['price'] ?? '');

$description = trim($_POST['description'] ?? '');

$whatsapp = trim($_POST['whatsapp'] ?? '');

/* ===================================================== */
/* FEATURES */
/* ===================================================== */

$features = [];

if (!empty($_POST['features'])) {

    foreach ($_POST['features'] as $feature) {

        $feature = trim($feature);

        if (!empty($feature)) {

            $features[] = $feature;
        }
    }
}

/* ===================================================== */
/* CATEGORY SLUG */
/* ===================================================== */

$categoryMap = [

    'ملفات المعلمين' => 'teachers',

    'الإدارة المدرسية' => 'management',

    'النشاط الطلابي' => 'activity',

    'الصحة المدرسية' => 'health',

    'التطوير المهني' => 'professional-development',

    'الموجهون التربويون' => 'supervisors'

];

$categorySlug = $categoryMap[$category] ?? '';

/* ===================================================== */
/* GENERATE ID */
/* ===================================================== */

$id = uniqid();

/* ===================================================== */
/* MULTIPLE IMAGES UPLOAD */
/* ===================================================== */

$images = [];

if (
    isset($_FILES['images']) &&
    !empty($_FILES['images']['name'][0])
) {

    foreach ($_FILES['images']['name'] as $key => $imageName) {

        if (!empty($imageName)) {

            $newImageName =
                time() . '_' .
                basename($imageName);

            $tmpName =
                $_FILES['images']['tmp_name'][$key];

            $imagePath =
                'assets/uploads/images/' .
                $newImageName;

            move_uploaded_file(
                $tmpName,
                '../' . $imagePath
            );

            $images[] = $imagePath;
        }
    }
}

/* ===================================================== */
/* PDF UPLOAD */
/* ===================================================== */

$pdfPath = '';

if (
    isset($_FILES['pdf']) &&
    !empty($_FILES['pdf']['name'])
) {

    $pdfName =
        time() . '_' .
        basename($_FILES['pdf']['name']);

    $pdfTmp =
        $_FILES['pdf']['tmp_name'];

    $pdfPath =
        'assets/uploads/pdfs/' .
        $pdfName;

    move_uploaded_file(
        $pdfTmp,
        '../' . $pdfPath
    );
}

/* ===================================================== */
/* NEW PRODUCT */
/* ===================================================== */

$newProduct = [

    "id" => $id,

    "title" => $title,

    "category" => $category,

    "category_slug" => $categorySlug,

    "price" => $price,

    "description" => $description,

    "features" => $features,

    "image" => $images[0] ?? '',

    "gallery" => $images,

    "pdf" => $pdfPath,

    "whatsapp" => $whatsapp,

    "badge" => "جديد",

    "featured" => true
];

/* ===================================================== */
/* ADD PRODUCT */
/* ===================================================== */

$products[] = $newProduct;

/* ===================================================== */
/* SAVE JSON */
/* ===================================================== */

file_put_contents(

    $jsonPath,

    json_encode(
        $products,
        JSON_UNESCAPED_UNICODE |
            JSON_PRETTY_PRINT
    )

);

/* ===================================================== */
/* REDIRECT */
/* ===================================================== */

header('Location: products.php');

exit;
