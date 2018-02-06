<?php include ROOT . '/views/layouts/header.php'; 
include ROOT . '/components/functions.php';
require_once ROOT . '/components/Seo.php';
 $id = Seo::getIdPage(1);
 $id2 = Seo::getIdPage(2);
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
                <div class="features_items"><!--features_items-->
                    <!--<h2 class="title text-center">Последние товары</h2>-->
                    <h2 class="title text-center"><?php echo Category::getCategoryById($id2)['name']?></h2>

                    <?php foreach ($categoryProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo Product::getImageProduct($product['id']); ?>" alt="" />
                                        <h2>$<?php echo $product['price']; ?></h2>
                                        <p>
                                            <a href="/product/<?php echo $product['id']; ?>">
                                                <?php echo $product['name']; ?>
                                            </a>
                                        </p>
                                        <!--<a href="/cart/add/<?php echo $product['id']; ?>" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>-->
                                    </div>
                                    <?php if ($product['is_new']): ?>
                                        <img src="/template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>                              

                </div><!--features_items-->
                
                <!-- Постраничная навигация -->
                <?php echo $pagination->get(); ?>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>