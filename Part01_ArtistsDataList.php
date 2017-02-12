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
	<!-- This is the section from where the Data List starts -->
    <div class="container">
	    <section class=""><h2>Artist Data List (Part 1)</h2><hr></section>
	    <div class="">
	      <?php
	          $server = "localhost";
	          $username = "root";
	          $password = "root";
	          $conn = new mysqli($server, $username, $password);

	          if ($conn->connect_error) {
	              die("Connection failed: " . $conn->connect_error);
	          }
	          $sql = "select distinct artistid, firstname, lastname, yearofbirth, yearofdeath from project3.artists order by lastname asc;";
	          $result = $conn->query($sql);

	          if ($result->num_rows > 0) {
	              while($row = $result->fetch_assoc()) {
	                  echo "<a href='Part02_SingleArtist.php?id=" . $row["artistid"] . "'>" .$row["firstname"]. " " . $row["lastname"]. " (" . $row["yearofbirth"] . " - " . $row["yearofdeath"] . ")</a><br>";
	              }
	          } else {
	              echo "0 results";
	          }
	          $conn->close();
	      ?> 
	    </div>
	</div> <!-- Data list ends here -->
</body>
</html>