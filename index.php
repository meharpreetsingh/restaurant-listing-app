<?php $page_title = "Welcome to FoodFusion"; ?>
<?php $css_files = "resources/css/index-styles.css"; ?>
<?php $css_query_file= "resources/css/index-queries.css" ?>

<?php include "includes/header.php"; ?>

		<header>
			<div class="header-container">
				<div class="search-container">
					<div class="logo-container">
						<span class="logo-text"> FoodFusion </span>
						<br />
						<span class="under-logo">Find all menus here</span>
					</div>
					<div class="form-container">
						<form action="search.php" method="GET">
							<input class="search-text" type="text" name="search" id="search" placeholder="Enter Name, City or Pincode" required/>
							<input type="submit" value="Search" />
						</form>
					</div>
				</div>
			</div>
		</header>
		<div class="clearfix"></div>
		<section class="section-cities">
			<h2>Browse by Location</h2>
			<div class="row">
				<div class="col span-1-of-4">
					<div class="cities-card cities-card__bathinda">
						<span class="cities-card__text"><a href="search.php?search=151001">Bathinda</a></span>
					</div>
				</div>
				<div class="col span-1-of-4">
					<div class="cities-card cities-card__sangrur">
						<span class="cities-card__text"><a href="search.php?search=148001">Sangrur</a></span>
					</div>
				</div>
				<div class="col span-1-of-4">
					<div class="cities-card cities-card__longowal">
						<span class="cities-card__text"><a href="search.php?search=148106">Longowal</a></span>
					</div>
				</div>
				<div class="col span-1-of-4">
					<div class="cities-card cities-card__dhuri">
						<span class="cities-card__text"><a href="search.php?search=148024">Dhuri</a></span>
					</div>
				</div>
			</div>
		</section>
		<div class="clearfix"></div>
		<section class="section-whatfor">
			<h2>What is FoodFusion?</h2>
			<div class="row">
				<div class="col span-1-of-3"><p class="long-copy">Your guide to menus for restaurants across Punjab</p></div>
				<div class="col span-1-of-3"><p class="long-copy">The latest delivery menus, reviews, and ratings for local restaurants.</p></div>
				<div class="col span-1-of-3"><p class="long-copy">Your place to find contant details of local restaurants.</p></div>
			</div>
		</section>
		<div class="clearfix"></div>
		<footer>
			<div class="row">
				<ul class=" footer-list">
					<li class="footer-list__item"><a href="#" class="footer-list__link">About us</a></li>
					<li class="footer-list__item"><a href="#" class="footer-list__link">FAQs</a></li>
					<li class="footer-list__item"><a href="#" class="footer-list__link">Contact</a></li>
					<li class="footer-list__item"><a href="index.html" class="footer-list__link">Home</a></li>
				</ul>
			</div>
			<div class="row">
				<center>&copy; Copyright 2020. All rights reserved. Made with ❤️ by Meharpreet Singh and Nitin Sood.</center>
			</div>
		</footer>

<?php include "includes/footer.php"; ?>