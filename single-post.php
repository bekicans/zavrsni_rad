<?php
$servername="127.0.0.1";
$username="root";
$password="vivify";
$dbname="blog";

try{
    $connection = new PDO ("mysql:host = $servername; dbname=$dbname", $username, $password);
    $connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOEXCEPTION $e)
{
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php include ('header.php')?>
<main>
        <?php
        
        $sql ="SELECT id, title, created_at, body, author FROM posts WHERE id = {$_GET['post_id']}";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode (PDO::FETCH_ASSOC);
        $singlePost= $statement->fetch();
        console.log($singlePost['title']);
        
      
        ?>
        <main role="main" class="container">

        <div class="row">
            <div class="col-sm-8 blog-main">
                <h2>
                    <?php echo $singlePost['title']?>
                </h2>
                <p><?php echo $singlePost['created_at']?> by <?php echo $singlePost['author']?></p>
                <p><?php echo $singlePost['body']?></p>
                <?php include('comments.php');?>
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
             
            </div>
            <?php include('sidebar.php');?> 
            
            </div>
        </main>
    
    <?php include('footer.php');?>
    
</body>
</html>
    
</body>
</html>