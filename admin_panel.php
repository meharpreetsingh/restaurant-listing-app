<?php $page_title = "Admin - FoodFusion" ?>
<?php $css_files = "resources/css/admin-styles.css"; ?>
<?php $css_query_file= "resources/css/admin-queries.css" ?>
<?php include 'includes/header.php';?>
<?php include 'includes/functions.php';?>

<?php
//Session Start
session_start();
$userprofile = $_SESSION['user_name'];
if(!$userprofile){
    header('location:login.php');
}
?>
<header>
    <div class="search-bar-container">
        <div class="row">
            <span class="logo-text"> FoodFusion - Admin Panel</span>
        </div> 
    </div>
</header>
<a class="btn-logout" href="logout.php">Logout</a>
<main>
   <div class="row form-result">
		<?php
		connectDatabase();
		if(isset($_POST['submit'])){
			$submit_value = $_POST['submit'];
			
			if($submit_value == "Create Entry"){
				//Create data entry
				createData();
			}else if($submit_value == "Search"){
				readDataByName();
			}else if($submit_value == "Delete"){
				deleteData();
			}else if($submit_value == "Update"){
				updateData();
			}
		}
		?>
	</div>
    <section class="create-row">
        <div class="row">
            <h2>New Restaurant</h2>
        </div>
           <form action="admin_panel.php" method="POST" enctype="multipart/form-data">
            <div class="row create-form">
                <div class="form-group">
                	<div class="form-label"><label for="name">Name: </label></div>
                	<div class="form-input">
                		<input type="text" name="name" id="name" required>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="address">Address: </label></div>
                	<div class="form-input">
                		<input type="text" name="address" id="address" required>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="pincode">Pincode: </label></div>
                	<div class="form-input">
                		<input type="number" name="pincode" id="pincode" min="100000" max="999999" required>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="rating">Rating: </label></div>
                	<div class="form-input">
                		<input type="number" name="rating" id="rating" min="1" max="5" required>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="opentime">Opening Time: </label></div>
                	<div class="form-input">
                		<input type="time" name="opentime" id="opentime" required>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="closetime">Closing Time: </label></div>
                	<div class="form-input">
                		<input type="time" name="closetime" id="closetime" required>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="resimage">Restaurant Image: </label></div>
                	<div class="form-input">
                		<input type="file" name="resimage" id="resimage" required>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="menuimage">Menu Image: </label></div>
                	<div class="form-input">
                		<input type="file" name="menuimage" id="menuimage" required>
                	</div>
                </div>
				<div class="form-group">
                	<div class="form-label"></div>
                	<div class="form-input">
                		<input type="submit" name="submit" value="Create Entry">
                	</div>
                </div>
            </div>
            </form>
    </section>
    <section class="create-row">
        <div class="row">
            <h2>Search Restaurant Data to Delete or Update</h2>
        </div>
            <div class="row create-form">
                <form action="admin_panel.php" method="POST">
                <div class="form-group">
                	<div class="form-label"><label for="name"></label>Search Text: </div>
                	<div class="form-input">
                		<input type="text" name="name" id="name">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"></div>
                	<div class="form-input">
                		<input type="submit" name="submit" value="Search">
                	</div>
                </div>
				</form>
            </div>
    </section>
    <section class="create-row">
        <div class="row">
            <h2>Delete Restaurant</h2>
        </div>
            <div class="row create-form">
                <form action="admin_panel.php" method="POST">
                <div class="form-group">
                	<div class="form-label">
                		<label for="delete-option">Options:</label>
                	</div>
                	<div class="form-input">
                		<select name="delete-select">
                			<?php
							//Show options by res_name with value = res_id
							showDataInOptions();
							?>
                		</select>
                	</div>
                </div>
				<div class="form-group">
                	<div class="form-label"></div>
                	<div class="form-input">
                		<input type="submit" name="submit" value="Delete">
                	</div>
                </div>
                </form>
            </div>
    </section>
    <section class="create-row">
        <div class="row">
            <h2>Update Restaurant Data</h2>
        </div>
            <div class="row create-form">
                <form action="admin_panel.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                	<div class="form-label">
                		<label for="update-option">Options:</label>
                	</div>
                	<div class="form-input">
                		<select name="update-select" id="update-options">
                			<?php
							//Show options by res_name with value = res_id
							showDataInOptions();
							?>
                		</select>
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="name">Change Name: </label></div>
                	<div class="form-input">
                		<input type="text" name="change-name" id="name">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="address">Change Address: </label></div>
                	<div class="form-input">
                		<input type="text" name="change-address" id="address">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="pincode">Change Pincode: </label></div>
                	<div class="form-input">
                		<input type="number" name="change-pincode" id="pincode" min="100000" max="999999">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="rating">Change Rating: </label></div>
                	<div class="form-input">
                		<input type="number" name="change-rating" id="rating" min="1" max="5">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="opentime">Change Opening Time: </label></div>
                	<div class="form-input">
                		<input type="time" name="change-opentime" id="opentime">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="closetime">Change Closing Time: </label></div>
                	<div class="form-input">
                		<input type="time" name="change-closetime" id="closetime">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="resimage">Change Restaurant Image: </label></div>
                	<div class="form-input">
                		<input type="file" name="change-resimage" id="resimage">
                	</div>
                </div>
                <div class="form-group">
                	<div class="form-label"><label for="menuimage">Change Manu Image: </label></div>
                	<div class="form-input">
                		<input type="file" name="change-menuimage" id="menuimage">
                	</div>
                </div>
				<div class="form-group">
                	<div class="form-label"></div>
                	<div class="form-input">
                		<input type="submit" name="submit" value="Update">
                	</div>
                </div>
                </form>
            </div>
    </section>
</main>


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




<?php include 'includes/footer.php';?>