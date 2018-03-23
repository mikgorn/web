<?php
require_once('PHPExcel.php');
// Подключаем класс для вывода данных в формате excel
require_once('PHPExcel/Writer/Excel5.php');

if(isset($_POST["report1"])){
  $date=$_POST["date"];
  $shop = $_POST["shop"];
  // Подключаем класс для работы с excel


// Создаем объект класса PHPExcel
$xls = new PHPExcel();
// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Подписываем лист
$title = "Отчет на $date";
$sheet->setTitle($title);

// Вставляем текст в ячейку A1
$sheet->setCellValue("A1", $title);
$sheet->getStyle('A1')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');

// Объединяем ячейки
$sheet->mergeCells('A1:H1');

// Выравнивание текста
$sheet->getStyle('A1')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    include("server.php");
    $conn = new mysqli($servername,$username,$password,$database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  $sql=  "select name,code,sum(amount) as total,avg(price_high) as price_h,avg(price_low) as price_l from items where amount>0 and shop='$shop' group by name,code;";
$result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $i=2;
    $sheet->setCellValueByColumnAndRow(1,$i,"Брэнд");
    $sheet->setCellValueByColumnAndRow(2,$i,"Артикул");
    $sheet->setCellValueByColumnAndRow(3,$i,"Количество");
    $sheet->setCellValueByColumnAndRow(4,$i,"Цена по себестоимости");
    $sheet->setCellValueByColumnAndRow(5,$i,"Остаток по себестоимости");
    $sheet->setCellValueByColumnAndRow(6,$i,"Цена продажи");
    $sheet->setCellValueByColumnAndRow(7,$i,"Остаток по продаже");
    $i++;
    while($row = $result->fetch_assoc()) {
      $name = $row["name"];
      $code = $row["code"];
      $amount = $row["total"];
      $price_h = $row["price_h"];
      $price_l=$row["price_l"];

      $tmp_sql = "select sum(amount) as plus from log_items where date>'$date' and shop='$shop' and name='$name' and code='$code';";
      $tmp_result = $conn->query($tmp_sql);
      $tmp_row = $tmp_result->fetch_assoc();
      $plus = intval($tmp_row["plus"]);

      $tmp_sql = "select sum(amount) as plus from log_items where date>'$date' and destination='$shop' and name='$name' and code='$code';";
      $tmp_result = $conn->query($tmp_sql);
      $tmp_row = $tmp_result->fetch_assoc();
      $minus = intval($tmp_row["minus"]);

      $sum = intval($amount)+intval($plus)-intval($minus);

              $sheet->setCellValueByColumnAndRow(1,$i,$name);
              $sheet->setCellValueByColumnAndRow(2,$i,$code);
              $sheet->setCellValueByColumnAndRow(3,$i,$sum);
              $sheet->setCellValueByColumnAndRow(4,$i,$price_l);
              $sheet->setCellValueByColumnAndRow(5,$i,$price_l*$sum);
              $sheet->setCellValueByColumnAndRow(6,$i,$price_h);
              $sheet->setCellValueByColumnAndRow(7,$i,$price_h*$sum);
              // Применяем выравнивание


      $i++;
    }

    for($j=2;$j<i;$j++){
      for($k=1;$k<=7;$k++){

        $sheet->getStyleByColumnAndRow($j , $k)->getAlignment()->
                setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      }
    }


    header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
  header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
  header ( "Cache-Control: no-cache, must-revalidate" );
  header ( "Pragma: no-cache" );
  header ( "Content-type: application/vnd.ms-excel" );
  header ( "Content-Disposition: attachment; filename=report.xls" );

  // Выводим содержимое файла
  $objWriter = new PHPExcel_Writer_Excel5($xls);
  $objWriter->save('php://output');
}


} ?>
