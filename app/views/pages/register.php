<?php
    require_once  APPROOT ."views/inc/header.php";?>
<div id="id01" class="modal">
  <form class="modal-content" action="register" method="POST">
    <div class="container">
      <h1 >Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <div class="m_input">
        <label for="email"><b>Email</b></label>
        <input class="<?= empty($data['email_err']) ? '':  'm_invalid'?>" type="text" placeholder="Enter Email" name="email" value="<?=$data['email']?>">
        <p class="<?= empty($data['email_err']) ? 'm_err_hid': 'm_err'?>"><?=$data['email_err']?></p>
      </div>

       <div class="m_input">
        <label for="username"><b>Username</b></label>
        <input class="<?= empty($data['username_err']) ? '':  'm_invalid'?>" type="text" placeholder="Enter username" name="username" value="<?=$data['username']?>">
        <p class="<?= empty($data['username_err']) ? 'm_err_hid': 'm_err'?>"><?=$data['username_err']?></p>
      </div>

      <div class="m_input">
        <label for="password"><b>Password</b></label>
        <input class="<?= empty($data['password_err']) ? '':  'm_invalid'?>" type="password" placeholder="Enter password" name="password" value="<?=$data['password']?>">
        <p class="<?= empty($data['password_err']) ? 'm_err_hid': 'm_err'?>"><?=$data['password_err']?></p>
      </div>

      <div class="m_input">
        <label for="rpassword"><b>Repeat password</b></label>
        <input class="<?= empty($data['rpassword_err']) ? '':  'm_invalid'?>" type="password" placeholder="Repeat password" name="rpassword" value="<?=$data['rpassword']?>">
        <p class="<?= empty($data['rpassword_err']) ? 'm_err_hid': 'm_err'?>"><?=$data['rpassword_err']?></p>
      </div>

      <div class="clearfix">
        <button type="submit" class="signupbtn">Sign Up</button>
        <a href="login"><button type="button" class="signupbtn">Login</button></a>
      </div>
    </div>
  </form>
</div>
<?php
    require_once  APPROOT ."views/inc/footer.php";?>