<?php

require __DIR__ . '../../model/rssfeed.class.php';
require __DIR__ . '../../model/rssdb.class.php';

class Helpers{


    public static function timeToDisplay($timeSeconds){

        /**
        *2017-03-14 TS:
        * Accepts seconds and returns formatted time
        */

        $hours = floor($timeSeconds / 3600);
        $minutes = floor(($timeSeconds / 60) % 60);
        $seconds = $timeSeconds % 60;

        return $hours . "h " .$minutes ."min ". $seconds . "sec";
    }


    public static function validateFeed($sFeedURL){

        $sValidator = 'http://feedvalidator.org/check.cgi?url=';

        if($sValidationResponse = file_get_contents($sValidator . urlencode($sFeedURL)) ){
            if( stristr( $sValidationResponse , 'This is a valid RSS feed' ) !== false ){
                return true;
            }
        }

        return false;
    }

    public static function addUpdate(){

        if (isset($_SESSION['url']) && isset($_SESSION['number'])  && isset($_SESSION['view_started'])) {
            $previous_session = $_SESSION['url'];
            $pr_session_ended = date('Y-m-d H:i:s');
            $pr_session_duration = strtotime($pr_session_ended) - strtotime($_SESSION['view_started']);
            unset($_SESSION['view_started']);
            unset($_SESSION['url']);
            unset($_SESSION['number']);

        } else {
            $previous_session = null;
            $pr_session_ended = null;
            $pr_session_duration = null;
        }

        if (!self::validateFeed($_POST['channel_url']) || !isset($_SESSION['user_session'])) {

            echo "RSS feed is not valid";

        } else{
            $_SESSION['url'] = $_POST['channel_url'];
            $_SESSION['number'] = $_POST['number'];
            $_SESSION['view_started'] = date('Y-m-d H:i:s');
            $feed = new RssFeed($_SESSION['url']);

            $savefeed = new Rssdb;

            if(!empty($previous_session)){
                if($savefeed->isFeedExists($_SESSION['url'], $_SESSION['user_session'])){

                    $savefeed->updateInfo($previous_session, $pr_session_ended, $pr_session_duration, $_SESSION['user_session']);

                } else {
                    $savefeed->addInfo($feed->getChannel(), $_SESSION['url'], $_SESSION['view_started'], $_SESSION['user_session']);
                    $savefeed->updateInfo($previous_session, $pr_session_ended, $pr_session_duration, $_SESSION['user_session']);

                }
            } else{
                if(!$savefeed->isFeedExists($_SESSION['url'], $_SESSION['user_session'])){
                    $savefeed->addInfo($feed->getChannel(), $_SESSION['url'], $_SESSION['view_started'], $_SESSION['user_session']);

                }

            }

        }
    }

}
