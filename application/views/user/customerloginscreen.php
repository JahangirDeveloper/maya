<!DOCTYPE html>
<html lang="en" class="en ltr" dir="ltr">
  <?php $this->load->view('common/head'); ?>
  <style>
    #captchaImage {
      width: 100% !important;
    }
  </style>
  <body>
    <div id="wrapper">
      <?php $this->load->view('common/header'); ?>
      <div id="content">
             <div class="breadcrumbs gradient">
          <div class="inner">
            <ul>
              <li>
                <a href="<?php echo base_url(); ?>">
                  Home
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url().'myaccount'; ?>">
                  Account
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url().'signup'; ?>">
                  Sign up
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="inner">
          <div class="section">
            <div class="section-heading">
              <h2><?php echo $this->lang->line('SIGNIN'); ?></h2>
              <h3><?php echo $this->lang->line('Please_Use_The_Form_Below_To_Sign_In'); ?></h3>
            </div>
            <div class="row">
              <div class="col-6">
                <form class="signup-form container" id="form" action="<?php echo base_url().'login/customerlogin'; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                  <div class="panel panel-primary">
                      <div class="panel-heading text-uppercase"></div>
                      <div class="panel-body">
                        <?php if($this->session->flashdata('status')){ ?>
                          <div class="alert <?php echo $this->session->flashdata('alert_type');?> alert-dismissible in">
                            <a href="#!" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo $this->session->flashdata('alert_heading');?></strong> <?php echo $this->session->flashdata('alert_msg');?>
                          </div>
                      <?php } ?>
                      <div class="row">
                        <div class="col-12">
                          <label for="email"><?php echo $this->lang->line('Email'); ?></label>
                          <input id="email" name="email" class="form-control <?php if(form_error('email')!=''){echo 'border-danger';} ?>" type="text" value="<?php echo set_value('email'); ?>">
                          <?php echo form_error('email'); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <label for="password"><?php echo $this->lang->line('password'); ?></label>
                          <input id="password" name="password" placeholder="Choose a password ..." type="password" class="form-control <?php if(form_error('password')!=''){echo 'border-danger';} ?>" value="<?php echo set_value('password'); ?>">
                          <?php echo form_error('password'); ?>
                        </div>
                      </div>
                      </div>
                      <div class="panel controls">
                        <button type="submit" name="btn_login" value="yes"><?php echo $this->lang->line('SIGNIN'); ?></button>
                      </div>
                  </div>
                </form>
              </div>
              <div class="col-6">
                <h3>Sign in with Facebook</h3>
                <p>Click the button below to sing in with your Facebook account.</p>
                <p id="oauth-error"></p>
                <p>
                  <a class="button button-facebook" data-event="oauth-facebook" href="/account/oauth/facebook">
                    <i class="fa fa-facebook"></i>
                    Sign in with Facebook
                  </a>
                  <span id="gsb" class="button button-googleplus" data-event="oauth-googleplus" href="/account/oauth/googleplus">
                    <span class="icon">
                      <i class="fa fa-google-plus"></i>
                    </span>
                    <span class="buttonText">
                      Sign in with Google+
                    </span>
                  </span>
                </p>
                <h3>Existing account</h3>
                <p>If you already have an account please proceed to sign in page.</p>
                <p>
                  <a class="button" href="/account/signin">Sign in</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
    </div>
    <?php $this->load->view('common/script'); ?>
  </body>
</html>