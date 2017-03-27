<div id="register-modal" class="modal" data-backdrop="static" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content col-lg-12 center-block">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center">Register</h3>
      </div>

      <div class="modal-body" >
        <form class="form col-lg-12 center-block" action="controller/register.php" method="post" >
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="name" placeholder="name">
            </div>
			 <div class="form-group">
              <input type="text" class="form-control input-lg" name="email" placeholder="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password" placeholder="enter password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password2" placeholder="repeat password">
            </div>
            <div class="form-group">
              <button class="btn btn-warning btn-lg btn-block" id="register">Register</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12">
			<a data-toggle="modal" href="#login-modal" id="to-login">Return to login window</a>
        </div>
      </div>
    </div>
  </div>
</div>
