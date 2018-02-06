<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Редактирование данных</h2>
                        <form action="#" method="post">
                            <p>Имя:</p>
                            <input type="text" class="form-control" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                            
                            <p>Пароль:</p>
                            <input type="password" class="form-control" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            <br/>
                            <p>Телефон:</p>
                            <input type="text" class="form-control" name="phone" placeholder="Телефон" value="<?php echo $phone; ?>"/>
                            <br/>
                            <p>E-mail:</p>
                            <input type="text" class="form-control" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <br/>
                            <input type="submit" class="form-control" name="submit" class="btn btn-default" value="Сохранить" />
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>