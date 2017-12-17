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
			<div id="logo">
		 		<img id="Logo" src="img/steamScrapper.png" alt="missing logo"> 
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header">
					</div>
				</div>
			</div>

	<?php 

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
	<?php } ?>
<!-- 			end Stream List -->
	</div>
	</form>
	</body>
</html>