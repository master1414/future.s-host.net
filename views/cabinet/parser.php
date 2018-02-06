<link href="/template/css/bootstrap.min.css" rel="stylesheet">
            <ul>
                <li><a href="/cabinet">На админ панель</a></li>
                
            </ul>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Парсинг данных</h2>
                        <form action="#" method="post">
                            <input type="text" class="form-control" name="idProd" placeholder="Id продукта" value=""/>
                            <br/>
                            <input type="text" class="form-control" name="url" placeholder="url" value=""/>
                            <br/>
                            <input type="text" class="form-control" name="brand" placeholder="Имя бренда" value=""/>
                            <br/>
                            <input type="checkbox" name="flagg" value="Yes" />Сохранить на сайт<br/>
                            <br/>
                            <input type="checkbox" name="menuVisible" value="Yes" />Отображать меню<br/>
                            <input type="submit" class="form-control" name="submit" class="btn btn-default" value="Старт" />
                        </form>
                    </div><!--/sign up form-->
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>
<div class="row">
  
  
</div>
<?php
if(!empty($_POST))
{
    //print_r($_POST);
}


?>


