<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/normalsize/profile.css">
    <title>Document</title>
</head>
<body>
<!-- index.php?action=edit-postare&post_id=<?php echo $result[$k]["post_id"]; ?> -->
    <form action="" method="post">
    <label>username</label>
    <input type="text"name="username" value="<?php echo $result[0]["username"]; ?>">
    <label>rank</label>
    <input type="text"name="rank" value="<?php echo $result[0]["rank"]; ?>">
    <label>categorie</label>
    <input type="text"name="categorie" value="<?php echo $result[0]["categorie"]; ?>">
    <label>text</label>
    <input type="text"name="text" value="<?php echo $result[0]["text"]; ?>">
    <?php echo $result[0]["post_id"]; ?>
    <input type="submit" name="edit" value="save">
    </form>
</body>
</html>