
<div class="clear pd30"></div>
<div class="footer">
	<!-- Block Email -->
	<div class="pd30 bg-white">
		<div class="wrapper">
			<!-- Block Title -->
			<h2 class="cntr">Подписывайтесь на нашу Email рассылку</h2>

			<div class="pd15"></div>

			<!-- Form -->
			<div class="row email">
				<input class="column-8" type="email" id="footer-email" placeholder="Ваш Email">
				<button class="column-4 btn" id="footer-button">Подписаться</button>
				<div class="clear"></div>
			</div>
			<!-- end Form -->
			<p class="cntr pd20" id="email-message"></p>

		</div>
	</div>
	<!-- end Block -->

	<!-- get Footer -->
	<div class="pd30 bg-black">
		<div class="wrapper">

			<!-- Description and Social networks -->
			<div class="column-6 pd30">
				<p><b>Charity Wish Tree </b>- это настоящее дерево желаний, исполняющее мечты детей из детского дома</p>
				<br>
				<p>Соц.сети:</p>
				<a target="_blank" rel="nofollow" href="mailto:dianakulakeeva@gmail.com"><i class="icon-envelope"></i></a>
				<a target="_blank" rel="nofollow" href="https://vk.com/charity_wish_tree"><i class="icon-social-vkontakte"></i></a>
				<a target="_blank" rel="nofollow" href="https://www.youtube.com/channel/UCqJhXBGvq6WnxP6-BnSk2YA"><i class="icon-social-youtube"></i></a>
				<a target="_blank" rel="nofollow" href="https://www.instagram.com/charity_wish_tree/"><i class="icon-social-instagram"></i></a>
			</div>

			<!-- Navigation -->
			<div class="column-3 pd30">
				<ul>
					<span>Навигация</span>
					<li><a href="<?php Page::uri(); ?>">Главная</a></li>	
					<li><a href="<?php Page::uri(); ?>children">Ребенки</a></li>	
					<li><a href="<?php Page::uri(); ?>about">О нас</a></li>	
					<li><a href="<?php Page::uri(); ?>news">Новости</a></li>	
					<li><a href="<?php Page::uri(); ?>contact">Контакты</a></li>	
				</ul>
			</div>

			<!-- Account -->
			<div class="column-3 pd30">
				<ul>
					<span>Аккаунт</span>
					<?php if(User::isAuth()): ?>
						<li><a href="<?php Page::uri(); ?>account">Аккаунт</a></li>
						<li><a href="<?php Page::uri(); ?>account/change-password">Изменить пароль</a></li>
						<li><a href="<?php Page::uri(); ?>logout">Выход</a></li>
					<?php else: ?>
						<li><a href="<?php Page::uri(); ?>login">Вход</a></li>	
						<li><a href="<?php Page::uri(); ?>register">Регистрация</a></li>	
					<?php endif;?>
				</ul>
			</div>
		</div>

		<div class="clear"></div>
	</div>
	<!-- end Footer -->

	<!-- Copyright -->
	<div class="copy" >
		<div class="wrapper">

			<!-- Copy -->
			<div class="column-4 pd20">
				<p class="">Charitywishtree.com &copy; 2018</p>
			</div>

			<!-- Margin -->
			<div class="column-6">&nbsp;</div>

			<!-- Developers -->
			<div class="column-2 pd20">
				<a style="padding: 0;margin: 0;" href="<?php Page::uri(); ?>developers">Разработчики</a>
			</div>

			<div class="clear"></div>
		</div>
	</div>
	<!-- end Copyright -->
</div>