<form action="">
<span>Name:</span>
<br>
<input type="text">
<br>
<span>Comment:</span>
<br>
<textarea name="" id="" cols="30" rows="10"></textarea>
<br>
<button id="commentSubmit">Submit</button>
</form>

<?php
$sqlComments="SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
$statement = $connection->prepare($sqlComments);
$statement->execute();
$statement->setFetchMode (PDO::FETCH_ASSOC);
$comments= $statement->fetchAll();
?>

<ul><?php foreach($comments as $comment) { ?>
    <li>
    <p>Name: <?php echo $comment['author']?></p>
    <p>Comment: <?php echo $comment['text']?></p>
    </li>
    <?php
    }
    ?>
</ul>