<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scal=1.0">
    <link rel="stylesheet" href='<?=URLROOT . 'public/css/style.css'?>'>
    <title><?=SITENAME?></title>
</head>
<body>
<div class="topnav">
  <a class="active" href="<?=URLROOT?>">Home</a>
  <a href="#news">Edit</a>
  <a href="#contact">Contact</a>
  <div class="m_right">
    <?php if (!islogged()) {?>
        <a href="<?=URLROOT?>user/register">register</a>
        <a href="<?=URLROOT?>user/login">LogIn</a>
    <?php }else { ?>
        <a href="<?=URLROOT?>user/edit">Profile</a>
        <a href="<?=URLROOT?>user/logout">LogOut</a>
    <?php } ?>
  </div>
</div>
