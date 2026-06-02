<?php

require_once '../includes/functions.php';

$products = getProducts();

$id = $_POST['id'] ?? '';

foreach ($products as &$product) {

    if ($product['id'] === $id) {

        /*
        |----------------------------------------
        | BASIC DATA
        |----------------------------------------
        */

        $title =
            trim($_POST['title'] ?? '');

        $category =
            trim($_POST['category'] ?? '');

        $description =
            trim($_POST['description'] ?? '');

        $price =
            trim($_POST['price'] ?? '');

        $whatsapp =
            trim($_POST['whatsapp'] ?? '');

        /*
        |----------------------------------------
        | FEATURES
        |----------------------------------------
        */

        $features = [];

        if (!empty($_POST['features'])) {

            foreach ($_POST['features'] as $feature) {

                $feature = trim($feature);

                if (!empty($feature)) {

                    $features[] = $feature;
                }
            }
        }

        /*
        |----------------------------------------
        | CATEGORY SLUG
        |----------------------------------------
        */

        $categoryMap = [

            'ملفات المعلمين' => 'teachers',

            'الإدارة المدرسية' => 'management',

            'النشاط الطلابي' => 'activity',

            'الصحة المدرسية' => 'health',

            'التطوير المهني' => 'professional-development',

            'الموجهون التربويون' => 'supervisors'

        ];

        $categorySlug =
            $categoryMap[$category] ?? '';

        /*
        |----------------------------------------
        | UPDATE BASIC DATA
        |----------------------------------------
        */

        $product['title'] =
            $title;

        $product['category'] =
            $category;

        $product['category_slug'] =
            $categorySlug;

        $product['description'] =
            $description;

        $product['price'] =
            $price;

        $product['whatsapp'] =
            $whatsapp;

        $product['features'] =
            $features;

        /*
        |----------------------------------------
        | CURRENT GALLERY
        |----------------------------------------
        */

        $gallery =
            $product['gallery'] ?? [];

        /*
        |----------------------------------------
        | NEW IMAGES
        |----------------------------------------
        */

        if (

            isset($_FILES['images']) &&

            !empty($_FILES['images']['name'][0])

        ) {

            foreach ($_FILES['images']['name'] as $key => $imageName) {

                if (!empty($imageName)) {

                    $newImageName =
                        time() . '_' .
                        preg_replace(
                            '/[^a-zA-Z0-9._-]/',
                            '',
                            $imageName
                        );

                    $tmpName =
                        $_FILES['images']['tmp_name'][$key];

                    $newImagePath =
                        'assets/uploads/images/' .
                        $newImageName;

                    move_uploaded_file(

                        $tmpName,

                        '../' . $newImagePath

                    );

                    $gallery[] =
                        $newImagePath;
                }
            }

            /*
            |----------------------------------------
            | MAIN IMAGE
            |----------------------------------------
            */

            if (!empty($gallery)) {

                $product['image'] =
                    $gallery[0];
            }

            $product['gallery'] =
                $gallery;
        }

        /*
        |----------------------------------------
        | UPDATE PDF
        |----------------------------------------
        */

        if (

            isset($_FILES['pdf']) &&

            $_FILES['pdf']['error'] === 0

        ) {

            $pdfName =
                time() . '_' .
                preg_replace(
                    '/[^a-zA-Z0-9._-]/',
                    '',
                    $_FILES['pdf']['name']
                );

            $pdfTmp =
                $_FILES['pdf']['tmp_name'];

            $pdfPath =
                '../assets/uploads/pdfs/' .
                $pdfName;

            move_uploaded_file(

                $pdfTmp,

                $pdfPath

            );

            $product['pdf'] =
                'assets/uploads/pdfs/' .
                $pdfName;
        }

        break;
    }
}

/*
|----------------------------------------
| SAVE JSON
|----------------------------------------
*/

file_put_contents(

    PRODUCTS_FILE,

    json_encode(

        $products,

        JSON_UNESCAPED_UNICODE |
        JSON_PRETTY_PRINT

    )

);

/*
|----------------------------------------
| REDIRECT
|----------------------------------------
*/

header('Location: products.php');

exit;