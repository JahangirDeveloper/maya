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
            <h1><?php echo $this->lang->line('add_Project'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/Portfolio'; ?>"><?php echo $this->lang->line('projects'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('add_Project'); ?></a></li>
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
                  <h3 class="card-title"><?php echo $this->lang->line('add_Project'); ?></h3>
                </div>
                <!-- /.card-header -->
                 <form action='<?php echo base_url()."admin/Portfolio/add/"; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                  <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="category_id"><?php echo $this->lang->line('Category'); ?></label>
                            <select name="category_id" id="category_id" class="form-control">
                              <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                              <?php foreach ($categories as $key => $value) { ?>
                                <option <?php if($value['id'] == set_value('category_id')){echo 'selected';} ?> value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                              <?php } ?>
                            </select>
                            <?php echo form_error('category_id'); ?>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="project_name"><?php echo $this->lang->line('Project_Name'); ?></label>
                            <input type="text" class="form-control" name="project_name" id="project_name" placeholder="<?php echo $this->lang->line('Project_Name'); ?>" value="<?php echo set_value('project_name'); ?>">
                            <?php echo form_error('project_name'); ?>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="short_desc_ar"><?php echo $this->lang->line('Start_Date'); ?></label>
                            <input autocomplete="off" type="text" class="form-control" name="start_date" id="start_date" placeholder="<?php echo $this->lang->line('Start_Date'); ?>" value="<?php echo set_value('start_date'); ?>">
                            <?php echo form_error('start_date'); ?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="project_desc"><?php echo $this->lang->line('Project_Desc'); ?></label>
                          <textarea class="form-control" name="project_desc" id="project_desc" placeholder="<?php echo $this->lang->line('Project_Desc'); ?>"><?php echo set_value('project_desc'); ?></textarea>
                          <?php echo form_error('project_desc'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer d-block text-right">
                    <button type="submit" name="btnADD" value="yes_close" class="btn btn-success"><?php echo $this->lang->line('Save_and_Close'); ?></button>
                    <button type="submit" name="btnADD" value="yes"  class="btn btn-success"><?php echo $this->lang->line('btn_save'); ?></button>
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
        orientation: 'bottom'
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
