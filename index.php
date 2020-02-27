<!DOCTYPE html>
<?php

$module = (isset($_GET['module']) && $_GET['module'] != '') ? $_GET['module'] : '';

          
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>API test</title>
</head>
<body>
   
        <nav class="row center">
            <div class="nav-wrap -stretch space-between row">
            <div class="navigation-labels row y-center">
                <div class="logo t-accent -title-2">API Demo</div>
                <div class="divider"></div>
                <div class="menu-items row t-data -title-2">
                <div class="menu-item"><a href="index.php?module=viewProducts">View Products</a></div>
                <div class="menu-item"><a href="index.php?module=category">View Categories</a></div>
                </div>
            </div>
           
        </nav>
        <div class="container-fluid">
        <content>
            <?php
                switch($module){
                    case 'addProduct': 
                        include "form_create.php";
                        break;
                    case 'productDetails': 
                        include "viewProduct.php";
                        break;
                    case 'modifyProduct': 
                        include "form_modify.php";
                        break;
                    case 'category': 
                        include "categoryList.php";
                        break;
                    default:
                        include 'productList.php';
                        break;
                }

            
            ?>
        </content>
    </div>
    <div class="footer">
        2020
    </div>
</body>
</html>
