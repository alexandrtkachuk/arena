<?php 
/*echo '<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div>
    <label for="username">Username <strong>*</strong></label>
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>
      
    <div>
    <label for="password">Password <strong>*</strong></label>
    <input type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
      
    <div>
    <label for="email">Email <strong>*</strong></label>
    <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>
      
    <div>
    <label for="website">Website</label>
    <input type="text" name="website" value="' . ( isset( $_POST['website']) ? $website : null ) . '">
    </div>
      
    <div>
    <label for="firstname">First Name</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    </div>
      
    <div>
    <label for="website">Last Name</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    </div>
      
    <div>
    <label for="nickname">Nickname</label>
    <input type="text" name="nickname" value="' . ( isset( $_POST['nickname']) ? $nickname : null ) . '">
    </div>
      
    <div>
    <label for="bio">About / Bio</label>
    <textarea name="bio">' . ( isset( $_POST['bio']) ? $bio : null ) . '</textarea>
    </div>
    <input type="submit" name="submit" value="Register"/>

    </form>';
 */
?>
<div class="row">
    <div class="col-md-8">
    <?php 
	echo "<b>error code $error</b>" ;
    ?>
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
