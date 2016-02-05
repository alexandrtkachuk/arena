<?php


?>


<div class="row">
    <div class="col-md-4">
        <p>mail</p>
        <p><?php echo $user->user_email; ?></p>

    </div>
  
    <div class="col-md-4">
        <p>Баланс:</p>
        <p><?php echo get_user_meta($user->ID, 'money', true); ?>  $</p>
    </div>
  
</div>
