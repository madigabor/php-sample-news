<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sample PHP News App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>
</head>
<body>
<div class="container">
	<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand" href="/admin">
        Administrator
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
    

    if (isset($_POST['title'])) {
        $sql = "INSERT INTO news (title,content) VALUES ('".$_POST[title]."','".$_POST[content]."')";
        $result = $connection->query($sql);
        echo mysqli_error($connection);
        echo "<div class=\"alert alert-success\" role=\"alert\">
            Saved successfully.
        </div>";
        echo("<script>location.href='index.php'</script>");
    }


    
    echo "<div class=\"container\">
    <div class=\"mt-3\">
    <h1>Edit</h1>
    </div>
    <form method=\"post\" action=\"add.php\">
        <label for=\"title\">Title</label>
        <input type=\"text\"  class=\"form-control\" name=\"title\" ><br/>
        <label for=\"contant\">Content</label>
        <textarea  id=\"mytextarea\" name=\"content\" class=\"form-control\" rows=\"16\"></textarea><br/>
        <input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Save\"><br/><br/>
    </form>
    </div>";
 
		

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
