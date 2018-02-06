<?php
require_once('Db.php');
class Func {
    //Добавление картинки
    public static function loadImg($url,$lastId)
    {
        
        $db = Db::getConnection();
        $idd .= $lastId.$rand = rand(0, 999);
        $ch = curl_init($url);
        $fp = fopen("./upload/images/products/{$idd}.jpg", 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        
        $sql = 'INSERT INTO images '
                . '(product_id, name_img )'
                . 'VALUES '
                . '(:product_id, :name_img )';
        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $lastId, PDO::PARAM_STR);
        $result->bindParam(':name_img', $idd, PDO::PARAM_STR);
        $result->execute();
    }

    public static function lastId() {
         // Соединение с БД lastInsertId();
        $db = Db::getConnection();

        // Получение последнею запись id
        $result = $db->prepare('SELECT id FROM product ORDER BY id DESC');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $result->fetch();
    }
        public static function createProduct($options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO product '
                . '(name, price, category_id, '
                . 'description_seo, title, brand  )'
                . 'VALUES '
                . '(:name, :price, :category_id, '
                . ':description_seo, :title, :brand)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['id'], PDO::PARAM_INT);
        $result->bindParam(':title', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':description_seo', $options['name'], PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

}
?>