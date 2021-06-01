<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postari</title>
</head>
<body>
    <h1>Postari</h1>
    
    <form action="index.php?action=add-postare" method="post">
    <label>Username</label>
    <input type="text" name="username" placeholder="user..">

    <label>Username</label>
    <input type="text" name="rank" placeholder="rank..">

    <label>Text</label>
    <input type="text" placeholder="Text..." name="text">
    
    <label>categorie</label>
    <input type="text" name="categorie" placeholder="categ..">

    <input type="submit" name="add" value="AddPostare">
    </form>


    <!-- postare afisare -->
    <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>UserName</strong></th>
                    <th><strong>Rank</strong></th>
                    <th><strong>text</strong></th>
                    <th><strong>categorie</strong></th>
                    <th><strong>Action</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
          <tr>
                    <td><?php echo $result[$k]["username"]; ?></td>
                    <td><?php echo $result[$k]["rank"]; ?></td>
                    <td><?php echo $result[$k]["text"]; ?></td>
                    <td><?php echo $result[$k]["categorie"]; ?></td>
                    <td><a class="btnEditAction"
                        href="index.php?action=edit-postaret&post_id=<?php echo $result[$k]["post_id"]; ?>">
                        EDIT
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=delete-postare&post_id=<?php echo $result[$k]["post_id"]; ?>">
                        DELETE
                        </a>
                    </td>
                </tr>
                    <?php
                        }
                    }
                    ?>
                
            
            
            <tbody>
        
        </table>
</body>
</html>