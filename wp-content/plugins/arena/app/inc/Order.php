<?php

namespace ArenaApp;


/**
 *
 *
 * */
class Order
{

    public function __construct()
    {
         
    }

    public function create($iduser, $count, $sum)
    {
        $user = new User();

        $result = $user->subMoney($iduser, $sum);

        if(!$result)
        {
            return false;
        }

        global $wpdb;

        $tabname = $wpdb->prefix . ARENA_TABLE_ORDERS;

        #$wpdb->show_errors();

        $wpdb->query( $wpdb->prepare( 
            "
            INSERT INTO $tabname
            ( countUsers, price, idUser, timeCreate, won, url)
            VALUES ( %d, %01.2f, %d, now(), '?', '#' )
            ", 
            $count, 
            $sum, 
            $iduser 
        ) );
        
        return true;
    }

    public function join()
    {
        
    }

    public function outUser($id)
    {
    
    }

    public function toArhive()
    {
    
    }

    public function thelist()
    {
        global $wpdb;

        $tabname = $wpdb->prefix . ARENA_TABLE_ORDERS;

        $orders = $wpdb->get_results(  
            "
            SELECT      id, countUsers, price
            FROM        $tabname
            WHERE   won='?'
            ORDER BY id desc
            "
        );
        
        return $orders; 
    }

    public function info($id)
    {
        global $wpdb;

        $tabname = $wpdb->prefix . ARENA_TABLE_ORDERS;
        
        $info = $wpdb->get_row( $wpdb->prepare( 
            "SELECT * FROM $tabname
            WHERE id=%d 
            LIMIT 1", $id));
            
       return $info; 
    }

    public function delete($id)
    {
    
    }

}
