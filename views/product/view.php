<?php include ROOT . '/views/layouts/header.php';
include ROOT . '/components/functions.php';
$categories_tree = map_tree(Category::getCategoriesList2());
$categories_menu = categories_to_string($categories_tree);
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar panel panel-group category-products">
                    <h2 class="title text-center">Каталог</h2>
                  <ul class="category nav_list nav-catalog" >
            <?= $categories_menu?>
                  </ul>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo Product::getImageProduct($product['id']); ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->

                                <?php if ($product['is_new']): ?>
                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>

                                <h2><?php echo $product['name']; ?></h2>
                                <!--<p>Код товара: <?php echo $product['code']; ?></p>-->
                                <span>
                                    <span>US $<?php echo $product['price']; ?></span>
                                   <!-- <a href="#" data-id="<?php echo $product['id']; ?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a> -->
                                </span>
                                <p><b>Наличие:</b> <?php echo Product::getAvailabilityText($product['availability']); ?></p>
                                <p><b>Производитель:</b> <?php echo $product['brand']; ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <br/>
                            <!--<h5>Описание товара</h5>-->
                            <?php echo $product['description']; ?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>