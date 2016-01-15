<?php
    /**
     *   Template Name: Refals
     */


if(!is_user_logged_in())
{
    wp_redirect(home_url() );
    exit;
}
?>

<?php get_header(); ?>

<div class="container marketing">


 <hr class="featurette-divider">
<div class="row">
	<?php

	  $arr =  $user->get_refals(); 	
	    
?>
    <table class="table">
	<thead> <tr> <th>#</th> <th>Full Name</th> <th>Mail</th> <th>Data Registrated</th> </tr> </thead>
	<tbody>
	<?php $i =1; ?>
	<?php foreach($arr as $user ): ?>
	    <tr> 
		<td><?php echo $i;  $i++; ?> </td>
		<td><?php echo $user->display_name; ?> </td>
		<td><?php echo $user->user_email; ?> </td>
		<td><?php echo $user->user_registered; ?> </td>
	    </tr>
	<?php endforeach; ?>
	</tbody>
    </table>
	

</div>

 <hr class="featurette-divider">

<?php get_footer(); ?> 
