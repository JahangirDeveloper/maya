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
            <h1><?php echo $this->lang->line('Area'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/country/';?>"><?php echo $this->lang->line('Country'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/state/'; ?>"><?php echo $this->lang->line('State'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/city/'; ?>"><?php echo $this->lang->line('City'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/area/'; ?>"><?php echo $this->lang->line('Area'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Edit_Area'); ?></a></li>
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
                  <h3 class="card-title"><?php echo $this->lang->line('Edit_Area'); ?></h3>
                </div>
                <!-- /.card-header -->
                 <form action='<?php echo base_url()."admin/city/edit/".$area_id_decoded; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                  <div class="card-body ">

                    <div class="form-group">
                      <label for="country_id"><?php echo $this->lang->line('Country'); ?></label>
                      <select class="custom-select" name="country_id" id="country_id">
                        <?php foreach ($countries as $key => $countryDetail) { ?>
                          <option <?php if($areaDetails['country_id'] == $countryDetail['id']){ echo 'selected';} ?> value="<?php echo $countryDetail['id'];?>"><?php echo $countryDetail['title'];?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="state_id"><?php echo $this->lang->line('State'); ?></label>
                      <select class="custom-select" name="state_id" id="state_id">
                        <?php foreach ($states as $key => $stateDetail) { ?>
                          <option <?php if($areaDetails['state_id'] == $stateDetail['id']){ echo 'selected';} ?> value="<?php echo $stateDetail['id'];?>"><?php echo $stateDetail['title'];?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="state_id"><?php echo $this->lang->line('City'); ?></label>
                      <select class="custom-select" name="city_id" id="city_id">
                        <?php foreach ($cities as $key => $cityDetail) { ?>
                          <option <?php if($areaDetails['city_id'] == $cityDetail['id']){ echo 'selected';} ?> value="<?php echo $cityDetail['id'];?>"><?php echo $cityDetail['title'];?></option>
                        <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                      <label for="title_en">NAME (ENGLISH)</label>
                      <input type="text" class="form-control" name="title_en" id="title_en" placeholder="TYPE HERE" value="<?php echo $areaDetails['title_en']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="title_en">NAME (ARABIC)</label>
                      <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="TYPE HERE" value="<?php echo $areaDetails['title_ar']; ?>">
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
    
  });
</script>
</body>
</html>
