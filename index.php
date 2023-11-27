<!DOCTYPE html>

<html lang="en-UA">
	<head>
		<link rel="stylesheet" type="text/css" href="main_page_styles.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Main site</title>
	</head>

	<body class="body_style">
		<?php 
			$titleErr = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(empty($_POST['title']))
					$titleErr="Title is required";
				else {
					$conn = new mysqli("sql106.infinityfree.com", "if0_35501733", "zbE95UqqYTVM", "if0_35501733_lab6_tabs");
					if ($conn->connect_error)
    					die("Connection failed: " . $conn->connect_error);
    				
    				$title = $_POST['title'];
    				$data = $_POST['data'];

					$sql="INSERT INTO tabs(title, data) VALUES('$title', '$data');";

					if($conn->query($sql))
						echo "Value inserted";
					else
						echo "Error insertion";
					$conn->close();
				}
			}		
		?>

		<header class="left-center">

			<h3 id="x" class="border">Flex-верстка</h3>

			<p>Iron Maiden — британський рок-гурт з Лейтона, Лондон, заснований у 1975 році. Гурт вважають одними із найпопулярніших і найвагоміших виконавців у стилі хеві-метал, частиною «Нової хвилі британського важкого металу» (NWOBHM). Iron Maiden продав більше 120 мільйонів альбомів у всьому світі; три з них досягли першого місця і 15 потрапили в Тор 10 хіт-параді одної лише Британії.</p>

		</header>





		<main>

			<section class="section235 border">

				<section class="section23 border">

					<section class="section2 item-right border">

						<ol> Студійні альбоми:

							<li>Iron Maiden</li>

							<li>The Number of the Beast</li>

							<li>Fear of the Dark</li>

							<li>Brave New World</li>

						</ol>

					</section>



					<section class="section3 border">
						<form method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
							Title:<input type="text" name="title"><?php echo $titleErr;?><br>
							Data:<input type="text" name="data"><br>
							<input type="submit">
						</form>
					</section>

				</section>





				<section class="section5 border">

					<p>Всього Iron Maiden випустили 17 студійних альбомів</p>

				</section>

			</section>

			

			<section class="section4 item-right border">

				<p>Цей сайт зроблено за допомогою Flex-верстки. Здійснено адаптацію для смартфону.</p>

				<p><a href="email_page.html">Поштова верстка</a></p>

			</section>

		</main>





		<footer class="left-center border">

			<h3 class="border">Лабораторна робота №3</h3>

			<p><em>Виконав Присяжний Андрій, ІП-22, всі матеріали взято з Вікіпедії. </em></p>

		</footer>

	</body>



</html>