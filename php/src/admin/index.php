<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sample PHP News App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand" href="/admin">
		Administrator
	  </a>

	  <a class="btn btn-light btn-sm" href="add.php">&plus; Add news</a>

	</nav>
<?php
	// Config parameters
	require_once("../config.php");

	// Create connection
	$connection = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	} 
	
	if (!$connection->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $connection->error);
		exit();
	}
	
	if (isset($_GET['id']) && isset($_GET['delete'])) {
        $sql = "DELETE FROM news  WHERE id=".$_GET[id];
        $result = $connection->query($sql);
        echo "<div class=\"alert alert-success\" role=\"alert\">
            Deleted successfully.
      </div>";
    }

	$sql = "SELECT id, title, content FROM news";
	$result = $connection->query($sql);


	if ($result->num_rows > 0) {
		// output data of each row to show news
		while($row = $result->fetch_assoc()) {
			
			echo "<div class=\"container\">
			  <div class=\"mt-3\">
				<h1>". $row["title"]. "</h1>
			  </div>
			  <p class=\"lead\">" . $row["content"] . "</p>
			  <a class=\"btn btn-primary btn-sm\" href=\"edit.php?id=". $row["id"] ."\">&#9998; Edit</a>
			  <a onclick=\"return confirm('Are you sure?')\" class=\"btn btn-primary btn-sm\" href=\"index.php?delete=true&id=". $row["id"] ."\">&#128465; Delete</a>
			  <hr/>
			</div>";
 
		}
	} else {
		echo "0 news are available";
	}

	$connection->close();
?> 
	<footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright &copy; <?php echo date('Y');?></span>
      </div>
    </footer>
</div>	
</body>
</html>
