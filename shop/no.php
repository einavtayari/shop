<?php
    require 'dbcon.php';


    //$sql = 'SELECT products_categories.*, categories.Title AS catTitle, categories.Description AS CatDescription, products.ID AS prodID, products.Title AS ProdTitle, products.Price, products.SalePrice, products.Description, images.Title, images.Filename FROM products_categories INNER JOIN categories INNER JOIN products INNER JOIN images ON products_categories.CategoryID = categories.ID AND products.ID = images.ProductID';

    // print_r($sql);
    // foreach($cats as $cat){
    //     echo '<pre>';
    //     print_r($cat);
    //     echo '</pre>';
    // }

 
    /*
    $sql = 'SELECT products_categories.*, categories.Title AS catTitle, categories.Description AS CatDescription, products.ID AS prodID, products.Title AS ProdTitle, products.Price, products.SalePrice, products.Description, images.Title, images.Filename FROM products_categories INNER JOIN categories INNER JOIN products INNER JOIN images ON products_categories.CategoryID = categories.ID AND products.ID = images.ProductID WHERE products_categories.CategoryID = ' . $_REQUEST['cat'] ;
     print_r($sql);
     $cats = mysqli_query($conn,$sql);
     foreach($cats as $cat){
        echo '<pre>';
        print_r($cat);
        echo '</pre>';
     }
     */


    // $sql = 'SELECT products_categories.*, categories.*, products.* FROM products_categories INNER JOIN categories INNER JOIN products ON products_categories.CategoryID = categories.ID WHERE products_categories.CategoryID = ' . $_REQUEST['cat'];
    // print_r($sql);


        //original

    //$sql = 'SELECT products.*, images.Title AS ImageTitle, images.Filename FROM products INNER JOIN images ON products.ID = images.ProductID WHERE products.ID = ' . $product_id;

    $sql = 'SELECT products.*,  categories.*, images.Title AS ImgTitle, images.Filename, images.ProductId, products_categories.ProductID, products_categories.CategoryID
    FROM products
    INNER JOIN products_categories
    INNER JOIN categories
    INNER JOIN images
    ON products.ID = products_categories.ProductID
    AND categories.ID =  products_categories.CategoryID
    AND products.ID = images.ProductId
    WHERE products_categories.CategoryID = ' .$_REQUEST['cat'];
    print_r($sql);
    $cats = mysqli_query($conn,$sql);
     foreach($cats as $cat){
        echo '<pre>';
        print_r($cat);
        echo '</pre>';
     }
