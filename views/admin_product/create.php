<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Добавить новый товар</h4>

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
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" class="form-control" name="name" placeholder="" value="">

                        <p>Артикул</p>
                        <input type="text" class="form-control" name="code" placeholder="" value="">

                        <p>Стоимость, $</p>
                        <input type="text" class="form-control" name="price" placeholder="" value="">

                        <p>Категория</p>
                        <select name="category_id" class="form-control">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                            <?php if($category['parent'] != 0):?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                            <?php endif;?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Производитель</p>
                        <input type="text" class="form-control" name="brand" placeholder="" value="">

                        <p>Изображение товара</p>
                        <input type="file" class="form-control" name="image" placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea class="form-control" rows="5" name="description"></textarea>

                        <br/><br/>
                        <p>Заголовок SEO</p>
                        <textarea class="form-control" rows="2" name="title"></textarea>

                        <br/><br/>
                        <p>Описание SEO</p>
                        <textarea class="form-control" rows="2" name="description_seo"></textarea>

                        <br/><br/>
                        <p>Наличие на складе</p>
                        <select name="availability" class="form-control">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select name="is_new" class="form-control">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="is_recommended" class="form-control">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status" class="form-control">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

