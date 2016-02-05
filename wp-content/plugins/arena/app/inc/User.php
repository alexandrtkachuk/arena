<?php

namespace ArenaApp;


class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $login;

    public function __construct()
    {
        
    }

    public function myPage()
    {
        $current_user = wp_get_current_user();

        global $wpdb;

        #$wpdb->prefix;
        $newtable = $wpdb->get_results( "SHOW TABLES" );

        print_r($wpdb->prefix);	
    }
    
    public function mylogin($login, $pass)
    { 

        $result =  wp_login($login, $pass, 'test');

        if(!$result)
        {
            return false;
        } 

        var_dump($result);

        $this->login = $login;
        
        $this->logining();

        return true;
    }
    
    public function isLogin()
    {
        if(session_id() == '')
        {
            #session_start();
            return false;
        }
    }

    protected function logining()
    {
        $user = get_user_by('login', $this->login);

    }

    public function registration($name, $pass, $email, $money)
    { 
        
        $data = array (
            'user_pass' =>  $pass   
            ,'user_login' =>  $name
            , 'user_email' => $email
            , 'perfectmoney' => $money 
        );
     
        #return ID new user
        $ret = wp_insert_user( $data);

       #var_dump($ret); 
    }
    
    public function addMoney($idUser, $money)
    {
    
    }
    
    public function subMoney($idUser, $money)
    {
        $sum = get_user_meta($idUser, 'money', true);

        if($sum < $money)
        {
            return false;
        }

        update_user_meta( $idUser, 'money', $sum - $money, $sum);

        return true;
         
    }

    public function testLogin($login)
    {
        $ret = get_user_by('login', $login);
        
        if($ret)
        {
            return true;
        }
        
        return false;
    }

    public function testEmail($email)
    {
        $ret = get_user_by('email', $email);
        
        if($ret)
        {
            return true;
        }
        
        return false;
    }
    
    public function infoById($id)
    {
        $info = get_user_by( 'ID', $id );

        return $info;

    }
}
