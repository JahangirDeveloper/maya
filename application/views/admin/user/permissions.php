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
            <h1><?php echo $this->lang->line('Permissions'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/user/'.base64_encode($userDetail['id']); ?>">
                <?php echo $userDetail['email']; ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Permissions'); ?></a></li>
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
                  <h3 class="card-title"><?php echo $userDetail['id'].' : '.$userDetail['email'].' ('.$this->lang->line('Permissions').')'; ?></h3>
                </div>
                <!-- /.card-header -->
                 <form action='<?php echo base_url()."admin/user/permissions/".$user_encoded_id; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="row">
                      <?php foreach ($rolePermissions as $permissionsKey => $permission) { ?>
                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group clearfix">
                              <div class="icheck-success d-inline text-uppercase">
                                <input <?php if(in_array($permission['id'], $selectedPermissions)){echo "checked";} ?> type="checkbox" id="<?php echo 'checkboxPermission'.$permission['id']; ?>" class="permission_checkbox" permission_id="<?php echo $permission['id'];?>" permission_name="<?php echo $permission['title'];?>" user_id='<?php echo $user_id; ?>'>
                                  <label for="<?php echo 'checkboxPermission'.$permission['id']; ?>"></label>
                                  <?php echo '('.$permission['id'].') '.$permission['title'];?>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                    </div>
                  </div>
                  <div class="card-footer d-block text-right">
                    <button type="submit" name="btnEdit" value="yes" class="btn btn-success"><?php echo $this->lang->line('btn_save'); ?></button>
                    <button type="submit" name="btnEdit" value="yes_close"  class="btn btn-success"><?php echo $this->lang->line('Save_and_Close'); ?></button>
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
      var user_id    = $(this).attr('user_id');
      var permission_id   = $(this).attr('permission_id');
      var permission_name = $(this).attr('permission_name');
      var url = '<?php echo base_url()."admin/User/savPermission"; ?>';
      $.LoadingOverlay("show");
      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {user_id:user_id,permission_id:permission_id,permission_name:permission_name,checkbox:checkbox},
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
