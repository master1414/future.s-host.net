<?php
class Parser {
    
    /** Находим пагинацию (div.pagination-holder)
     * $urls указываем основной сайт который будем парсить 
    * Параметр $selector выбираем какй блок будем парсить (#main>div>ul>li)
    * Возвращаем строку
    */
    public static function getSetUrl($urls,$selector)
    {
    $arrUrlSav;
    if(!empty($urls)){
    foreach ($urls as $itUrl){
        $file = file_get_contents($itUrl);
        $htmlU = phpQuery::newDocument($file);
        $getUrl = $htmlU->find($selector);
        foreach ($getUrl as $item){
           $getC = pq($item)->html();
           $arrUrlSav = trim($getC);
           //echo pq($item)->html();
           //echo '<br>';
        }
    }
    }
    if(empty($arrUrlSav)){echo 'Пагинации нет';}
    else{ return $arrUrlSav;}
    
    }
    //Меню. Вставляем url сайта основной
    public static function getMenu($urls)
    {
    foreach ($urls as $itUrl){
        $file = file_get_contents($itUrl);
        $htmlU = phpQuery::newDocument($file);
        $getUrl = $htmlU->find('#sidebar>div');
        foreach ($getUrl as $item){
        $get = pq($item)->find('ul.product-categories');
           echo '<br>';
           echo pq($get)->html();
           echo '</br>';
        }
    }
    
    }
    /*
     * Данную функцией можно получать разные значения подставляю нужные параметры
     * h3 Имя продукта
     * div.price Цена продукта
     * $func Выбираем функцию text или html
     */
    public static function getNamProd($arrUrlSav,$tag,$func)
    {
        $nameH3 = array();
        foreach ($arrUrlSav as $item){
           //$get = pq($item)->find('h3');
           $get = pq($item)->find($tag);
           $getM = pq($get)->$func();
           //echo trim($getM);
           //echo '<br>';
           $nameH3[] = trim($getM);
        }
        return $nameH3;
    }
    /*
     * Получаем url адресс картинки
     */
    public static function loadImg($arrUrlSav)
    {
        $nameIMG = array();
        foreach ($arrUrlSav as $item){
           $get = pq($item)->find('div.front');
           $nameI = pq($get)->html();
           //echo pq($get)->html();
           //echo '<br>';
           $nameIMG[] = trim($nameI);
        }
        $nameIMGurl = array();
        foreach ($nameIMG as $item){
           $get = pq($item)->attr('src');
           //echo $get;
           //echo '<br>';
           $nameIMGurl[] = trim($get);
        }   
        return $nameIMGurl;
    }
}
