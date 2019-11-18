<?php
    require_once  APPROOT ."views/inc/header.php";?>
<div id="id01" class="modal">
  <form class="modal-content" action="login" method="POST">
    <div class="container">
      <h1 >Login</h1>
      <hr>
      <div class="m_input">
        <label for="email"><b>Email</b></label>
        <input class="<?= empty($data['email_err']) ? '':  'm_invalid'?>" type="text" placeholder="Enter Email" name="email" value="<?=$data['email']?>">
        <p class="<?= empty($data['email_err']) ? 'm_err_hid': 'm_err'?>"><?=$data['email_err']?></p>
      </div>

      <div class="m_input">
        <label for="password"><b>Password</b></label>
        <input class="<?= empty($data['password_err']) ? '':  'm_invalid'?>" type="password" placeholder="Enter password" name="password" value="<?=$data['password']?>">
        <p class="<?= empty($data['password_err']) ? 'm_err_hid': 'm_err'?>"><?=$data['password_err']?></p>
      </div>

      <div class="clearfix">
        <button type="submit" class="signupbtn">Login</button>
        <a href="register"><button type="button" class="signupbtn">Sign Up</button></a>

      </div>
      <a style="color: blue; padding: 5%;" href="#" >Forget password</a>
    </div>
  </form>
</div>
<?php
    require_once  APPROOT ."views/inc/footer.php";?>