<?php
class Incognito
{

    /**
     * 2017-03-13 TS:
     * retrieves data from 'visits' cookie to return amount of user visits
     * @return string
     */
    public function getIncognitoVisits()
    {

        if (isset($_COOKIE['visits'])) {
            $visits = $_COOKIE['visits'];
            if ($visits >= 1) {
                return "You visited us: " . $visits . " times";
            }
        } else {
            return "This is first visit to this website!";
        }

    }

    /**
     * 2017-03-13 TS:
     * retrieves data from 'visit_time' cookie and returns
     * difference between visits in seconds. This value eventually formated
     * with Helper class method timeToDisplay();
     * @return integer
     *
     */
    public function getIncognitoVisitDuration()
    {

        if (isset($_COOKIE['visit_duration'])) {
            $visitTime = $_COOKIE['visit_duration'];
            $curTime = date('Y-m-d H:i:s');
            if ($visitTime == 1) {
                return strtotime($curTime) - strtotime($curTime);

            } else {
                return strtotime($curTime) - strtotime($visitTime);
            }
        } else {
            return '0';
        }


    }

}

