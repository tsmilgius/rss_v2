<?php
require_once __DIR__ . '../../model/rssitem.class.php';
class RssFeed
{
    public $items = array();
    private $channel;

    public function __construct($url)
    {
        $x = simplexml_load_file($url);

        foreach ($x->channel->item as $item) {
            $post = new RssItem();
            $post->title = $item->title;
            $post->description = $item->description;
            $post->link = $item->link;
            $post->time = $item->pubDate;
            $this->items[] = $post;
        }
        $this->channel = $x->channel->title;
    }

    public function getChannel()
    {
        return $this->channel;
    }

}

