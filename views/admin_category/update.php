<?php include ROOT . '/views/layouts/header_admin.php'; 
$categoriesList = Category::getCategoriesList2();?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>


            <h4>Редактировать категорию "<?php echo $category['name']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" class="form-control" name="name" placeholder="" value="<?php echo $category['name']; ?>">
                        <p>Категория</p>
                        <select name="category_id" class="form-control">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category2): ?>
                            
                                    <option value="<?php echo $category2['id']; ?>"> 
                                        <?php if($category2['parent'] == 0):?>
                                        <?php echo $category2['name']; ?>
                                        <?php endif;?>  
                                        <?php if(!$category2['parent'] == 0 ):?>
                                        <?php echo $category2['name']; ?> +
                                        <?php endif;?>  
                                    </option>
                                  
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p>Порядковый номер</p>
                        <input type="text" class="form-control" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>">
                        
                        <p>Статус</p>
                        <select name="status" class="form-control">
                            <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
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

