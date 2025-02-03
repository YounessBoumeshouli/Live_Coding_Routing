<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient <?=$result['id_user']?></title>
</head>
<body>
    <table>
        <th>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Delete</td>
         
        </th>
        <tr>
            <td><?=$result['id_user']?></td>
            <td><?=$result['username']?></td>
            <td><?=$result['email']?></td>
            <td><a href="index.php?/<?=$result['id_user']?>&action=delete&id=<?=$result['id_user']?>">Delete Patient</a></td>
            
        </tr>
        
    </table>
</body>
</html>