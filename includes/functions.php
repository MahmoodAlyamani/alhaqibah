<?php

require_once 'config.php';

/*
|------------------------------------------------------------------
| LOAD PRODUCTS
|------------------------------------------------------------------
*/

if (!function_exists('getProducts')) {

    function getProducts()
    {
        if (!defined('PRODUCTS_FILE')) {

            return [];
        }

        if (!file_exists(PRODUCTS_FILE)) {

            return [];
        }

        $json = file_get_contents(PRODUCTS_FILE);

        if (!$json) {

            return [];
        }

        $products = json_decode($json, true);

        if (!is_array($products)) {

            return [];
        }

        return $products;
    }
}

/*
|------------------------------------------------------------------
| GET SINGLE PRODUCT
|------------------------------------------------------------------
*/

if (!function_exists('getProductById')) {

    function getProductById($id)
    {
        $products = getProducts();

        foreach ($products as $product) {

            if (
                isset($product['id']) &&
                $product['id'] === $id
            ) {

                return $product;
            }
        }

        return null;
    }
}

/*
|------------------------------------------------------------------
| GET PRODUCTS BY CATEGORY
|------------------------------------------------------------------
*/

if (!function_exists('getProductsByCategory')) {

    function getProductsByCategory($category)
    {
        $products = getProducts();

        $filtered = [];

        foreach ($products as $product) {

            if (
                isset($product['category']) &&
                trim($product['category']) === trim($category)
            ) {

                $filtered[] = $product;
            }
        }

        return $filtered;
    }
}

/*
|------------------------------------------------------------------
| GET PRODUCTS BY CATEGORY SLUG
|------------------------------------------------------------------
*/

if (!function_exists('getProductsByCategorySlug')) {

    function getProductsByCategorySlug($slug)
    {
        $products = getProducts();

        $map = [

            'teachers' => 'ملفات المعلمين',

            'management' => 'الإدارة المدرسية',

            'supervisors' => 'الوكلاء',

            'activity' => 'النشاط الطلابي',

            'health' => 'التوجيه الصحي',

            'professional-development' => 'التطوير المهني'

        ];

        if (!isset($map[$slug])) {

            return [];
        }

        $categoryName = $map[$slug];

        $filtered = [];

        foreach ($products as $product) {

            if (

                isset($product['category']) &&

                $product['category'] === $categoryName

            ) {

                $filtered[] = $product;
            }
        }

        return $filtered;
    }
}

/*
|------------------------------------------------------------------
| GET FEATURED PRODUCTS
|------------------------------------------------------------------
*/

if (!function_exists('getFeaturedProducts')) {

    function getFeaturedProducts($limit = 6)
    {
        $products = getProducts();

        $featured = [];

        foreach ($products as $product) {

            if (
                isset($product['featured']) &&
                $product['featured'] === true
            ) {

                $featured[] = $product;
            }
        }

        return array_slice($featured, 0, $limit);
    }
}

/*
|------------------------------------------------------------------
| SEARCH PRODUCTS
|------------------------------------------------------------------
*/

if (!function_exists('searchProducts')) {

    function searchProducts($keyword)
    {
        $products = getProducts();

        $results = [];

        $keyword = trim($keyword);

        if (empty($keyword)) {

            return [];
        }

        foreach ($products as $product) {

            $title =
                isset($product['title'])
                ? $product['title']
                : '';

            $description =
                isset($product['description'])
                ? $product['description']
                : '';

            $category =
                isset($product['category'])
                ? $product['category']
                : '';

            $searchText =
                $title . ' ' .
                $description . ' ' .
                $category;

            if (
                stripos($searchText, $keyword) !== false
            ) {

                $results[] = $product;
            }
        }
        usort($results, function ($a, $b) {

            return strcmp(
                $a['title'] ?? '',
                $b['title'] ?? ''
            );
        });

        return $results;
    }
}

/*
|------------------------------------------------------------------
| RELATED PRODUCTS
|------------------------------------------------------------------
*/

if (!function_exists('getRelatedProducts')) {

    function getRelatedProducts(
        $categorySlug,
        $currentId,
        $limit = 4
    ) {

        $products = getProducts();

        $related = [];

        foreach ($products as $product) {

            if (

                ($product['category_slug'] ?? '') ===
                $categorySlug

                &&

                ($product['id'] ?? '') !==
                $currentId

            ) {

                $related[] = $product;
            }
        }

        return array_slice(
            $related,
            0,
            $limit
        );
    }
}
