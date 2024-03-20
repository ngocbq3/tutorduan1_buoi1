<?php

function homeIndex()
{
    $products = listAll('products');
    $catalogues = listAll('catalogues');

    //Lọc theo khoảng giá
    $list_of_price = list_of_price();
    require_once PATH_VIEW . 'home.php';
}

function searchProduct()
{
    $keyword = $_GET['keyword'];
    $cate_id = $_GET['catalog'];

    $products = searchProductInCatalogue($keyword, $cate_id);
    $catalogues = listAll('catalogues');
    $list_of_price = list_of_price();
    require_once PATH_VIEW . 'home.php';
}

function searchFilterPrice()
{
    $filter = $_POST['filter'];
    switch ($filter) {
        case 1:
            $min = null;
            $max = 10000000;
            break;
        case 2:
            $min = 10000000;
            $max = 20000000;
            break;
        case 3:
            $min = 20000000;
            $max = 30000000;
            break;
        case 4:
            $min = 30000000;
            $max = null;
    }
    $products = filterOfPrice($min, $max);
    $catalogues = listAll('catalogues');
    $list_of_price = list_of_price();
    require_once PATH_VIEW . 'home.php';
}
