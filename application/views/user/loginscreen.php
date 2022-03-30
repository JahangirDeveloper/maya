<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/common/head'); ?>
	<body class="login-page">
	    <div class="login-box">
	        <div class="logo">
	            <a href="<?php echo base_url();?>">MAY</a>
	            <small></small>
	        </div>
	        <div class="card">
	            <div class="body">
	                <form id="sign_in" action="<?php echo base_url().'login/index'; ?>" enctype="multipart/form-data" class="smart-form" method="post" accept-charset="utf-8">
	                    <div class="msg">LOGIN</div>
	                    <div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="material-icons">person</i>
	                        </span>
	                        <div class="form-line">
	                            <input type="text" class="form-control" name="email" placeholder="Email Type Here.." required autofocus>
	                        </div>
	                    </div>
	                    <div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="material-icons">lock</i>
	                        </span>
	                        <div class="form-line">
	                            <input type="password" class="form-control" name="password" placeholder="Password" required>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-xs-12">
	                            <button name="btn_login" value="yes" class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
	                        </div>
	                    </div>
	                    <div class="row m-t-15 m-b--20">
	                        <div class="col-xs-6">
	                            <a href="<?php echo base_url().'register'; ?>">Register Now!</a>
	                        </div>
	                        <div class="col-xs-6 align-right">
	                            <a href="forgot-password.html">Forgot Password?</a>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	    <?php $this->load->view('admin/common/script'); ?>
	</body>
</html>
	