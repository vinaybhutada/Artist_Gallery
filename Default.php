<!DOCTYPE html>

<html>
    <head>
        <title>WDM Project 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body class="">
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
						<a href="Part04_Search.php" class="btn btn-primary">Search</a>
                        
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="main-content">
            <div class="jumbotron">
                <div class="container">
                    <h1>Welcome to Assignment#1</h1>
                    <p>This is the first assignment for Vinay Bhutada for COMP 3512</p>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-2">
                        <h3><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>About Us</h3>
                        <p>What this is all about and other stuff</p>
                        <a  href="" role="button" class="btn btn-default"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a>
                    </div>
                    <div class="col-md-2">
                        <h3><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>Artist List</h3>
                        <p>Displays a list of artist names as links</p>
                        <a  href="Part01_ArtistsDataList.php" role="button" class="btn btn-default" onclick="window.location.href='Part01_ArtistsDataList.php'"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a>
                    </div>
                    <div class="col-md-2">
                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Single Artist</h3>
                        <p>Displays information for a single artist</p>
                        <a  href="Part02_SingleArtist.php" role="button" class="btn btn-default"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a>
                    </div>
                    <div class="col-md-2">
                        <h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Single Work</h3>
                        <p>Displays information for a single work</p>
                        <a  href="Part03_SingleWork.php"  role="button" class="btn btn-default"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a>
                    </div>
                    <div class="col-md-2">
                        <h3><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</h3>
                        <p>Perform search on Artwork tables</p>
                        <a href="Part04_Search.php" role="button" class="btn btn-default"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
