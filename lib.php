<?php

    function now(){
        return date("Y-m-d H:i:s");
    }
    
    function nextMonth(){
        //datetime add 1 month
        $date = new DateTime();
        $date->modify('+1 month');
        return $date->format('Y-m-d H:i:s');
    }

    function checkIsExpired($expired_at){
        if(now() > $expired_at){
            return true;
        }
        return false;
    }

    function setExpired($pdo, $user_id){
        $now = now();
        $sql = "UPDATE subscribes SET status = 'expired', updated_at = :updated_at WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':updated_at', $now);
        $stmt->execute();
    }