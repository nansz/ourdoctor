<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>RSmarket</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="images/favicon-96x96.png" sizes="96x96">
	<link rel="stylesheet" href="css/fa.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css"/>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="js/slick.js"></script>
	<script src="js/main.js"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
	<script>
		$(document).ready(function(){ 
      	$("#checkout_customer_main_telephone").mask('+38 (099) 999-99-99'); 
 		});
	</script>

</head>
<body>
	<header>
		<div class="container">
			<div class="cart mobile tablet">
				<a href="#">
					<i class="fa fa-shopping-cart"></i>
					<span class="cart-total">10</span>
				</a>
			</div>

			<div class="logo mobile tablet">
				<a href="./"><img src="images/logo.png" alt="RSmarket" title="RSmarket"></a>
			</div>

			<nav class="navbar">
				<div class="toggleMenuBtn mobile tablet">
					<a href="javascript:void(0)" class="fa fa-bars"></a>
				</div>
				<div class="menu">
					<ul class="menu__btn mobile tablet">
						<li><a href="javascript:void(0)" data-target=".menu__basic">Меню</a></li>
						<li><a href="javascript:void(0)" data-target=".menu__catalogue">Каталог</a></li>
						<li><a href="javascript:void(0)" data-target=".menu__assets">Контакты</a></li>
					</ul>

					<ul class="menu__basic" role="navigation">
						<li class="desctop">Продажа и аренда электроинструментов по всей Украине</li>
						<li><a href="#">О нас</a></li>
						<li><a href="./newses.php">Cтатьи</a></li>
						<li><a href="partners.php">Партнеры</a></li>
						<li><a href="brends.php">Бренды</a></li>
						<li><a href="#">Условия аренды</a></li>
						<li><a href="#">Гарантия</a></li>
						<li><a href="contacts.php">Контакты</a></li>
					</ul>

					<ul class="menu__catalogue" role="navigation">
						<li><a href="catalogue.php">Новая техника</a></li>
						<li><a href="catalogue.php">Б.У. техника</a></li>
						<li><a href="catalogue.php">Прокат</a></li>
						<li><a href="catalogue.php">Светодиодная продукция</a></li>
					</ul>

					<ul class="menu__assets" role="navigation">
						<li class="desctop">
							<div id="logo">
								<a href="./"><img src="images/logo.png" title="RSmarket" alt="RSmarket"></a>
							</div>
						</li>
						<li>
							<div class="cont-tel">
								<div class="fa fa-phone"></div>
								<div>
									<p><a href="tel:+380990000000">+38 099 00 00 000</a></p>
									<p><a href="tel:+380990000001">+38 066 00 00 001</a></p>
									<p><a href="tel:+380990000002">+38 067 00 00 002</a></p>
								</div>
							</div>
						</li>
						<li>
							<div class="cont-adress">
								<div class="fa fa-map-marker"></div>
								<div>
									г. Харьков, ул. Юрьевская 17
								</div>
							</div>
						</li>
						<li>
							<div id="welcome">
								<a href="#"><i class="fa fa-user"></i>Войти</a>
							</div>
						</li>
						<li class="mobile tablet">
							<div class="btn-wrap">
								<a href="#" class="btn white" id="mobile-callback">Обратный звонок</a>
							</div>
						</li>
						<li class="desctop pull-right">
							<div id="cart">
								<div class="heading">
									<a title="Корзина покупок"><span id="cart-total">1</span></a>
								</div>
								<div class="content">
									<div class="empty"></div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<div class="btn-wrap pull-right desctop animated pulse">
				<a href="javascript:void(0)" class="btn orange" id="header-callback">Обратный звонок</a>
			</div>

			<div id="search">
				<div class="button-search fa fa-search"></div>
				<input type="text" name="search" placeholder="Поиск" value="">
			</div>
		</div>
		

		<div class="registration">
			<p>Войти в интернет-магазин</p>
			<form action="">
				<input type="text" placeholder="Email">
				<input type="text" placeholder="Пароль">
				<a href="">Забыли пароль?</a>
				<input type="submit" value="Войти">
				<p>или</p>
				<a href="" class="registration-btn btn orange">Регистрация</a>
			</form>
		</div> 
			<div class="callback">
			<p>Обратный звонок</p>
			<form action="">
				<input type="text" placeholder="Имя">
				<input type="text" placeholder="Email">
				<input type="text" placeholder="Телефон" id="checkout_customer_main_telephone" >
				<input type="submit" value="Отправить">
			</form>
		</div> 
		<div class="background"></div>
	</header>
	