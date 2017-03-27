<?php
if(!isset($_SESSION))
    session_start();
?>

<h2><?= $rsscontent->getChannel();?></h2>
<?php
for($i=0; $i < $_SESSION['number']; $i++):
    foreach($rsscontent as $item):?>
        <h4> <a href="<?= $item[$i]->link ?>" target="_blank"><?=$item[$i]->title?> </a></h4>
        <p><?= $item[$i]->description?></p>
        <p><?= substr($item[$i]->time, 0, -5)?></p>
        <?php
    endforeach;
endfor;
else: ?>
    <p>Please select rss channel</p>
<?php
endif;
?>
