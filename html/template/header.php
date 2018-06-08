<div class="header">
	<div class="wrapper">
		
		<div class="header-logo">
			<a href="<?php Page::uri(); ?>"><img src="<?php Page::uri(); ?>files/images/logo.png" alt="" ></a>
		</div>

		<div class="header-menu">
			<a href="<?php Page::uri(); ?>">Главная</a>
			<a href="<?php Page::uri(); ?>children">Ребенки</a>
			<a href="<?php Page::uri(); ?>about">О нас</a>
			<a href="<?php Page::uri(); ?>news">Новости</a>
			<a href="<?php Page::uri(); ?>contact">Контакты</a>
		</div>

		<div class="header-user">
			<?php
				if(User::isCookieAuth()){
	                if(!User::isAuth()){
	                    $_SESSION['user'] = $_COOKIE['userCookie'];
	                }
	            }
	            ?>
				<?php if(User::isAuth()): ?>
					<?php $topUser = User::getUserByID($_SESSION["user"]); ?>
					<a class="account"><i class="icon-user"></i> <?php echo $topUser["name"]; ?></a>
					<div class="user-corner"></div>
					<div class="nav-menu">
						<a href="<?php Page::uri(); ?>account"><i class="icon-login"></i> Аккаунт</a>
						<a href="<?php Page::uri(); ?>account/change-password"><i class="icon-settings"></i> Изменить пароль</a>
						<a href="<?php Page::uri(); ?>logout"><i class="icon-power"></i> Выход</a>
					</div>
				<?php else: ?>
					<a href="<?php Page::uri(); ?>login"><i class="icon-user"></i> Мой аккаунт</a>
				<?php endif;?>
		</div>


		<div class="mobile-corner"></div>
		<div class="mobile-menu">
			<a href="<?php Page::uri(); ?>">Главная</a>
			<a href="<?php Page::uri(); ?>children">Ребенки</a>
			<a href="<?php Page::uri(); ?>about">О нас</a>
			<a href="<?php Page::uri(); ?>news">Новости</a>
			<a href="<?php Page::uri(); ?>contact">Контакты</a>
			<a href="<?php Page::uri(); ?>login">Мой аккаунт</a>
		</div>

		<div class="mobile-icon">
			<i class="icon-menu"></i>
		</div>

		<div class="clear"></div>
	</div>
</div>