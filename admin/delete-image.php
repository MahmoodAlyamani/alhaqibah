<?php

require_once '../includes/functions.php';

$products = getProducts();

/*
|----------------------------------------
| GET DATA
|----------------------------------------
*/

$productId =
    $_GET['product'] ?? '';

$imageIndex =
    isset($_GET['image'])
    ? (int) $_GET['image']
    : -1;

/*
|----------------------------------------
| VALIDATION
|----------------------------------------
*/

if (

    empty($productId) ||

    $imageIndex < 0

) {

    header('Location: products.php');

    exit;
}

/*
|----------------------------------------
| LOOP PRODUCTS
|----------------------------------------
*/

foreach ($products as &$product) {

    if ($product['id'] === $productId) {

        /*
        |----------------------------------------
        | CHECK GALLERY
        |----------------------------------------
        */

        if (

            !empty($product['gallery']) &&

            isset($product['gallery'][$imageIndex])

        ) {

            $imagePath =
                '../' .
                $product['gallery'][$imageIndex];

            /*
            |----------------------------------------
            | DELETE FILE
            |----------------------------------------
            */

            if (file_exists($imagePath)) {

                unlink($imagePath);
            }

            /*
            |----------------------------------------
            | REMOVE FROM ARRAY
            |----------------------------------------
            */

            unset(
                $product['gallery'][$imageIndex]
            );

            /*
            |----------------------------------------
            | REINDEX ARRAY
            |----------------------------------------
            */

            $product['gallery'] =
                array_values(
                    $product['gallery']
                );

            /*
            |----------------------------------------
            | UPDATE MAIN IMAGE
            |----------------------------------------
            */

            $product['image'] =
                $product['gallery'][0] ?? '';
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

header(

    'Location: edit-product.php?id=' .
    $productId

);

exit;