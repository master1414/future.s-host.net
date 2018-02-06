<?php

/**
 * Контроллер CabinetController
 * Кабинет пользователя
 */
class CabinetController
{

    /**
     * Action для страницы "Кабинет пользователя"
     */
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Подключаем вид
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Заполняем переменные для полей формы
        $name = $user['name'];
        $password = $user['password'];
        $phone = $user['phone'];
        $email = $user['email'];

        // Флаг результата
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            // Флаг ошибок
            $errors = false;

            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $name, $password,$phone,$email);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;require_once(ROOT . '/views/cabinet/edit.php');
    }
    public function actionParser()
    {
        $pars = new Parser;
	ini_set('max_execution_time', '0'); 
    $urls = array(
	//"https://evrokrovlya.com.ua/krovelnyie-meterialyi/kompozitnaya-cherepitsa/brand-metrotile/"
            "https://evrokrovlya.com.ua/karniznaya-podshivka/podshivka-karniza-sofity/"
            //"https://evrokrovlya.com.ua/krovelnyie-meterialyi/keramicheskaya-cherepitsa/brand-braas/page/2/"
            );
    $ur = array($_POST['url']);
    if(isset($_POST['url'])){
    $ur = array($_POST['url']);
$arrUrlSav = array();
    foreach ($ur as $itUrl){
        $file = file_get_contents($itUrl);
        $htmlU = phpQuery::newDocument($file);
        $getUrl = $htmlU->find('#main>div>ul>li');
        //$getUrl = $htmlU->find('div.pagination-holder');
        foreach ($getUrl as $item){
            $getC = pq($item)->html();
           $arrUrlSav[] = trim($getC);
           //echo pq($item)->html();
           //echo '<br>';
        }
    }
  }
 else {
      require_once(ROOT . '/views/cabinet/parser.php');
      exit();
  }
    require_once(ROOT . '/views/cabinet/parser.php');
    if(isset($_POST['menuVisible']) == 'Yes')
    {
        echo '<div class="col-md-8">';
        $pars->getMenu($urls);//Меню
        echo '</div>';
    }
    
    echo  $pars->getSetUrl($ur, 'div.pagination-holder');//Пагинация
    echo '<pre>';
    $pars->getNamProd($arrUrlSav,'h3','text');//Имя товара
    $pars->getNamProd($arrUrlSav,'div.price','text');//Цена товара
    $pars->loadImg($arrUrlSav);//Имя картинки
    
    $options = array();
    //Здесь формируем массив для хранения в БД
    for ($i = 0; $i < count($pars->getNamProd($arrUrlSav,'h3','text')); $i++) {
        $lastId = Func::lastId()['id']+1;
        $Id = intval($_POST['idProd']);//57;
        $options['id'] = $Id;
        $options['product_id'] = $lastId;//Нужен для генерации картинки
        $options['name'] = $pars->getNamProd($arrUrlSav,'h3','text')[$i];
        $options['price'] = $pars->getNamProd($arrUrlSav,'div.price','text')[$i];
        $options['name_img'] = $pars->loadImg($arrUrlSav)[$i];
        $options['brand'] =  $_POST['brand'];
        //echo $lastId.' - ';
        //Сохраняем в БД
        //Проверяем установлин флажок для сохранения и для отмены если id пуст
        if(!empty($_POST['flagg']) == 'Yes' and !empty($Id)){
        Func::loadImg($options['name_img'],$options['product_id']);
        Func::createProduct($options);
            echo 'Ok -';
        }
        echo '<div class="col-md-4">';
        print_r($options);
        echo '</div>';
        
        }
        
        return true;
    }
     /**
     * Action для страницы "Кабинет пользователя"
     */
    public function actionManual()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Подключаем вид
        require_once(ROOT . '/views/cabinet/manual.php');
        return true;
    }
    
}
