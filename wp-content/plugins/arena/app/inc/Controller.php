<?php

namespace ArenaApp;

class Controller
{
    
    protected $user;

    public function __construct()
    {
        $this->user = new User(); 
    }

    public function begin()
    {
        add_shortcode( 'arena-registration', array($this, 'registration') );
        add_shortcode( 'arena-userpage', array($this, 'userPage') );
        add_shortcode( 'arena-createorder', array($this, 'createOrder') );
        add_shortcode( 'arena-orderlist', array($this, 'orderList') );
        add_shortcode( 'arena-orderinfo', array($this, 'orderInfo') );
    }
    
    public function orderInfo()
    {
        $isLogin = is_user_logged_in();

        if($isLogin && isset($_POST['join']))
        {
            #TO DO
        }

        $order = new Order();

        $info = $order->info($_GET['orderid']);

        #var_dump($info->id);
        

        $user = new User();
        
        $uinfo = $user->infoById($info->idUser);
        #var_dump($uinfo);
        
        
        require_once(TEMPLATES_ARENA . '/orderinfo.php' ); 
    } 

    public function orderList()
    {
        $order = new Order();

        $orders = $order->thelist();

        require_once(TEMPLATES_ARENA . '/orderlist.php' );
    }

    public function userPage()
    {
        if(!is_user_logged_in())
        {
            echo ARENA_ERROR_NOT_LOGIN;
            return false;
        }
        
        $user = wp_get_current_user(); 
    

        require_once(TEMPLATES_ARENA . '/userpage.php' );
    }
    
    
    public function createOrder()
    {
        if(!is_user_logged_in())
        {
            echo ARENA_ERROR_NOT_LOGIN;
            return false;
        }

        $success = false;
        $error = 0;

        #echo 'create order';
        if(isset($_POST['createorder']))
        {
            $count = ( isset($_POST['count'])) ? htmlspecialchars($_POST['count']) : "";
            $sum = ( isset($_POST['sum'])) ? htmlspecialchars($_POST['sum']) : "";
            
            if(!isset($sum)  || !isset($count))
            {
                $error = 1;   
            }
            else
            {
                $iduser = get_current_user_id();

                $order = new Order();

                $success = $order->create($iduser, $count, $sum);
            }

            #var_dump($success);
        }
        
        require_once(TEMPLATES_ARENA . '/createorder.php' );
    }

    
    public function registration()
    {
        $email = "";
        $nick = "";    
        $pass1 = "";
        $pass2 = "";
        $money = 0;

        $error = 0 ;
        $success = 0;
    /*	
        1 - pass != pass2
        2 - wrong email
        3 - login is not once
        4 - email not once
     */
        if(isset($_POST['registration']))
        {

            $nick = ( isset($_POST['nick'])) ? htmlspecialchars($_POST['nick']) : "";
            $email = ( isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : "";
            $pass1 = ( isset($_POST['pass1'])) ? htmlspecialchars($_POST['pass1']) : "";
            $pass2 = ( isset($_POST['pass2'])) ? htmlspecialchars($_POST['pass2']) : "";
            $money = ( isset($_POST['money'])) ? htmlspecialchars($_POST['money']) : 0;

            if(!isset($pass1) || $pass1 != $pass2 )
            {
                $error = 1;
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error = 2;
            }
            elseif($this->user->testLogin($nick))
            {
                $error = 3;
            }
            elseif($this->user->testEmail($email))
            {
                $error = 4;
            }
            elseif(!is_numeric($money) || $money < 1000 )
            {
                $error = 5;
            }
            else
            {
                /*good*/
                $this->user->registration($nick, $pass1, $email, $money);
                
                $success = 1;
            }

        }


        require_once(TEMPLATES_ARENA . '/registration.php' );

    }

}
