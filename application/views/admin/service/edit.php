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
            <h1><?php echo $this->lang->line('Edit_Service'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/Service'; ?>"><?php echo $this->lang->line('Services'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Edit_Service'); ?></a></li>
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
                  <h3 class="card-title"><?php echo $this->lang->line('Edit_Service'); ?></h3>
                </div>
                <!-- /.card-header -->
                 <form action='<?php echo base_url()."admin/Service/edit/".$service_id_encoded; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                  <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="title_en"><?php echo $this->lang->line('Title_EN'); ?></label>
                            <input type="text" class="form-control" name="title_en" id="title_en" placeholder="TYPE HERE" value="<?php echo $serviceDetails['title_en']; ?>">
                            <?php echo form_error('title_en'); ?>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="title_en"><?php echo $this->lang->line('Title_AR'); ?></label>
                            <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="TYPE HERE" value="<?php echo $serviceDetails['title_ar']; ?>">
                            <?php echo form_error('title_ar'); ?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="link"><?php echo $this->lang->line('link'); ?></label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="TYPE HERE" value="<?php echo $serviceDetails['link']; ?>">
                            <?php echo form_error('link'); ?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="short_desc_en"><?php echo $this->lang->line('Short_Desc_EN'); ?></label>
                            <textarea class="form-control" name="short_desc_en" id="short_desc_en" placeholder="TYPE HERE"><?php echo $serviceDetails['short_desc_en']; ?></textarea>
                            <?php echo form_error('long_desc_en'); ?>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="short_desc_ar"><?php echo $this->lang->line('Short_Desc_AR'); ?></label>
                            <textarea class="form-control" name="short_desc_ar" id="short_desc_ar" placeholder="TYPE HERE"><?php echo $serviceDetails['short_desc_ar']; ?></textarea>
                            <?php echo form_error('long_desc_ar'); ?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="text-left" style="height: 140px;width: 140px">
                          <?php if($serviceDetails['image'] != ''){ ?>
                          <img class="img-fluid w-100 box-shadow" src="<?php echo base_url().'uploads/service/'.$serviceDetails['image']; ?>" alt="">
                          <?php } else { ?>
                            <img class="img-fluid w-100 box-shadow" src="<?php echo base_url().'uploads/no_image_found.png'; ?>" alt="">
                          <?php } ?>
                        </div>
                        <div class="custom-file" style="margin-top: 15px;">
                          <input type="file" name="image" class="custom-file-input" id="image">
                          <label class="custom-file-label" for="image"><?php echo $this->lang->line('upload_Image'); ?></label>
                        </div>
                        <div class="text-red"><?php if(isset($image_error)){echo $image_error;} ?></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="text-left" style="height: 140px;width: 140px">
                          <?php if($serviceDetails['icon'] != ''){ ?>
                          <img class="img-fluid w-100 box-shadow"  src="<?php echo base_url().'uploads/service/'.$serviceDetails['icon']; ?>" alt="">
                          <?php } else { ?>
                            <img class="img-fluid w-100 box-shadow" src="<?php echo base_url().'uploads/no_image_found.png'; ?>" alt="">
                          <?php } ?>
                        </div>
                        <div class="custom-file" style="margin-top: 15px;">
                          <input type="file" name="icon" class="custom-file-input" id="icon">
                          <label class="custom-file-label" for="icon"><?php echo $this->lang->line('Upload_Icon'); ?></label>
                        </div>
                        <div class="text-red"><?php if(isset($image_error)){echo $image_error;} ?></div>
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
    // Summernote
    $('textarea').summernote({
      placeholder: 'TYPE HERE',
      tabsize: 2,
      height: 150
    });
  });
</script>
</body>
</html>
