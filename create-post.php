
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
        <?php
        $sqlComments ="SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
        $statement = $connection->prepare($sqlComments);
        $statement->execute();
        $statement->setFetchMode (PDO::FETCH_ASSOC);
        $singlePost= $statement->fetchAll();
        ?>
        <main role="main" class="container">

        <div class="row">
            <div class="col-sm-8 blog-main">
                <h2>
                    <?php echo $singlePost['title']?>
                </h2>
                <p><?php echo $singlePost['created_at']?> by <?php echo $singlePost['author']?></p>
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