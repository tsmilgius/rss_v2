
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading" id="panel">
        <div class="row">
        <div class="col-lg-10">
            <h3 class="panel-title">Please insert or select valid RSS feed</h3>
        </div>

        </div>
    </div>
    <div class="panel-body collapse-in" id="panel-body">
        <form id="panel" action="controller/inputController.php" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-md" id="url" name="channel_url" required placeholder="RSS feed url">
                    </div>
                    <div class="col-lg-1">
                        <input type="number" class="form-control input-md" id="number"  name="number" required min="1" max="10" value="10">
                    </div>
                </div>
                <div class="container">
                    <p id="message"></p>
                </div>
            </div>
            <button type="submit" class="btn btn-warning" id="rss-channel">Get RSS content</button>
        </form>

    </div>
</div>

</div>
