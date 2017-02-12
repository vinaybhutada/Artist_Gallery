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
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.4.2/jquery.mark.es6.min.js"></script>
  	
	<script>
				function markText(highlightText){
					//console.log(get);
					//var highlightText = $(".title_text").val();
					//console.log(highlightText+"hi");
					$(".highlight").mark(highlightText);
				}
				
	</script>
	</head>
<body>
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
		    <h2>Search Results</h2>
		    <hr>
			
			<div class="well">
				<form action="Part04_Search.php" method="get">
					<div class="form-group">
						<div class="radio">
							<label>
								<input type="radio" name="search_type" value="title" checked>
									Filter by Title:
							</label>
							<input type="text" name="search1" id="query" class="form-control title_text" placeholder=" ">
						</div>
						<div class="radio">
						  <label>
							<input type="radio" name="search_type" value="description">
							Filter by Description:
						  </label>
						  <input type="text" name="search2" id="query" class="form-control description_text" style="display:none;" placeholder=" ">
						</div>
						<div class="radio">
						  <label>
							<input type="radio" name="search_type" value="no_filter">
							No Filter (Show all art works)
						  </label>
						  
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Filter</button>
					</div>
				</form>
				
				<script>
					$("input[type=radio]").click(function(){
						if($(":radio[value=title]").is(":checked")){
							$(".title_text").css("display","block");
						}else{
							$(".title_text").css("display","none");
						}
						if($(":radio[value=description]").is(":checked")){
							$(".description_text").css("display","block");
						}else{
							$(".description_text").css("display","none");
						}
						
						
						
					});
				</script>
				
			</div>
	    </div>
	</div>

	<div class="container">
	    <div class="" style="overflow: auto;">
	    	<?php
			

			if(isset($_GET["search1"]) && ($_GET["search_type"] == "title")){
				$search_value = $_GET["search1"];
				$search_criteria = $_GET["search_type"];
			}elseif(isset($_GET["search2"]) && ($_GET["search_type"] == "description")){
				$search_value = $_GET["search2"];
				$search_criteria = $_GET["search_type"];
			}elseif(isset($_GET["search3"]) && ($_GET["search_type"] == "no_filter")){
				$search_value = $_GET["search3"];
				$search_criteria = $_GET["search_type"];
			}else{
				$search_value = " ";
				$search_criteria = " ";
			}

			
				//$id = $_GET["id"];
			    $server = "localhost";
			    $username = "root";
			    $password = "root";
			    $conn = new mysqli($server, $username, $password);

			    if ($conn->connect_error) {
			        die("Connection failed: " . $conn->connect_error);
			    }
			    if($search_criteria == "title"){
			    	$sql = "select artistid, artworkid, imagefilename, title, description from project3.artworks where title like '%".$search_value."%';";
				    $result = $conn->query($sql);
					
				    if ($result->num_rows > 0) {
		              while($row = $result->fetch_assoc()) {
						  
						  
		                  echo '<div class = "row">
		                  			<div class = "col-lg-2">
		                  				<img class="img-responsive" src="images/art/works/medium/'.$row["imagefilename"].'.jpg">
		                  			</div>
		                  			<div class = "col-lg-10" >
		                  				<span style="font-family: arial; font-size: 30px; font-style: normal; "><a href="Part03_SingleWork.php?artworkid='.$row["artworkid"].'&artistid='.$row["artistid"].'" class="highlight">'.$row["title"].'</a></span>
		                  				<p class="highlight">'.$row["description"].'</p>
		                  			</div>
		                  		</div>';
		                  echo '<hr>';
						  echo '<script> markText("'.$search_value.'"); </script>';
		              }
		          	}
			    }elseif($search_criteria == "description"){
			    	$sql = "select artistid, artworkid, imagefilename, title, description from project3.artworks where description like '%".$search_value."%';";
					
				    $result = $conn->query($sql);

				    if ($result->num_rows > 0) {
		  
		              while($row = $result->fetch_assoc()) {
						  
		                  echo '<div class = "row">
		                  			<div class = "col-lg-2">
		                  				<img class="img-responsive" src="images/art/works/medium/'.$row["imagefilename"].'.jpg">
		                  			</div>
		                  			<div class = "col-lg-10">
		                  				<span style="font-family: arial; font-size: 30px; font-style: normal; "><a class="highlight" href="Part03_SingleWork.php?artworkid='.$row["artworkid"].'&artistid='.$row["artistid"].'">'.$row["title"].'</a></span>
		                  				<p class="highlight">'.$row["description"].'</p>
		                  			</div>
		                  		</div>';
		                  echo '<hr>';
						  echo '<script> markText("'.$search_value.'"); </script>';
		              }
		          	}
			    }elseif($search_criteria == "no_filter"){
			    	$sql = "select artistid, artworkid, imagefilename, title, description from project3.artworks;";

				    $result = $conn->query($sql);

				    if ($result->num_rows > 0) {
		              while($row = $result->fetch_assoc()) {
						   echo '<script> markText(); </script>';
		                  echo '<div class = "row">
		                  			<div class = "col-lg-2">
		                  				<img class="img-responsive" src="images/art/works/medium/'.$row["imagefilename"].'.jpg">
		                  			</div>
		                  			<div class = "col-lg-10">
		                  				<span style="font-family: arial; font-size: 30px; font-style: normal; "><a href="Part03_SingleWork.php?artworkid='.$row["artworkid"].'&artistid='.$row["artistid"].'">'.$row["title"].'</a></span>
		                  				<p>'.$row["description"].'</p>
		                  			</div>
		                  		</div>';
		                  echo '<hr>';
		              }
		          	}
			    }

			    $conn->close();
			
	    	?>	
			
	    </div>
	</div>
</body>
</html>