<?php $page_title = $_GET['search']." - Search Result" ?>
<?php $css_files = "resources/css/search-styles.css"; ?>
<?php $css_query_file= "resources/css/search-queries.css" ?>
<?php include 'includes/header.php';?>
<?php include 'includes/functions.php';?>

<header>
    <div class="search-bar-container">
        <div class="row">
            <span class="logo-text"> FoodFusion </span>
                
        </div> 
    </div>
</header>
<div class="clearfix"></div>
<section class="search-bar">
	<form action="search.php" method="GET" class="search-form">
		<input class="search-text" type="text" name="search" id="search" placeholder="Enter Name, City or Pincode" required
		<?php if(isset($_GET['search'])){
			   echo " value='".$_GET['search']."'";
			}
		   ?>
		/>
		<input type="submit" value="Search" />
		<br>
		<div class="form-sorting">
			<span class="form-sortby__text">Sort By: </span>
			<br>
				<input type="radio" id="name" name="sortby" value="res_name" 
				   <?php if(isset($_GET['sortby'])){
					   if($_GET['sortby'] == 'res_name'){
						   echo 'checked';
					   }}
					   ?> >
				<label for="name" class="form-sorting__label">Name</label>
				<input type="radio" id="rating" name="sortby" value="res_rating"
				<?php if(isset($_GET['sortby'])){
					 if($_GET['sortby'] == 'res_rating'){
						   echo 'checked';
					   }}
					   ?>
				 >
				<label for="rating" class="form-sorting__label">Rating</label>
				<br>
				<input type="radio" id="asc" name="order" value="asc" 
				<?php if(isset($_GET['order'])){
					   if($_GET['order'] == 'asc'){
						   echo 'checked';
					   }}
					   ?>
				>
				<label for="name" class="form-sorting__label">Ascending</label>
				<input type="radio" id="asc" name="order" value="desc" 
				<?php if(isset($_GET['order'])){
					   if($_GET['order'] == 'desc'){
						   echo 'checked';
					   }}
					   ?>
				>
				<label for="rating" class="form-sorting__label">Descending</label>
		</div>
	</form>
</section>
<section class="section-results">
    <div class="row">
        <div class="col span-12-of-12 search-results">
            <?php
			connectDatabase();
            //readData();
            readBySearch();
			showDataInTable();
			?>
        </div>
    </div>
</section>
<footer>
			<div class="row">
				<ul class=" footer-list">
					<li class="footer-list__item"><a href="#" class="footer-list__link">About us</a></li>
					<li class="footer-list__item"><a href="#" class="footer-list__link">FAQs</a></li>
					<li class="footer-list__item"><a href="#" class="footer-list__link">Contact</a></li>
					<li class="footer-list__item"><a href="index.php" class="footer-list__link">Home</a></li>
				</ul>
			</div>
			<div class="row">
				<center>&copy; Copyright 2020. All rights reserved. Made with ❤️ by Meharpreet Singh and Nitin Sood.</center>
			</div>
		</footer>








<?php include "includes/footer.php" ?>














<!--

RESULT CARD
            <table class="results-table">
                <tr>
                    <td rowspan="3"class="result-table__restimg"><img class="result-table__restimg-img" src="resources/img/coffee.jpg" alt="Image"></td>
                    <td colspan="2" class="result-table__restname">Bean 'n' Brewers</td>
                    <td rowspan="3" class="result-table__restrating"><span class="result-table__restrating-text">3.5/5</span></td>
                </tr>
                <tr>
                    <td colspan="2" class="result-table__restaddr"><Address>Bathinda - 151001</Address></td>
                </tr>
                <tr>
                	<td colspan="2" class="result-table__time">6:00 am - 10:00 pm</td>
                </tr>
                <tr class="result-table-link-row">
                   <td> </td>
                    <td class="result-table__restmenu"><a href="#" class="result-table__restmenu--link">Menu</a></td>
                    <td class="result-table__restcontact"><a href="" class="result-table__restcontact--link">Call</a></td>
				</tr>
            </table>
-->