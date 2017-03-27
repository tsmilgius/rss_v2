<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['user_session'])):
    ?>
    <h4> Top 10 channels </h4> <?php
    for($i=0; $i < 10; $i++): ?>
        <div class="container-fluid">
            <h3> <a href="<?= $stats[$i][2]?>" target="_blank"><?=$i+1 ?>. <?= $stats[$i][0]?></a>  </h3>
            <p>Viewed: <?=Helpers::timeToDisplay($stats[$i][1]) ?></p>
        </div>
    <?php
    endfor;
endif;
?>
