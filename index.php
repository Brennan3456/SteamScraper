<?php
session_start();
//connect to database
$db = mysqli_connect("localhost","root","pass","Steam");
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- other -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	

	<form method="post" action="index.php">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header">
						<h1>Steam Reviews</h1>

						<input type="text" name="search" placeholder="Search..">
						<button name="Get_btn" type="submit" value="HTML">Get Data</button>
						<button name="Run_btn" type="submit" value="HTML">Run Data</button>
						<button name="PriceAsc_btn" type="submit" value="HTML">Cheapest</button>
						<button name="PriceDesc_btn" type="submit" value="HTML">Most Expensive</button>
						
						
						
						
					</div>
				</div>
			</div>
			
		
		
			
			<?php 
	if(isset($_POST['Run_btn']))
	{
				$xml=simplexml_load_file("games.xml") or die("Error: Cannot create object");
				foreach($xml->children() as $games) {  ?>
			
			<div class="col-sm-4">
			<div class="row">
				
				<div class="content_container">
					<div class="title">
						<?php echo $games->GameName; ?>
					</div>
					<div class = "price">
					€<?php echo $games->GamePrice; ?>
					</div>
					<div class = "date">
						<?php echo $games->GameDate; ?>
					</div>
						<!-- Above Image content -->
					
					<div class = "image">		
						<a href="<?php echo $games->GameLink; ?>"><img class="img-responsive" src="<?php echo $games->GameImgUrl;?>" alt="picture"></a>
					</div>
						<!-- Below Image content -->
				</div>
			</div>
		</div>
				
	<?php }} ?>
			
			
		
			
<!-- 			Stream List -->
		
			
	<?php 
	if(isset($_POST['Get_btn']))
	{
	$sqlGet = "SELECT * FROM GameInfo";
	$sqldata = mysqli_query($db, $sqlGet) or die('you done fucked');
	while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){  ?>
			
			<div class="col-sm-4 steam_stream">
			<div class="row">
				
				<div class="content_container">
					<div class="title">
						<h6><?php echo $row[GameName] ?><h6>
					</div>
					<div class = "price">
						<p>€ <?php echo $row[GamePrice]?></p>
					</div>
						<!-- Above Image content -->
							<a href="<?php echo $row[ImgLink] ?>"><img class="img-responsive" src="<?php echo $row[ImgUrl] ?>" alt="picture"></a>
						<!-- Below Image content -->
					<div class="genre">
						<h6><?php echo $row[GameGenre] ?></h6>	
					</div>
					<div class="masterdiv">
						<div class="description">
							<p><?php echo $row[GameDesc] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
				
	<?php }} ?>
				
		<?php 
	if(isset($_POST['PriceAsc_btn']))
	{

	$sqlGet = "SELECT * FROM GameInfo ORDER BY GamePrice ASC";
	$sqldata = mysqli_query($db, $sqlGet) or die('you done fucked');
	while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){  ?>
			
			<div class="col-sm-4 steam_stream">
			<div class="row">
				
				<div class="content_container">
					<div class="title">
						<h6><?php echo $row[GameName] ?><h6>
					</div>
					<div class = "price">
						<p>€ <?php echo $row[GamePrice]?></p>
					</div>
						<!-- Above Image content -->
							<a href="<?php echo $row[ImgLink] ?>"><img class="img-responsive" src="<?php echo $row[ImgUrl] ?>" alt="picture"></a>
						<!-- Below Image content -->
					<div class="genre">
						<h6><?php echo $row[GameGenre] ?></h6>	
					</div>
					<div class="masterdiv">
						<div class="description">
							<p><?php echo $row[GameDesc] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
				
	<?php }} ?>
				
	<?php 
	if(isset($_POST['PriceDesc_btn']))
	{

	$sqlGet = "SELECT * FROM GameInfo ORDER BY GamePrice DESC";
	$sqldata = mysqli_query($db, $sqlGet) or die('you done fucked');
	while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){  ?>
			
			<div class="col-sm-4 steam_stream">
			<div class="row">
				
				<div class="content_container">
					<div class="title">
						<h6><?php echo $row[GameName] ?><h6>
					</div>
					<div class = "price">
						<p>€ <?php echo $row[GamePrice]?></p>
					</div>
						<!-- Above Image content -->
							<a href="<?php echo $row[ImgLink] ?>"><img class="img-responsive" src="<?php echo $row[ImgUrl] ?>" alt="picture"></a>
						<!-- Below Image content -->
					<div class="genre">
						<h6><?php echo $row[GameGenre] ?></h6>	
					</div>
					<div class="masterdiv">
						<div class="description">
							<p><?php echo $row[GameDesc] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
				
	<?php }} ?>
<!-- 			end stream list -->
			
			</div>
	</form>
	</body>
</html>