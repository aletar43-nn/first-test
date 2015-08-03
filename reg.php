<?php
// Запись информации из формы в БД.

	if(isset($_POST['reg'])){	// проверка переданной информации через форму из index.php
		$name = $_POST['namec']; //переменные, соответствующие столбцам таблицы в БД
		$textContent = $_POST['text_content'];
		if ((!empty($_POST['namec']))&&(!empty($_POST['text_content']))){
			
			if($_FILES['uploadfile']['error'] == 0){
				if(
					($_FILES['uploadfile']['type'] == "image/jpeg") ||
					($_FILES['uploadfile']['type'] == "image/png") ||
					($_FILES['uploadfile']['type'] == "image/gif") ||
					($_FILES['uploadfile']['type'] == "image/bmp") ||
					($_FILES['uploadfile']['type'] == "image/jpg")
						
				) {	// массив расширений для картинки
					$img_arr = array(
						"image/jpeg" => ".jpg",
						"image/png" => ".png",
						"image/gif" => ".gif",
						"image/bmp" => ".bmp",
						"image/jpg" => ".jpg"
					);
					$image_name=date("Y_m_d_H_i_s_").rand(0,999999).$img_arr[($_FILES['uploadfile']['type'])]; //генерация имени картинки

					move_uploaded_file($_FILES['uploadfile']['tmp_name'],'img/'.$image_name);	//перенос картинки на сервер
					//был загружен файл картинки
					
					$imagel = 'img/'.$image_name;

					$datel = date("Y-m-d");
					$sql = "INSERT INTO news SET title = '$name', text = '$textContent', date = '$datel', img_src = '$imagel'";
					
					$result = mysql_query($sql, $conn); //запись в БД
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