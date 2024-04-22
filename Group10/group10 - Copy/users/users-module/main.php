<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Table</title>
    <style>
        #data-list {
            width: 100%;
            border-collapse: collapse;
        }

        #data-list th, #data-list td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #data-list th {
            background-color: #f2f2f2;
            color: #333;
        }

        #data-list tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #data-list tr:hover {
            background-color: #ddd;
        }

        #data-list a {
            color: blue;
            text-decoration: none;
        }

        #data-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div id="subcontent">
    <table id="data-list">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Nickname</th> <!-- added nickname column -->
            <th>Access Level</th>
            <th>Email</th>
            <th>Action</th> <!-- added action column -->
        </tr>
        <?php
        $count = 1;
        if($user->list_users() != false){
            foreach($user->list_users() as $value){
                extract($value);
        ?>
       <tr>
            <td><?php echo $count;?></td>
            <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>"><?php echo $user_lastname.', '.$user_firstname;?></a></td>
            <td><?php echo $user_nickname; ?></td>
            <td><?php echo $user_access;?></td>
            <td><?php echo $user_email;?></td>
            <td><a href="processes/process.user.php?action=delete&id=<?php echo $user_id;?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</a></td>
        </tr>
        <?php
            $count++;
            }
        } else {
            echo "<tr><td colspan='6'>No Record Found.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
