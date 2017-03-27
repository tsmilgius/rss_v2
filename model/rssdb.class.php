<?php

require_once __DIR__ . '../../model/db.class.php';

class Rssdb

{

    public function addInfo($title, $url, $added, $user_id)
    {
        try {
            $stmt = Db::getInstance()->prepare("INSERT INTO feeds(channel_title, channel_link, date_added, last_viewed, user_id) VALUES(:title, :url, :added, :viewed, :user_id)");
            $stmt->bindparam(":title", $title);
            $stmt->bindparam(":url", $url);
            $stmt->bindparam(":added", $added);
            $stmt->bindparam(":viewed", $added);
            $stmt->bindparam(":user_id", $user_id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $url
     * @param $date
     * @param $duration
     * @param $user_id
     */
    public function updateInfo($url, $date, $duration, $user_id)
    {
        $id = $this->getId($url, $user_id);
        $current_spent_time =$this->getTimeSpent($id, $user_id);
        $current_view_times = $this->getCurrentTimesViewed($id, $user_id);

        $this->updateTimeSpent($id, $current_spent_time, $duration, $user_id);
        $this->updateTimesViewed($id, $current_view_times, $user_id);
        $this->updateLastTimeViewed($id, $date, $user_id);


    }


    public function isFeedExists($feed, $user_id)
    {
        try {
            $stmt = Db::getInstance()->prepare("SELECT * FROM feeds WHERE channel_link= ? AND user_id= ?");
            $stmt->execute(array($feed, $user_id));
            $feedRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    private function getId($feed, $user_id)
    {
        try {
            $stmt = Db::getInstance()->prepare("SELECT * FROM feeds WHERE channel_link = ? AND user_id = ?");
            $stmt->execute(array($feed, $user_id));
            $feedRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                $id = $feedRow['id'];
                return $id;
            } else {

                return "smth wrong";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function getTimeSpent($id, $user_id)
    {
        try {
            $stmt_get = Db::getInstance()->prepare("SELECT * FROM feeds WHERE id = ? AND user_id = ?");
            $stmt_get->execute(array($id, $user_id));
            $feedRow = $stmt_get->fetch(PDO::FETCH_ASSOC);
            if ($stmt_get->rowCount() > 0) {
                $time_spent = $feedRow['time_spent'];
                return $time_spent;
            } else {
                return "smth wrong";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function updateTimeSpent($id, $curtime, $duration, $user_id)
    {
        $updated_time = $curtime + $duration;
        try {
            $stmt = Db::getInstance()->prepare("UPDATE feeds SET time_spent=? WHERE id=? AND user_id=?");
            $stmt->execute(array($updated_time, $id, $user_id));
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    private function getCurrentTimesViewed($id, $user_id)
    {
        try {
            $stmt_get = Db::getInstance()->prepare("SELECT * FROM feeds WHERE id=? AND user_id=?");

            $stmt_get->execute(array($id, $user_id));
            $feedRow = $stmt_get->fetch(PDO::FETCH_ASSOC);
            if ($stmt_get->rowCount() > 0) {
                $times_viewed = $feedRow['times_viewed'];
                return $times_viewed;
            } else {
                return "smth wrong";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function updateTimesViewed($id, $num, $user_id)
    {
        $updated = $num + 1;
        try {
            $stmt = Db::getInstance()->prepare("UPDATE feeds SET times_viewed=? WHERE id=? AND user_id=?");
            $stmt->execute(array($updated, $id, $user_id));
            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function updateLastTimeViewed($id, $date, $user_id)
    {

        try {
            $stmt = Db::getInstance()->prepare("UPDATE feeds SET last_viewed=? WHERE id=?AND user_id=?");
            $stmt->execute(array($date, $id, $user_id));
            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getTopTenByTime($user_id)
    {

        try {
            $stmt_get = Db::getInstance()->prepare("SELECT channel_title, time_spent, channel_link FROM feeds WHERE user_id=:user_id ORDER BY time_spent DESC LIMIT 10");
            $stmt_get->bindparam(":user_id", $user_id);
            $stmt_get->execute();

            $topTen = $stmt_get->fetchall();
            return $topTen;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

