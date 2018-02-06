<?php
/**
 * Description of Seo
 *
 * @author bizon
 */
class Seo {
    /**
     * Возвращает id товара
     * @param type $id [] <p>Номер текущей страницы</p>
     * @param type $id2 [] <p>Имя БД 1 или 2</p>
     */
    public static function getIdPage($id2)
    {
         //echo '<pre>';
        $id = explode('/',$_SERVER['REQUEST_URI']);
        if(!empty($id[1]) && !empty($id[$id2]))
        {
           return $id[$id2];
        }
        else {return null;}
 
    }
    /**
     * Возвращает title и description
    * @param type $id <p>Номер текущей страницы</p>
    *  @param type $name <p>Имя поля</p>
    *  @param type $dbname <p>Имя базы данных</p>
    * @return string <p>строка</p>
     */
public static function getTitDesc($id,$name,$dbname)
{
     // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT title, {$name} FROM {$dbname} WHERE id = :id";
        
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        $row = $result->fetch();
        // Получение и возврат результатов
        return $row[$name];
}
   
}
