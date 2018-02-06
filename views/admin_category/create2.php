<?php include ROOT . '/views/layouts/header_admin.php'; 
$categoriesList = Category::getCategoriesList2();
?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление категориями</a></li>
                    <li class="active">Добавить под-категорию</li>
                </ol>
            </div>


            <h4>Добавить новую под-категорию</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        <p>Категория</p>
                        <select name="category_id" class="form-control">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                            
                                    <option value="<?php echo $category['id']; ?>"> 
                                        <?php if($category['parent'] == 0):?>
                                        <?php echo $category['name']; ?>
                                        <?php endif;?>  
                                        <?php if(!$category['parent'] == 0):?>
                                        <?php echo $category['name']; ?> +
                                        <?php endif;?>  
                                    </option>
                                  
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p>Название</p>
                        <input type="text" class="form-control" name="name" placeholder="" value="">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">

                        <p>Статус</p>
                        <select name="status" class="form-control">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

