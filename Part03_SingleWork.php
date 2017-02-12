<!DOCTYPE html>
<html>
<head>
	<title>Project 3</title>
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
	    <div class="col-lg-12" >
		    	
		      	
			      	<?php
					if(isset($_GET["artistid"]) && isset($_GET["artworkid"])){
				          $artistid = $_GET["artistid"];
				          $artworkid = $_GET["artworkid"];
				          $server = "localhost";
				          $username = "root";
				          $password = "root";
				          $conn = new mysqli($server, $username, $password);
				          if ($conn->connect_error) {
				              die("Connection failed: " . $conn->connect_error);
				          }
				          $sql = 'select f.subjectname, d.genrename, a.firstname,a.lastname,b.title,b.yearofwork, b.imagefilename from project3.artists a inner join project3.artworks b on a.artistid = b.artistid inner join project3.artworkgenres c on b.artworkid = c.artworkid  inner join project3.genres d on d.genreid = c.genreid inner join project3.artworksubjects e on e.artworkid=b.artworkid inner join project3.subjects f on e.subjectid = f.subjectid where a.artistid =' .$artistid. ' and b.artworkid = '.$artworkid.';';
				   
				          $result = $conn->query($sql);

				          $row = $result->fetch_assoc();
				          echo '<h2>'. $row["title"] .'</h2>';
				          echo '<p>by <a href="Part02_SingleArtist.php?id='.$artistid.'">' . $row["firstname"] . ' '  . $row["lastname"] . '</a></p>' ;
				          echo '<div style="float:left" class="col-lg-4"><a href="" class="thumbnail"><img class="img-responsive" data-toggle="modal" data-target=".pop-up-img" src= "images/art/works/medium/'. $row["imagefilename"]. '.jpg"></a></div>';
				    				
						echo '<div class="modal pop-up-img" role="dialog" aria-labelledby="imgModal" aria-hidden="true" >
							<div class="modal-dialog" style="background-color:white;">
								<div class="modal-header">
									<h4>'. $row["title"] .'(' .$row["yearofwork"]. ') by ' .$row["firstname"] . ' '  . $row["lastname"] .'</h4>
								</div>
								<div class="modal-body">
									<img class="img-responsive" style="float:centre;" data-toggle="modal" data-target=".pop-up-img" src= "images/art/works/medium/'. $row["imagefilename"]. '.jpg">
								</div>
								<div class="modal-footer"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button></div>
							</div>
						</div>';
					}else{
						echo "<h1>Error: No Artst ID or Artwork ID passed.</h1>";
					}
						
					?>
				
				
				<div class="col-md-6 col-lg-6">
				    
				    	<?php
				          if(isset($_GET["artistid"]) && isset($_GET["artworkid"])){
				          $sql = 'select f.subjectname, d.genrename, a.firstname,a.lastname,b.title, b.imagefilename,b.yearofwork, b.description from project3.artists a inner join project3.artworks b on a.artistid = b.artistid inner join project3.artworkgenres c on b.artworkid = c.artworkid  inner join project3.genres d on d.genreid = c.genreid inner join project3.artworksubjects e on e.artworkid=b.artworkid inner join project3.subjects f on e.subjectid = f.subjectid where a.artistid =' .$artistid. ' and b.artworkid = '.$artworkid.';';
				   
				          $result = $conn->query($sql);

				          $row = $result->fetch_assoc();
				          echo $row["description"];
						  }
				    	?>
				    </br></br>
					<div class="btn-group btn-group-justified" role="group" >
						<div class="btn-group" role="group">
							<button type="button" style="color:blue;" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Add to Wish List</button>
						</div>
						
						<div class="btn-group" role="group">
							<button type="button" style="color:blue;" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Shopping Cart</button>
						</div>
					</div>
					</br>
				    <div style="">
				    	<?php
						if(isset($_GET["artistid"]) && isset($_GET["artworkid"])){
				           $sql = 'select f.subjectname, d.genrename, a.firstname,a.lastname,b.title, b.imagefilename, b.yearofwork, b.medium, b.height, b.width, b.originalhome from project3.artists a inner join project3.artworks b on a.artistid = b.artistid inner join project3.artworkgenres c on b.artworkid = c.artworkid  inner join project3.genres d on d.genreid = c.genreid inner join project3.artworksubjects e on e.artworkid=b.artworkid inner join project3.subjects f on e.subjectid = f.subjectid where a.artistid =' .$artistid. ' and b.artworkid = '.$artworkid.';';
				   	       $result = $conn->query($sql);
				           $row = $result->fetch_assoc();
							
				           echo '<div class="panel panel-default">
									<!-- Default panel contents -->
								    <div class="panel-heading">Art Work Details</div>
								        <!-- List group -->
									 	 <ul class="list-group">
										    <li class="list-group-item"><span style="font-weight:bold;">Date:</span><span style="margin-left:80px;">' . $row["yearofwork"].'</span></li>
										    <li class="list-group-item"><span style="font-weight:bold;">Medium:</span><span style="margin-left:60px;">' .$row["medium"]. '</span></li>
										    <li class="list-group-item"><span style="font-weight:bold;">Dimensions:</span><span style="margin-left:33px;">'.$row["height"]. ' x ' . $row["width"] . '</span></li>
										    <li class="list-group-item"><span style="font-weight:bold;">Home:</span><span style="margin-left:73px;">' .$row["originalhome"]. '</span></li>
										    <li class="list-group-item"><span style="font-weight:bold;">Genres:</span><span style="margin-left:63px;"><a>' .$row["genrename"]. '</a></span></li>
										    <li class="list-group-item"><span style="font-weight:bold;">Home:</span><span style="margin-left:80px;"><a>' .$row["subjectname"]. '</a></span></li>
										 </ul>
								</div>';
						}
				    	?> 
			    	</div>

			    </div>

			    <div class="col-lg-2">
				    <div>
				    	<?php
						if(isset($_GET["artistid"]) && isset($_GET["artworkid"])){
				         
				           $sql = 'select datecompleted from project3.orders where orderid in (select orderid from project3.orderdetails where artworkid = '.$artworkid.');';
				   	       $result = $conn->query($sql);
						   echo '<div class="panel panel-info">
									<!-- Default panel contents -->
								    <div class="panel-heading">Sales</div>
								        <!-- List group -->
									 	 <ul class="list-group">';
										 
	  
							while($row = $result->fetch_assoc()) {
							echo		 '
										    <li class="list-group-item"><a>'.$row["datecompleted"].'</a></li>
										 ';
								}
							
							echo '</ul>
								</div>';

						$conn->close();
						}
				    	?> 
			    	</div>
			    </div>
			
	    </div>
	</div>
</body>
</html>