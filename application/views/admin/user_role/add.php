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
            <h1><?php echo $this->lang->line('User_Role'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/user_role'; ?>"><?php echo $this->lang->line('User_Role'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Add_User_Role'); ?></a></li>
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
                  <h3 class="card-title"><?php echo $this->lang->line('Edit_User_Role'); ?></h3>
                </div>
                <!-- /.card-header -->
                 <form action='<?php echo base_url()."admin/user_role/add/"; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label for="title_en"><?php echo $this->lang->line('Title_EN'); ?></label>
                          <input autocomplete="off" id="title_en" type="text" class="form-control <?php if(form_error('title_en')){ echo 'border-danger';} ?>" name="title_en" value="<?php echo set_value('title_en'); ?>"/>
                          <?php echo form_error('title_en'); ?>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label for="title_ar"><?php echo $this->lang->line('Title_AR'); ?></label>
                          <input autocomplete="off" id="title_ar" type="text" class="form-control <?php if(form_error('title_ar')){ echo 'border-danger';} ?>"  name="title_ar" value="<?php echo set_value('title_ar'); ?>"/>
                          <?php echo form_error('title_ar'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer d-block text-right">
                    <button type="submit" name="btnSave" value="yes_close" class="btn btn-success"><?php echo $this->lang->line('Save_and_Close'); ?></button>
                    <button type="submit" name="btnSave" value="yes"  class="btn btn-success"><?php echo $this->lang->line('btn_save'); ?></button>
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
    $(document).on('click', '.permission_checkbox', function(event) {
      if($(this).is(":checked")){
          var checkbox = 'checked';
      }
      else if($(this).is(":not(:checked)")){
          var checkbox = 'unchecked';
      }
      var user_role_id    = $(this).attr('user_role_id');
      var user_role_name  = $(this).attr('user_role_name');
      var permission_id   = $(this).attr('permission_id');
      var permission_name = $(this).attr('permission_name');
      var url = '<?php echo base_url()."admin/User_role/savPermission"; ?>';
      $.LoadingOverlay("show");
      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {user_role_id: user_role_id,user_role_name:user_role_name,permission_id:permission_id,permission_name:permission_name,checkbox:checkbox},
      })
      .done(function(obj) {
        if(obj.status == '1'){
          $.LoadingOverlay("hide");
        }
        else if(obj.status == '0') {
          $.LoadingOverlay("hide"); 
        }
      })
    });

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
  });
</script>
</body>
</html>
