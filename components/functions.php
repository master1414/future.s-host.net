<?php


/**
* Построение дерева
**/
function map_tree($dataset) {
	$tree = array();

	foreach ($dataset as $id=>&$node) {    
		if (!$node['parent']){
			$tree[$id] = &$node;
		}else{ 
            $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}

	return $tree;
}

/**
* Дерево в строку HTML
**/
function categories_to_string($data){
    $string = '';
    
	foreach($data as $item){
            
		$string .= '<li>'.categories_to_template($item).'</li>';
                
	}
        
	return $string;
}

/**
* Шаблон вывода категорий
**/
function categories_to_template($category){
	ob_start();
	include ROOT.'/views/layouts/menu.php';
	return ob_get_clean();
}
