  <!DOCTYPE html>
<html lang='<?php echo $lng; ?>'>
<?php $this->load->view('include/head'); ?>
<body style='direction: <?php echo $direction; ?>'>
    <div id="newsPage" class="page-content-wrapper" >
      <?php $this->load->view('include/main_navbar'); ?>
      <section class="page_breadcrumb">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li><a href="#"><span>Home</span></a></li>
            <li class="active"><span>Sign Up</span></li>        
          </ol>
        </div>
      </section>
      <main class="page-content">
        <form class="signup-form" action="<?php echo base_url().'Login/signup/' ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <?php if($this->session->flashdata('status')){ ?>
            <div class="alert <?php echo $this->session->flashdata('alert_type');?> alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo $this->session->flashdata('alert_heading');?></strong> <?php echo $this->session->flashdata('alert_msg');?>
            </div>
          <?php } ?>
          <div class="form-row">
            <div class="col-md-4 mb20">
              <label for="first_name">First name</label>
              <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo set_value('first_name'); ?>">
              <?php echo form_error('first_name'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="middle_name">Middle name</label>
              <input type="text" name="middle_name" class="form-control" placeholder="Middle name" value="<?php echo set_value('middle_name'); ?>">
              <?php echo form_error('middle_name'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="last_name">Last name</label>
              <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo set_value('last_name'); ?>">
              <?php echo form_error('last_name'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
              <?php echo form_error('email'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="password">Password</label>
              <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
              <?php echo form_error('password'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="confirm_password">Confirm Password</label>
              <input type="text" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('confirm_password'); ?>">
              <?php echo form_error('confirm_password'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="role_id">Account</label>
              <select name="role_id" id="role_id" class="form-control" value="<?php echo set_value('role_id'); ?>">
                <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                <option <?php if(set_value('role_id') =='2'){ echo "selected";} ?> value="2">Company</option>
                <option <?php if(set_value('role_id') =='3'){ echo "selected";} ?> value="3">Agent</option>
                <option <?php if(set_value('role_id') =='4'){ echo "selected";} ?> value="4">Customer</option>
              </select>
              <?php echo form_error('role_id'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="role_id">Plan</label>
              <select name="plan_id" id="plan_id" class="form-control" value="<?php echo set_value('plan_id'); ?>">
                <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                <option <?php if(set_value('plan_id') =='1'){ echo "selected";} ?> value="1">Free Account</option>
                <option <?php if(set_value('plan_id') =='2'){ echo "selected";} ?> value="2">1 Year</option>
                <option <?php if(set_value('plan_id') =='3'){ echo "selected";} ?> value="3">3 Year</option>
              </select>
              <?php echo form_error('plan_id'); ?>
            </div>
            <div class="col-md-4 mb20">
              <label for="category_id">Category</label>
              <select name="category_id" id="category_id" class="form-control" value="<?php echo set_value('category_id'); ?>">
                <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                <?php foreach ($categories as $categoryKey => $category) {?>
                <option <?php if(set_value('category_id') ==$category['id']){ echo "selected";} ?> value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
              <?php } ?>
              </select>
              <?php echo form_error('category_id'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 mb20">
              <label for="">Terms</label>
              <div class="form-check">
                <input class="form-check-input" name="terms_condition" type="checkbox" value="yes" id="terms_condition" value="<?php echo set_value('username'); ?>">
                <label class="form-check-label" for="terms_condition">
                  Agree to terms and conditions
                </label>
              </div>
              <?php echo form_error('terms_condition'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 mb20">
                 <button class="btn btn-primary btn-block btn-sm mt30" name="btn_signup" value="yes" type="submit">Sign Up</button>
            </div>
          </div>        
          <div class="clearfix"></div>
        </form>

      </main>
    </div>
    <!-- End: page-content -->
    <?php $this->load->view('include/footer'); ?>
    <?php $this->load->view('include/script'); ?>
    <script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
        });
        }, false);
        })();
    </script>
  </body>
</html>
