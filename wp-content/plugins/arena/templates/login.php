<div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6">

<p class="bg-danger"><b>
    <?php
        if($error)
        {
            echo ARENA_ERROR_LOGIN; 
        }
    ?>
</b></p>

<form class="form-horizontal" method="post" action="<?php $_SERVER['REQUEST_URI'] ?>">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
    <div class="col-sm-10">
      <input type="text" name="loginname" class="form-control" id="inputEmail3" placeholder="Логин">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="pass" placeholder="Password">
    </div>
  </div>
    <input type="hidden" name="login" value="1">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Войти</button>
    </div>
  </div>
</form>

</div>
</div>
