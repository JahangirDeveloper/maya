<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/common/head'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php $this->load->view('admin/common/preloader'); ?>
  <?php $this->load->view('admin/common/navbar'); ?>
  <!-- Main Sidebar Container -->
  <?php $this->load->view('admin/common/sidebar'); ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $this->lang->line('Staff'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/users'; ?>"><?php echo $this->lang->line('Staff'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('EDIT_Staff'); ?></a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- Start: FlashMsg -->
              <?php if($this->session->flashdata('status')!=''){ ?>
                <div class="alert alert-dismissible <?php if($this->session->flashdata('alert_type')!=''){ echo $this->session->flashdata('alert_type'); }?>">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5>
                    <?php 
                        if($this->session->flashdata('status') == '1') { ?>
                        <i class="icon fas fa-check"></i>
                    <?php } else { ?>
                        <i class="icon fas fa-ban"></i>
                    <?php } ?>
                    <?php 
                      if($this->session->flashdata('alert_heading') != '') { 
                        echo $this->session->flashdata('alert_heading'); 
                      }
                    ?>
                  </h5>
              <?php if($this->session->flashdata('alert_msg')!='') { echo $this->session->flashdata('alert_msg'); } ?>
                </div>
              <?php } ?>
              
              <!-- End: FlashMsg -->
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-4">
                      <h3 class="card-title">
                        <?php echo '( ID: '.$userDetails['id'].')'.$userDetails['first_name'].' '.$userDetails['middle_name'].' '.$userDetails['last_name']; ?>
                      </h3>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                      <div class="pull-right">
                        <?php 
                        if($userDetails['inserted_at']!='') { echo 'REGISTRATION DATE: '.date('d-m-Y',$userDetails['inserted_at']);} 
                      ?>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-header -->
                 <form action='<?php echo base_url()."admin/user/edit/".$user_id_endcoded; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group ">
                          <label for="role_id"><?php echo $this->lang->line('User_Role'); ?></label>
                          <select class="form-control <?php if(form_error('role_id')){ echo 'border-danger';} ?>" name="role_id" id="role_id">
                            <?php foreach ($roles as $key => $value) { ?>
                              <option <?php if($userDetails['role_id'] == $value['id']){ echo 'selected';} ?> value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <?php echo form_error('role_id'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="title_en"><?php echo $this->lang->line('First_Name'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('first_name')){ echo 'border-danger';} ?>" name="first_name" id="first_name" placeholder="" value="<?php echo $userDetails['first_name']; ?>">
                        </div>
                        <?php echo form_error('first_name'); ?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="title_en"><?php echo $this->lang->line('Middle_Name'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('middle_name')){ echo 'border-danger';} ?>" name="middle_name" id="middle_name" placeholder="" value="<?php echo $userDetails['middle_name']; ?>">
                        </div>
                        <?php echo form_error('middle_name'); ?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="title_en"><?php echo $this->lang->line('Last_Name'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('last_name')){ echo 'border-danger';} ?>" name="last_name" id="last_name" placeholder="" value="<?php echo $userDetails['last_name']; ?>">
                        </div>
                        <?php echo form_error('last_name'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="row d-none">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="short_desc_en"><?php echo $this->lang->line('Description_EN'); ?></label>
                          <textarea class="form-control <?php if(form_error('short_desc_en')){ echo 'border-danger';} ?>" name="short_desc_en" id="short_desc_en"><?php echo $userDetails['short_desc_en']; ?></textarea>
                        </div>
                        <?php echo form_error('short_desc_en'); ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="short_desc_ar"><?php echo $this->lang->line('Description_AR'); ?></label>
                          <textarea class="form-control <?php if(form_error('short_desc_ar')){ echo 'border-danger';} ?>" name="short_desc_ar" id="short_desc_ar"><?php echo $userDetails['short_desc_ar']; ?></textarea>
                        </div>
                        <?php echo form_error('short_desc_ar'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group ">
                          <label for="gender"><?php echo $this->lang->line('Gender'); ?></label>
                          <select class="form-control <?php if(form_error('gender')){ echo 'border-danger';} ?>" name="gender" id="gender">
                            <option <?php if($userDetails['gender'] == '1'){ echo 'selected';} ?> value="1"><?php echo $this->lang->line('Male'); ?></option>
                            <option <?php if($userDetails['gender'] == '2'){ echo 'selected';} ?> value="2"><?php echo $this->lang->line('Female'); ?></option>
                            </select>
                        </div>
                        <?php echo form_error('gender'); ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group ">
                          <label for="contact_nmbr"><?php echo $this->lang->line('Phone_Number'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('contact_nmbr')){ echo 'border-danger';} ?>" name="contact_nmbr" id="contact_nmbr" placeholder="" value="<?php echo $userDetails['contact_nmbr']; ?>">
                        </div>
                        <?php echo form_error('contact_nmbr'); ?>
                      </div>
                    </div>

                    <div class="row d-none">
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group ">
                          <label for="whatsapp"><?php echo $this->lang->line('WhatsApp'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('whatsapp')){ echo 'border-danger';} ?>" name="whatsapp" id="whatsapp" placeholder="" value="<?php echo $userDetails['whatsapp']; ?>">
                        </div>
                        <?php echo form_error('whatsapp'); ?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="instagram"><?php echo $this->lang->line('Instagram'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('instagram')){ echo 'border-danger';} ?>" name="instagram" id="instagram" placeholder="" value="<?php echo $userDetails['instagram']; ?>">
                        </div>
                        <?php echo form_error('instagram'); ?>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="facebook"><?php echo $this->lang->line('Facebook'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('facebook')){ echo 'border-danger';} ?>" name="facebook" id="facebook" placeholder="" value="<?php echo $userDetails['facebook']; ?>">
                        </div>
                        <?php echo form_error('facebook'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="row d-none">
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group ">
                          <label for="twitter"><?php echo $this->lang->line('Twitter'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('twitter')){ echo 'border-danger';} ?>" name="twitter" id="twitter" placeholder="" value="<?php echo $userDetails['twitter']; ?>">
                        </div>
                        <?php echo form_error('twitter'); ?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="google_plus"><?php echo $this->lang->line('Google_Plus'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('google_plus')){ echo 'border-danger';} ?>" name="google_plus" id="google_plus" placeholder="" value="<?php echo $userDetails['google_plus']; ?>">
                        </div>
                        <?php echo form_error('google_plus'); ?>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="snapchat"><?php echo $this->lang->line('Snapchat'); ?></label>
                          <input type="text" class="form-control <?php if(form_error('snapchat')){ echo 'border-danger';} ?>" name="snapchat" id="snapchat" placeholder="" value="<?php echo $userDetails['snapchat']; ?>">
                        </div>
                        <?php echo form_error('snapchat'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="row d-none">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="address"><?php echo $this->lang->line('Address'); ?></label>
                          <textarea class="form-control <?php if(form_error('address')){ echo 'border-danger';} ?>" name="address" id="address"><?php echo $userDetails['address']; ?></textarea>
                        </div>
                        <?php echo form_error('address'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="row d-none">
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group ">
                          <label for="country_id"><?php echo $this->lang->line('Country'); ?></label>
                          <?php echo $userDetails['country_id']; ?>
                          <select class="form-control <?php if(form_error('country_id')){ echo 'border-danger';} ?>" name="country_id" id="country_id">
                            <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                            <?php foreach ($countries as $key => $value) { ?>
                              <option <?php if($userDetails['country_id'] == $value['id']){ echo 'selected';} ?> value="<?php echo $value['id'];?>"><?php echo $value['title'];  ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <?php echo form_error('country_id'); ?>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group ">
                          <label for="state_id"><?php echo $this->lang->line('State'); ?></label>
                          <select class="form-control <?php if(form_error('state_id')){ echo 'border-danger';} ?>" name="state_id" id="state_id">
                            <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                            <?php foreach ($states as $key => $value) { ?>
                              <option <?php if($userDetails['state_id'] == $value['id']){ echo 'selected';} ?> value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <?php echo form_error('state_id'); ?>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group ">
                          <label for="city_id"><?php echo $this->lang->line('City'); ?></label>
                          <select class="form-control <?php if(form_error('city_id')){ echo 'border-danger';} ?>" name="city_id" id="city_id">
                            <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                            <?php foreach ($cities as $key => $value) { ?>
                              <option <?php if($userDetails['city_id'] == $value['id']){ echo 'selected';} ?> value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <?php echo form_error('city_id'); ?>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group ">
                          <label for="area_id"><?php echo $this->lang->line('Area'); ?></label>
                          <select class="form-control <?php if(form_error('area_id')){ echo 'border-danger';} ?>" name="area_id" id="area_id">
                            <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                            <?php foreach ($areas as $key => $value) { ?>
                              <option <?php if($userDetails['area_id'] == $value['id']){ echo 'selected';} ?> value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <?php echo form_error('area_id'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="row ">
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 d-none">
                        <div class="form-group ">
                          <label for="is_payment_allowed"><?php echo $this->lang->line('Is_Payment_Allowed'); ?></label>
                          <select class="form-control <?php if(form_error('is_payment_allowed')){ echo 'border-danger';} ?>" name="is_payment_allowed" id="is_payment_allowed">
                            <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                            <option <?php if($userDetails['is_payment_allowed'] == '1'){ echo 'selected';} ?> value="1"><?php echo $this->lang->line('YES'); ?></option>
                            <option <?php if($userDetails['is_payment_allowed'] == '0'){ echo 'selected';} ?> value="0"><?php echo $this->lang->line('NO'); ?></option>
                          </select>
                        </div>
                        <?php echo form_error('is_payment_allowed'); ?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 d-none">
                        <div class="form-group">
                          <label for="is_registration_social"><?php echo $this->lang->line('Registered_Through_Social_Apps'); ?></label>
                          <select class="form-control <?php if(form_error('is_registration_social')){ echo 'border-danger';} ?>" name="is_registration_social" id="is_registration_social">
                            <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                            <option <?php if($userDetails['is_registration_social'] == '1'){ echo 'selected';} ?> value="1"><?php echo $this->lang->line('YES'); ?></option>
                            <option <?php if($userDetails['is_registration_social'] == '0'){ echo 'selected';} ?> value="0"><?php echo $this->lang->line('NO'); ?></option>
                          </select>
                        </div>
                        <?php echo form_error('is_registration_social'); ?>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="address"><?php echo $this->lang->line('Email'); ?></label>
                          <input readonly disabled type="text" class="form-control" name="email" id="email" placeholder="" value="<?php echo $userDetails['email']; ?>">
                        </div>
                        <?php echo form_error('email'); ?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="email_verify"><?php echo $this->lang->line('Emial_Verfied'); ?></label>
                          <select class="form-control <?php if(form_error('email_verify')){ echo 'border-danger';} ?>" name="email_verify" id="email_verify">
                              <option <?php if($userDetails['email_verify'] == 'No'){ echo 'selected'; } ?> value="Yes"><?php echo $this->lang->line('NO'); ?></option>
                              <option <?php if($userDetails['email_verify'] == 'Yes'){ echo 'selected'; } ?> value="Yes"><?php echo $this->lang->line('YES'); ?></option>
                              
                          </select>
                          
                          
                        </div>
                        <?php echo form_error('email'); ?>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="text-left">
                          <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url().'uploads/users/'.$userDetails['profile_image']; ?>" alt="">
                        </div>

                        <div class="custom-file" style="margin-top: 15px;">
                          <input type="file" name="profile_image" class="custom-file-input" id="profile_image">
                          <label class="custom-file-label" for="profile_image"><?php echo $this->lang->line('upload_Profile_Image'); ?></label>
                        </div>
                        <div class="text-red"><?php if(isset($profile_image_error)){echo $profile_image_error;} ?></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="card-footer d-block text-right">
                    <button type="submit" name="btnEdit" value="yes_close" class="btn btn-success"><?php echo $this->lang->line('Save_and_Close'); ?></button>
                    <button type="submit" name="btnEdit" value="yes"  class="btn btn-success"><?php echo $this->lang->line('btn_save'); ?></button>
                  </div>
                </form>
                <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/common/footer'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/common/script'); ?>
<script>
  $(document).ready(function($) {
    var countryWeeklyOffDay = "5";
    var startingDate = '05-01-2022';
    var endinggDate = '20-01-2022';
    $('#start_date').datepicker({
       format: 'dd-mm-yyyy',
        autoclose: true,
        daysOfWeekHighlighted: countryWeeklyOffDay,
        daysOfWeekDisabled: countryWeeklyOffDay,
        todayHighlight: true,
        //startDate: '0', // Disabled all the Past Dates
        //endDate: '0', // Disabled all the Future Dates
        // startDate: "29-12-2021",
        //minDate: startingDate,
        //maxDate: endinggDate,
    });
    $('#end_date').datepicker({
       format: 'dd-mm-yyyy',
        autoclose: true,
        daysOfWeekHighlighted: countryWeeklyOffDay,
        daysOfWeekDisabled: countryWeeklyOffDay,
        todayHighlight: true,
        //startDate: '0', // Disabled all the Past Dates
        //endDate: '0', // Disabled all the Future Dates
        // startDate: "29-12-2021",
        //minDate: startingDate,
        //maxDate: endinggDate,
    });
  });
</script>
</body>
</html>
