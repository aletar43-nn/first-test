<?php
// Запись информации из формы в БД.

	if(isset($_POST['reg'])){	// проверка переданной информации через форму из index.php
		$name = $_POST['namec']; //переменные, соответствующие столбцам таблицы в БД
		$textContent = $_POST['text_content'];
		$list_image_type = array("image/jpeg","image/png","image/gif","image/bmp","image/jpg");
		if ((!empty($_POST['namec']))&&(!empty($_POST['text_content']))){
			
			if($_FILES['uploadfile']['error'] == 0){
				if (in_array($_FILES['uploadfile']['type'], $list_image_type)){
					$img_arr = array(
						"image/jpeg" => ".jpg",
						"image/png" => ".png",
						"image/gif" => ".gif",
						"image/bmp" => ".bmp",
						"image/jpg" => ".jpg"
					);
					$image_name=uniqid(date("d_m_Y_H_i_s_")).$img_arr[($_FILES['uploadfile']['type'])]; //генерация имени картинки

					move_uploaded_file($_FILES['uploadfile']['tmp_name'],'img/'.$image_name);	//перенос картинки на сервер
					//был загружен файл картинки
					
					//$imagel = 'img/'.$image_name;

					//$datel = date("Y-m-d");
					$sql = "INSERT INTO news SET title = '$name', text = '$textContent', date = '".date("Y-m-d")."', img_src = '".'img/'.$image_name."'";
					
					$result = mysqli_query($conn, $sql); //запись в БД

					if(!$result){
						$error_x = 'Не записано в БД!';
					}

					header("Location: /index.php");

				}else{
					$error_x = 'Неверный формат файла!';
					//header("Location: /index.php");
					
					//exit("<p>Не верный формат файла!</p>");
				}
			}else{
				$error_x = 'Выбери картинку!';
				//header("Location: /index.php");			
				//exit("<h2>Выбери картинку</h2>");
			}
		}else{
			$error_x = 'Заполни формы до конца!';

			//header("Location: /index.php");
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>Тест формы</title>

</head>
<body>

<div id="page_allign" class="b3radius">
	<div class="form_block">    <!-- Блок для формы-->
		<header>
			<h1>Добавить новую</h1>

		</header>

		<form method="post" enctype=multipart/form-data>
			<div class="form_block">
				<input type="text" name="namec" value=<?=$name;?>>
				<div><b>Введите текст: </b><br>
					<textarea name="text_content" cols="60" rows="10"><?=$textContent;?></textarea>
					<input type="file" name="uploadfile" value="Картинка" >
					<input type="submit" name="reg" value="Готово"></div>

			</div>
			<p class='error_check'><?php echo $error_x;?></p>
		</form>
	</div>
	<!--<div class="news_write">
        <header>
            <h2>НОВОСТИ</h2>
        </header>
    </div> -->

