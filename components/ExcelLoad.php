<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// Подключение файлов системы
require_once 'PHPExcel.php';
require_once (realpath('../models/Product.php'));
require_once (realpath('../components/Db_1.php'));
$id2 = intval($_GET['id']);
if(!empty($id2))
{
    $prod = Product::getCategoryList($id2);
    loaddExel($prod);
}
 else {
    header('Location:/');    
}
//Генирация EXCEL файла
function loaddExel($products_list)
{
$objPHPExcel = new PHPEXcel();
$objPHPExcel->setActiveSheetIndex(0);
$active_sheet = $objPHPExcel->getActiveSheet();
$active_sheet2 = $objPHPExcel->getActiveSheet();
// Ориентация страницы и  размер листа
$active_sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$active_sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
// Поля документа
$active_sheet->getPageMargins()->setTop(1);
$active_sheet->getPageMargins()->setRight(0.75);
// Настройки шрифта
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
//Ширина ячеек
$active_sheet->getColumnDimension('A')->setWidth(50);
$active_sheet->getColumnDimension('B')->setWidth(20);
//Заголовок ячеек
$active_sheet->setCellValue('A1','Наименование');
$active_sheet->setCellValue('B1','Цена');
$row_start = 1;
$i = 1;
foreach($products_list as $item) {
        $row_next = $row_start + $i;
        $active_sheet->setCellValue('A'.$row_next,$item['name']);
        $active_sheet->setCellValue('B'.$row_next,$item['price']);
        $i++;
}
$style_header = array(
    'font'=>array(
        'bold' => true,
        'name' => 'Times New Roman',
        'size' => 10
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
    ),
    'borders' => array(
        'right' => array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN
        )
    )
);
$active_sheet->getStyle('A1:AD1')->applyFromArray($style_header);
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename='Прайс-лист.xls'");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
header('Location:/');  
}
