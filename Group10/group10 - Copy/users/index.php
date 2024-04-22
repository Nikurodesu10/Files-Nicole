<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html>
<head>


    <title>Coastal Care</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
<style>
        /* Add custom CSS for homepage */
        body {
            font-family: 'Assistant', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        #header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        #wrapper {
            margin: 20px auto;
            max-width: 800px;
            padding: 0 20px;
        }
        #menu {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        #menu a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        #menu a:hover {
            color: #ffcc00;
        }
        #content {
            background-color: #fff;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .image-container img {
            width: 100%;
            max-width: 600px;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .image-container img:hover {
            transform: scale(1.05);
        }
        .plus-button {
            display: block;
            width: 50px;
            height: 50px;
            background-color: #ffcc00;
            color: #333;
            font-size: 24px;
            text-align: center;
            line-height: 50px;
            border-radius: 50%;
            text-decoration: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .plus-button:hover {
            background-color: #fcbf00;
        }
    </style>
</head>
<body>

    <div id="header">
      <h2>Coastal Care</h2>
    </div>
<div id="wrapper">
  <div id="menu">
      <a href="index.php">Home</a> | 
      <a href="event/index.php">Event</a> | 
      <a href="charts/index.php">Donation</a> |
      <a href="View/indexE.php">View</a> |
      <a href="index.php?page=settings">User Settings</a> | 
      <a href="logout.php" class="move-right">Log Out</a> |
      <span class="move-right"><?php echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id);?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span> 
  </div>
  <div id="content">
    <?php
      switch($page){
                case 'settings':
                    require_once 'settings-module/index.php';
                break; 
                case 'module_two':
                    require_once 'module-folder';
                break; 
                case 'module_xxx':
                    require_once 'module-folder';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>
</div>


</body>
</html>