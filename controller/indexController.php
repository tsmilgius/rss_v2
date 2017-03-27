<?php

Class indexController Extends baseController
{

    public function index()
    {

        $this->registry->template->rsscontent = $this->rsscontent();
        $this->registry->template->stats = $this->stats();
        $this->registry->template->incognitoVisits = $this->incognitoVisits();
        $this->registry->template->show('index');
    }

    public function rsscontent()
    {

        if (isset($_SESSION['url'])) {
            $feed = new RssFeed($_SESSION['url']);
        } else {
            $feed = NULL;
        }
        return $feed;
    }

    public function incognitoVisits()
    {

        $incognito = new Incognito;
        return array('visits' => $incognito->getIncognitoVisits(),
            'duration' => $incognito->getIncognitoVisitDuration());

    }

    public function stats()
    {

        $stats = new Rssdb;
        if (isset($_SESSION['user_session'])) {
            return $stats->getTopTenByTime($_SESSION['user_session']);
        }

    }


}
