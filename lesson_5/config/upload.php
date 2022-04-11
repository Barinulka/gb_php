<? 
include 'config.php';
	// Пути загрузки файлов
$path = '../img/';
$tmp_path = 'tmp/';
// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
$size = 10240000;
 
// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// Проверяем тип файла
	if (!in_array($_FILES['picture']['type'], $types))
		die('<p>Запрещённый тип файла. <a href="../index.php">Попробовать другой файл?</a></p>');
 
	// Проверяем размер файла
	if ($_FILES['picture']['size'] > $size)
		die('<p>Слишком большой размер файла. <a href="../index.php">Попробовать другой файл?</a></p>');
 
	// Функция изменения размера
	// Изменяет размер изображения в зависимости от type:
	//	type = 1 - эскиз
	// 	type = 2 - большое изображение
	//	rotate - поворот на количество градусов (желательно использовать значение 90, 180, 270)
	//	quality - качество изображения (по умолчанию 75%)
	function resize($file, $quality = null){
		global $tmp_path;
 
		// Ограничение по ширине в пикселях
		$max_size = 800;
	
		// Качество изображения по умолчанию
		if ($quality == null)
			$quality = 75;
 
		// Cоздаём исходное изображение на основе исходного файла
		if ($file['type'] == 'image/jpeg')
			$source = imagecreatefromjpeg($file['tmp_name']);
		elseif ($file['type'] == 'image/png')
			$source = imagecreatefrompng($file['tmp_name']);
		elseif ($file['type'] == 'image/gif')
			$source = imagecreatefromgif($file['tmp_name']);
		else
			return false;
		
			$src = $source;
 
		// Определяем ширину и высоту изображения
		$w_src = imagesx($src); 
		$h_src = imagesy($src);
 
		// Устанавливаем ограничение по ширине.
		$w = $max_size;
 
		// Если ширина больше заданной
		if ($w_src > $w){
			// Вычисление пропорций
			$ratio = $w_src/$w;
			$w_dest = round($w_src/$ratio);
			$h_dest = round($h_src/$ratio);
 
			// Создаём пустую картинку
			$dest = imagecreatetruecolor($w_dest, $h_dest);
			
			// Копируем старое изображение в новое с изменением параметров
			imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
 
			// Вывод картинки и очистка памяти
			imagejpeg($dest, $tmp_path . $file['name'], $quality);
			imagedestroy($dest);
			imagedestroy($src);
 
			return $file['name'];
		}
		else
		{
			// Вывод картинки и очистка памяти
			imagejpeg($src, $tmp_path . $file['name'], $quality);
			imagedestroy($src);
 
			return $file['name'];
		}
	}
 
	$name = resize($_FILES['picture'], $_POST['file_type'], $_POST['file_rotate']);
 
	// Загрузка файла и вывод сообщения
	if (!@copy($tmp_path . $name, $path . $name)) {
		echo '<p>Что-то пошло не так.</p>';
	} else {
		$file_size = $_FILES['picture']['size'];
		$sql = "INSERT INTO `photos` (name, size) VALUES ('$name' , '$file_size')";

		if(mysqli_query($connect,$sql)){
			echo '<p>Загрузка прошла удачно <a href="../index.php">Назад</a>.</p>';
		} else {
			die('Неверный запрос: '. mysqli_error($connect));
		}
		
	}
 
	// Удаляем временный файл
	unlink($tmp_path . $name);
}