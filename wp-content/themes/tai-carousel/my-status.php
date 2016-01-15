<?php
    /**
     *   Template Name: Status
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
/*
 *SELECT wp_postmeta.meta_value 
 FROM wp_postmeta, wp_posts 
 WHERE wp_posts.id = wp_postmeta.post_id 
 AND wp_postmeta.meta_key='_customer_user' 
 AND     wp_posts.post_status ='wc-completed'
 * */
 

$sum_ref = 0;
$sum_deposit = 0;
$sum_get =get_user_meta($user->id, 'ret-money', true);
if(strlen( $sum_get) < 1) $sum_get =0;


$sum_ref = $user->getRefMoney();

if(count($user->orders)>0)
{
    #var_dump($user->orders);
}


#var_dump($orders2[0]->ID);

#$order = new WC_Order(39);

#print_r($order->id_user);



?>

<table class="table">
	<thead> <tr> <th>#</th> <th> Значение </th> <th>Сумма($)</th> </tr> </thead>
    <tbody>
    <tr> <td> 1 </td> <td> Депозиты </td> <td> <?php echo $sum_deposit; ?> </td> </tr>
    <tr> <td> 2 </td> <td> Комисиия от рефалов (10 %) </td> <td> <?php echo $sum_ref; ?> </td> </tr>
    <tr> <td> 3 </td> <td> Выплаты </td> <td> <?php echo $sum_get; ?> </td> </tr>
    </tbody>
</table>
</div>

 <hr class="featurette-divider">

<?php get_footer(); ?> 
