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

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
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
        $sql= "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC LIMIT 3";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode (PDO::FETCH_ASSOC);
        $posts= $statement->fetchAll();
        ?>
        <main role="main" class="container">

        <div class="row">
            <div class="col-sm-8 blog-main">
                <?php foreach($posts as $post) { ?>
                    <div class="blog-posts">
                        <h1>
                            <a href="single-post.php?post_id=<?php echo ($post['id'])?>"><?php echo($post['title'])?></a>
                        </h1>
                        <p></p><?php echo ($post['created_at'])?>by<?php echo ($post['author'])?>
                        <p><?php echo ($post['body'])?></p>
                    </div>
                <?php
                }
                ?>
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