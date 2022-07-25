<?php

function connectDatabase() {
	//Global Variables
	global $connection;
	
	$connection = mysqli_connect('localhost','root','','restaurant');
	global $connection;
	if(!$connection){
		die("Connection to database failed!");
	}
}
function createData(){
	//Global Variables
	global $connection;
	
	$res_name = $_POST['name'];
	$res_address = $_POST['address'];
	$res_pincode = $_POST['pincode'];
	$res_rating = $_POST['rating'];
	$res_opening = $_POST['opentime'];
	$res_closing = $_POST['closetime'];
    
    print_r($_FILES['menuimage']);
    $res_image = $_FILES['resimage']['name'];
    $res_menu_image = $_FILES['menuimage']['name'];
    
    $res_image_temp = $_FILES['resimage']['tmp_name'];
    $res_menu_image_temp = $_FILES['menuimage']['tmp_name'];
    
    $res_folder = "resources/php/restaurant_img/".$res_image;
    $res_menu_folder = "resources/php/restaurant_menu_img/".$res_menu_image;
	
    echo $res_menu_folder;
        
    move_uploaded_file($res_image_temp,$res_folder);
    move_uploaded_file($res_menu_image_temp,$res_menu_folder);

	if($res_name && $res_address && $res_pincode && $res_rating && $res_opening && $res_closing && $res_image && $res_menu_folder){
		//Query
		$query = "INSERT INTO `res_table` (`res_name`, `res_location`, `res_pin`, `res_rating`, `res_opening`, `res_closing`, `res_image`, `res_menu_image`) ";
		$query .= "VALUES ('$res_name', '$res_address', $res_pincode, $res_rating, '$res_opening', '$res_closing', '$res_folder', '$res_menu_folder')"; //Creating entry in table
        
		//Executing Query in Database
		$result = mysqli_query($connection,$query);
	
		//Checking Execution of Query
		if(!$result){
			echo "<br>"."Query Failed!";
		}else{
			echo "<br>"."Query Successful!";
		}
	}
}
function readData(){
	//Making Global Variables
	global $connection;
	global $result;
	//Query
	$query = "SELECT * FROM `res_table`";

	//Executing Query in Database
	$result = mysqli_query($connection,$query); //Reading data from table

	//Checking Execution of Query
	if(!$result){
		die( "<br>"."Query Failed!".mysqli_error());
	}
}
function readBySearch(){
	//Making Global Variables
	global $connection;
	global $result;
	
	if(isset($_GET['search'])){
		global $search;
		$search = $_GET['search'];

		//Query
		$query = "SELECT * FROM res_table WHERE res_name LIKE '%$search%' OR res_location LIKE '%$search%' OR res_pin LIKE '%$search%'";
		
		if(isset($_GET['sortby'])){
			$query .= " ORDER BY `".$_GET['sortby']."`";
		}
		if(isset($_GET['order'])){
			$query .= " ".$_GET['order'];
		}

		//Executing Query in Database
		$result = mysqli_query($connection,$query); //Reading data from table
	}else{
			echo 'Please Enter Pincode';
	}
}
function showDataInTable() {
	//Global variables
	global $result;
	if($result){
		while($row = mysqli_fetch_assoc($result)) {
			echo '<table class="results-table"><tr>';
			echo '<td rowspan="3"class="result-table__restimg"><a href="'.$row['res_image'].'"><img class="result-table__restimg-img" src="'.$row['res_image'].'" alt="Image"></a></td>';           
			echo '<td colspan="2" class="result-table__restname">'.$row['res_name'].'</td>';
			echo '<td rowspan="3" class="result-table__restrating"><span class="result-table__restrating-text">'.$row['res_rating'].'/5'.'</span></td></tr><tr>';
			echo '<td colspan="2" class="result-table__restaddr"><Address>'.$row['res_location'].' - '.$row['res_pin'].'</Address></td></tr><tr>';
			echo '<td colspan="2" class="result-table__time">'.date('g:i A', strtotime($row['res_opening'])).' - '.date('g:i A', strtotime($row['res_closing'])).'</td></tr><tr class="result-table-link-row"><td> </td>';
			echo '<td class="result-table__restmenu"><a href="'.$row['res_menu_image'].'" class="result-table__restmenu--link">Menu</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '<a href="" class="result-table__restcontact--link">Call</a></td></tr></table>';
		}
	}
	else{
		echo "<h2>No Match Found</h2>";
	}
	
}
function readDataByName(){
	//Making Global Variables
	global $connection;
	global $result;
	if(isset($_POST['name'])){
		$search = $_POST['name'];

		//Query
		$query = "SELECT * FROM res_table WHERE res_name LIKE '%$search%' OR res_location LIKE '%$search%' OR res_pin LIKE '%$search%'";

		//Executing Query in Database
		$result = mysqli_query($connection,$query); //Reading data from table
	}
}
function showDataInOptions(){
	//Global Variables
	global $connection;
	global $result;
	readDataByName();
	while($row = mysqli_fetch_assoc($result)) {
		$id = $row['res_id'];
		$res_name = $row['res_name'];
		echo "<option value='$id'>$res_name</option>";
	}
}
function updateData(){
	//Global Variables
	global $connection;
	
	if(isset($_POST['update-select'])){
		$id = $_POST['update-select'];
		
		$res_name = $_POST['change-name'];
		$res_location = $_POST['change-address'];
		$res_pin = $_POST['change-pincode'];
		$res_rating = $_POST['change-rating'];
		$res_opening = $_POST['change-opentime'];
		$res_closing = $_POST['change-closetime'];
		
        $res_image = $_FILES['change-resimage']['name'];
        $res_menu_image = $_FILES['change-menuimage']['name'];

        $res_image_temp = $_FILES['change-resimage']['tmp_name'];
        $res_menu_image_temp = $_FILES['change-menuimage']['tmp_name'];

        $res_folder = "resources/php/restaurant_img/".$res_image;
        $res_menu_folder = "resources/php/restaurant_menu_img/".$res_menu_image;
        
		if($res_name){
			//Query
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_name`='$res_name' ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Name Change Failed!";
			}else{
				echo "<br>"."Name Changed Successfully!";
			}	
		}
		if($res_location){
			//Query
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_location`='$res_location' ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Address Change Failed!";
			}else{
				echo "<br>"."Address Changed Successfully!";
			}	
		}
		if($res_pin){			
			//Query
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_pin`=$res_pin ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Pincode Change Failed!";
			}else{
				echo "<br>"."Pincode Changed Successfully!";
			}	
		}
		if($res_rating){
			//Query
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_rating`=$res_rating ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Rating Change Failed!";
			}else{
				echo "<br>"."Rating Changed Successfully!";
			}	
		}
		if($res_opening){
			//Query
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_opening`='$res_opening' ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Open Time Change Failed!";
			}else{
				echo "<br>"."Open Time Changed Successfully!";
			}
		}
		if($res_closing){
			//Query
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_closing`='$res_closing'' ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Close Time Change Failed!";
			}else{
				echo "<br>"."Close Time Changed Successfully!";
			}	
		}
        if($res_image){
            move_uploaded_file($res_image_temp,$res_folder);
            //Deleting the previous file
            $deleteimage = "SELECT res_image FROM `res_table` ";
            $deleteimage .= "where `res_id` = $id";
            $deleteresult = mysqli_query($connection,$deleteimage);
            $deleteimagerow = mysqli_fetch_assoc($deleteresult);
            unlink($deleteimagerow['res_image']);
            
            //Query to add new image
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_image` = '$res_folder' ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Restaurant Image Change Failed!";
			}else{
				echo "<br>"."Restaurant Image Changed Successfully!";
			}	
        }
        if($res_menu_image){
            move_uploaded_file($res_menu_image_temp,$res_menu_folder);
            //Deleting the previous file
            $deleteimage = "SELECT res_menu_image FROM `res_table` ";
            $deleteimage .= "where `res_id` = $id";
            $deleteresult = mysqli_query($connection,$deleteimage);
            $deleteimagerow = mysqli_fetch_assoc($deleteresult);
            unlink($deleteimagerow['res_menu_image']);
            
            //Query to add new image
			$query = "UPDATE `res_table` SET ";
			$query .= "`res_menu_image` = '$res_menu_folder' ";
			$query .= "WHERE `res_id`=$id";
			
			//Executing Query in Database
			$result = mysqli_query($connection,$query);

			//Checking Execution of Query
			if(!$result){
				echo "<br>"."Restaurant Image Change Failed!";
			}else{
				echo "<br>"."Restaurant Image Changed Successfully!";
			}	
        }
		
	}else{
		echo "No Data Selected";
	}
}

function deleteData(){
	//Global Variables
	global $connection;
	
	if(isset($_POST['delete-select'])){
		$id = $_POST['delete-select'];
		//Query
		$query = "DELETE FROM `res_table` ";
		$query .= "WHERE `res_id`=$id";

		//Executing Query in Database
		$result = mysqli_query($connection,$query);

		//Checking Execution of Query
		if(!$result){
			echo "<br>"."Query Failed!";
		}else{
			echo "<br>"."Query Successful!";
		}
	}else{
		echo "No Id Present";
	}	
}

?>