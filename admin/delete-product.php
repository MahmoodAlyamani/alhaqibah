<?php

require_once 'includes/auth.php';

requireLogin();

require_once '../includes/functions.php';


$products = getProducts();

$id = $_GET['id'] ?? '';
if (empty($id)) {

    header('Location: products.php');

    exit;
}

$newProducts = [];

foreach ($products as $product) {

    /*
    |----------------------------------------
    | DELETE TARGET PRODUCT
    |----------------------------------------
    */

    if ($product['id'] === $id) {

        /*
|----------------------------------------
| DELETE GALLERY IMAGES
|----------------------------------------
*/

        if (!empty($product['gallery'])) {

            foreach ($product['gallery'] as $image) {

                $imagePath = '../' . $image;

                if (file_exists($imagePath)) {

                    unlink($imagePath);
                }
            }
        }

        /*
|----------------------------------------
| DELETE MAIN IMAGE
|----------------------------------------
*/ elseif (!empty($product['image'])) {

            $imagePath =
                '../' . $product['image'];

            if (file_exists($imagePath)) {

                unlink($imagePath);
            }
        }

        /*
        |----------------------------------------
        | DELETE PDF
        |----------------------------------------
        */

        if (
            !empty($product['pdf'])
        ) {

            $pdfPath =
                '../' . $product['pdf'];

            if (file_exists($pdfPath)) {

                unlink($pdfPath);
            }
        }

        continue;
    }

    $newProducts[] = $product;
}

/*
|----------------------------------------
| SAVE NEW JSON
|----------------------------------------
*/

file_put_contents(
    PRODUCTS_FILE,
    json_encode(
        $newProducts,
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
