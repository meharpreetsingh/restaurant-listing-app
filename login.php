<?php $page_title = "Admin - Login" ?>
<?php $css_files = "resources/css/login-styles.css"; ?>
<?php $css_query_file= "resources/css/login-queries.css" ?>
<?php include 'includes/header.php';?>
<?php include 'includes/functions.php';?>


<?php connectDatabase(); ?>

<?php
//Session Start
session_start();


?>

<header>
    <div class="search-bar-container">
        <div class="row">
            <span class="logo-text"> FoodFusion </span>
        </div> 
    </div>
</header>
<div class="clearfix"></div>
<section class="create-row">
<form action="login.php" method="POST" enctype="multipart/form-data">
    <div class="row create-form">
        <div class="form-group">
        	<div class="form-label"><label for="username">Username: </label></div>
        	<div class="form-input">
        		<input type="text" name="username" id="username" required>
        	</div>
        </div>
        <div class="form-group">
        	<div class="form-label"><label for="name">Password: </label></div>
        	<div class="form-input">
        		<input type="password" name="password" id="password" required>
        	</div>
        </div>
        <div class="form-group">
        	<div class="form-label"></div>
        	<div class="form-input">
        		<input type="submit" name="submit" value="Login">
        	</div>
        </div>
    </div>
</form>
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
        <center>© Copyright 2020. All rights reserved. Made with ❤️ by Meharpreet Singh and Nitin Sood.</center>
    </div>
</footer>

<?php
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    
    //Query
    $query = "SELECT * FROM `users` WHERE `username` = '$user' && `password` = '$pwd'";
    
    //Executing Query in Database
    $result = mysqli_query($connection,$query);
    
    //Number of Rows recieved from Query
	$total = mysqli_num_rows($result);
    
    //Directing to admin page
    if($total == 1){
        $_SESSION['user_name'] = $user;
        header('location:admin_panel.php');
    }else{
        echo "Incorrect information entered";
    }
}
?>









