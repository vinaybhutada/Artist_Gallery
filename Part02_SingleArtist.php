<!DOCTYPE html>
<html>
<head>
	<title>Project 3</title>
	<!-- <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

	<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>
	<!-- This is the beginning of the navigation header bar and it will remain constant for all the pages -->
	        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Default.php">Assign 1</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="Default.php">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="Part01_ArtistsDataList.php">Artists Data List(Part 1)</a></li>
                                <li><a href="Part02_SingleArtist.php">Single Artist (Part 2)</a></li>
                                <li><a href="Part03_SingleWork.php">Single Work (Part 3)</a></li>
                                <li><a href="Part04_Search.php">Search (Part 4)</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <p class="navbar-text">Vinay Bhutada</p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search Paintings">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    
    <div class="container">
	    <div class="" style="overflow: auto;">
		      	<?php
					if(isset($_GET["id"])){
			          $id = $_GET["id"];
			          $server = "localhost";
			          $username = "root";
			          $password = "root";
			          $conn = new mysqli($server, $username, $password);
			          if ($conn->connect_error) {
			              die("Connection failed: " . $conn->connect_error);
			          }

			          $sql = "select distinct artistid, firstname, lastname, yearofbirth, yearofdeath, nationality, details, artistlink from project3.artists where artistid = " . $id . ";";
			          $result = $conn->query($sql);

			          $row = $result->fetch_assoc();
			          echo '<div class="col-lg-12"><h2 style="font-weight:bold;">' . $row["firstname"] . ' '  . $row["lastname"] . '</h2></div>' ;

			          echo '<div class="" style="float:left"><a href="" class="thumbnail"><img src= "images/art/artists/medium/'. $row["artistid"]. '.jpg"></a></div>';
					}else{
						
						echo "<h1>Error: No ID selected.</h1>";
					}
			    ?>

			    <div style="">
			    	<?php
			         if(isset($_GET["id"])){
			          $sql = "select distinct artistid, firstname, lastname, yearofbirth, yearofdeath, nationality, details, artistlink from project3.artists where artistid = " . $id . ";";
			          $result = $conn->query($sql);

			          $row = $result->fetch_assoc();
			          echo '<div class="col-lg-5" style="float:left"><p>' .$row["details"] . '</p>';
			          echo '<button class="btn btn-default" style="color:blue;"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>Add to Favorites List</button>';
			          echo '<div class="panel panel-default" style="margin-top:20px;">
										  <!-- Default panel contents -->
										  <div class="panel-heading">Artist Details</div>
										     <!-- List group -->
											  <ul class="list-group">
											    <li class="list-group-item"><span style="font-weight:bold;">Date:</span><span style="margin-left:80px;">' . $row["yearofbirth"] . '-' . $row["yearofdeath"] . '</span></li>
											    <li class="list-group-item"><span style="font-weight:bold;">Nationality:</span><span style="margin-left:40px;">' .$row["nationality"]. '</span></li>
											    <li class="list-group-item"><span style="font-weight:bold;">More Info:</span><span style="margin-left:50px;"><a href="'.$row["artistlink"].'">' . $row["artistlink"] . '</a></span></li>
											  </ul>
									</div></div>';
					}
			    	?>
			    </div>
	    </div>
	</div>

	<div class="container">
		<div class="col-lg-12">
			<div class="row">
				<?php
				if(isset($_GET["id"])){
			          $sql = "select distinct a.artistid, b.firstname, b.lastname, artworkid, imagefilename, title from project3.artworks a inner join project3.artists b on a.artistid= b.artistid where a.artistid = " . $id . ";";
			          $result = $conn->query($sql);
			          echo '<div class="col-lg-12">';
					  $count = 0;
					  if ($result->num_rows > 0) {
			            while($row = $result->fetch_assoc()) {
							
			          		if($count == 0){
								       
								echo '<h3>Art by '. $row["firstname"]. ' ' . $row["lastname"]. ' </h3>';
								echo '<div class="row">';
								echo 
								'<div class="col-sm-6 col-md-3 col-lg-3 thumbnail" style="text-align : center; width:24%; margin-right:10px;">
									
									    <img class="thumbnail" src="images/art/works/square-medium/'.$row["imagefilename"] .'.jpg" alt=" '.$row["title"].'" id = "thumbnails">
									
									    <div class="caption" style="margin-top:-20px;">
									        <h5><a href="Part03_SingleWork.php?artworkid='.$row["artworkid"].'&artistid='.$row["artistid"].'">' .$row["title"]. '</h3>
									        <p><button href="#" class="btn btn-primary" role="button" style="margin-right:5px"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> View</button><button class="btn btn-success" role="button" style="margin-right:5px"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Wish</button><button class="btn btn-info" role="button" style="margin-right:5px"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart</button></p>
									    
									</div>
								  </div>';
							}else{
								echo 
								'<div class="col-sm-6 col-md-3 col-lg-3 thumbnail" style="text-align : center; width:24%; margin-right:10px;">
									
									    <img class="thumbnail" src="images/art/works/square-medium/'.$row["imagefilename"] .'.jpg" alt=" '.$row["title"].'" id = "thumbnails">
									
									    <div class="caption" style="margin-top:-20px;">
									        <h5><a href="Part03_SingleWork.php?artworkid='.$row["artworkid"].'&artistid='.$row["artistid"].'">' .$row["title"]. '</h3>
									        <p><button href="#" class="btn btn-primary" role="button" style="margin-right:5px"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> View</button><button class="btn btn-success" role="button" style="margin-right:5px"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Wish</button><button class="btn btn-info" role="button" style="margin-right:5px"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart</button></p>
									    
									</div>
								  </div>';
							}
							
							$count++;
			          	}
					  } else {
			               echo "0 results";			         
			          }
			          $conn->close();
					  }
				?>
		</div>
	</div>
</body>
</html>