 
<div class="row">
    <div class="col-md-8">
        <p class="bg-danger"><b>
    <?php 
if(1 == $error)
{
    echo ARENA_ERROR_PASS; 
}
elseif(2 == $error)
{
    echo ARENA_ERROR_EMAIL;
}
elseif(3 == $error)
{
    echo ARENA_ERROR_NO_ONCE_USER;
}
elseif(4 == $error)
{
    echo ARENA_ERROR_NO_ONCE_EMAIL;
}
elseif(5 == $error)
{
    echo ARENA_ERROR_MONEY;
}

	#echo "<b>error code $error</b>" ;
?>
</b></p>

<p class="bg-success">
    <?php
        if($success)
        {
            echo ARENA_SUCSSES_REGISTRATION; 
        }
    ?>

</p>
    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" >
	
	<div class="form-group">
	    <label for="nick">Ник</label>
	    <input type="text" class="form-control" name="nick" id="nick" placeholder="Ник" value="<?php echo $nick; ?>">
	</div>

	<div class="form-group">
	    <label for="Email1">Email address</label>
	    <input type="email" class="form-control" name="email" id="Email1" placeholder="Email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
	    <label for="money1">Номер кошелька U  Perfect Money(только числа)</label>
	    <input type="number" class="form-control" name="money" id="money1" placeholder="012345678" min="0"  value="<?php echo $money; ?>">
	</div>
	<div class="form-group">
	    <label for="Password1">Пароль</label>
	    <input type="password" class="form-control" id="Password1" name="pass1" placeholder="Пароль">
	</div>

	<div class="form-group">
	    <label for="Password2">Подтвердите пароль</label>
	    <input type="password" class="form-control" id="Password2" name="pass2" placeholder="Подтвердите пароль">
	</div>
	<button type="submit" class="btn btn-default">Регистрация</button>
	
	<input type="hidden" name="registration" value="1">
    
    </form>
    </div>
</div>
