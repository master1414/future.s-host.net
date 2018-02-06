<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>Кабинет пользователя</h3>
            
            <h4>Привет, <?php echo $user['name'];?>!</h4>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные пользователя</a></li>
                <li><a href="/admin">Редактировать товары</a></li>
                <?php if($user['role'] === 'admin'):?>
                <li><a href="/cabinet/parser">Парсер товаров</a></li>
                <?php endif;?>
                <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>