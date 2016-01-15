<?php
    /**
     *   Template Name: GetMoney
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


if(isset($_POST['message']) AND $_POST['message'] == 1)
{
    if(strlen($_POST['money']) > 0)
    {

        $message = "Get money:". $_POST['money'];
        $message .= "\n Give money:". $user->getRefMoney();
        $message .= "\n Gived money:". get_user_meta($user->id, 'ret-money', true);
        $message .= "\n UserID = " . $user->id;

        $headers = 'From: My Name <assemblertai@gmail.com>' . "\r\n";
        
        $admin_info = get_userdata(1);

        $result = wp_mail( $admin_info->user_email, 'get money', $message, $headers  ); 
    
        if($result)
        {
            print '<p class="bg-success"> Письмо успешно отправлено (в течении суток бодет обработано ) </p>'; 
        }
        else
        {
            echo '<p class="bg-danger text-danger"> Ошибка при отправлении ! </p> ';
        }
    }
    else
    {
?>
    <p class="bg-danger text-danger"> Укажите выводимую сумму!</p>
<?php  
    }

}

?>    

    <form method="POST">
    <div class="form-group">
        <label  for="money">Money($)</label>
        <input type="text" class="form-control" id="money" name= "money" placeholder="money">
    </div>
    <div class="form-group">
        <label  for="textarea">Коментарии</label>
     <textarea class="form-control" rows="3" id="textarea" name="textarea" ></textarea> 
    </div>  
    <input type="hidden"  id="message" name="message" value="1" placeholder="money">
    <button type="submit" class="btn btn-primary">Отправить</button> 
</form>
</div>

 <hr class="featurette-divider">

<?php get_footer(); ?> 
