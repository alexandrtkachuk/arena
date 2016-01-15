<?php get_header(); ?>

<div class="container marketing">


 <hr class="featurette-divider">
<div class="row">
<?php if ( have_posts() ): ?>

	<?php the_post(); ?>

      
	<h1 ><?php echo get_the_title(); ?></h1> 
		
		<?php the_content( null ); ?>
	    
    <?php endif; // end if?>

</div>

 <hr class="featurette-divider">

<?php get_footer(); ?> 
