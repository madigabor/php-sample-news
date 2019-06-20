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
	  <a class="navbar-brand" href="#">
		Latest News
	  </a>
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
	

    if (isset($_POST['id'])) {
        $sql = "UPDATE news SET title='".$_POST[title]."', content='".$_POST[content]."' WHERE id=".$_POST[id];
        $result = $connection->query($sql);
        echo "<div class=\"alert alert-success\" role=\"alert\">
            Saved successfully.
      </div>";
    }

	$sql = "SELECT id, title, content FROM news WHERE id=".$_GET[id];
	$result = $connection->query($sql);


	if ($result->num_rows > 0) {
		// output data of each row to show news
		while($row = $result->fetch_assoc()) {
			
            echo "<div class=\"container\">
            <div class=\"mt-3\">
            <h1>Edit</h1>
            </div>
            <form method=\"post\" action=\"edit.php?id=".$_GET[id]."\">
                <input type=\"hidden\" name=\"id\" value=\"". $row["id"]. "\"><br/>
                <input type=\"text\"  class=\"form-control\" name=\"title\" value=\"". $row["title"]. "\"><br/>
                <textarea name=\"content\" class=\"form-control\" >". $row["content"]. "</textarea><br/>
                <input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Save\"><br/><br/>
            </form>
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
