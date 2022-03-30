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
            <h1><?php echo $this->lang->line('Edit_Testimonial'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/Team'; ?>"><?php echo $this->lang->line('Team'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Edit_Team'); ?></a></li>
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
                  <h3 class="card-title"><?php echo $this->lang->line('edit_Team_Member'); ?></h3>
                </div>
                <!-- /.card-header -->
                 <form action='<?php echo base_url()."admin/Team/edit/".$team_id_encoded; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                  <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="name"><?php echo $this->lang->line('Name'); ?></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="TYPE HERE" value="<?php echo $teamMemberDetails['name']; ?>">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="designation"><?php echo $this->lang->line('designation'); ?></label>
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="<?php echo $this->lang->line('designation'); ?>" value="<?php echo $teamMemberDetails['designation']; ?>">
                            <?php echo form_error('designation'); ?>
                          </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="remarks_en"><?php echo $this->lang->line('Remarks_EN'); ?></label>
                            <textarea class="form-control" name="remarks_en" id="remarks_en" placeholder="<?php echo $this->lang->line('Remarks_EN'); ?>"><?php echo $teamMemberDetails['remarks_en']; ?></textarea>
                            <?php echo form_error('remarks_en'); ?>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="remarks_ar"><?php echo $this->lang->line('Remarks_AR'); ?></label>
                            <textarea class="form-control" name="remarks_ar" id="remarks_ar" placeholder="<?php echo $this->lang->line('Remarks_AR'); ?>"><?php echo $teamMemberDetails['remarks_ar']; ?></textarea>
                            <?php echo form_error('remarks_ar'); ?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="twitter"><?php echo $this->lang->line('Twitter'); ?></label>
                            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="TYPE HERE" value="<?php echo $teamMemberDetails['twitter']; ?>">
                            <?php echo form_error('twitter'); ?>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="facebook"><?php echo $this->lang->line('Facebook'); ?></label>
                            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="TYPE HERE" value="<?php echo $teamMemberDetails['facebook']; ?>">
                            <?php echo form_error('facebook'); ?>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="instagram"><?php echo $this->lang->line('Instagram'); ?></label>
                            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="TYPE HERE" value="<?php echo $teamMemberDetails['instagram']; ?>">
                            <?php echo form_error('instagram'); ?>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="linkedin"><?php echo $this->lang->line('Linkedin'); ?></label>
                            <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="TYPE HERE" value="<?php echo $teamMemberDetails['linkedin']; ?>">
                            <?php echo form_error('linkedin'); ?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="w_h_150">
                          <?php if($teamMemberDetails['image'] != ''){ ?>
                          <img class="img-fluid w-100 box-shadow" src="<?php echo base_url().'uploads/team/'.$teamMemberDetails['image']; ?>" alt="">
                          <?php } else { ?>
                            <img class="img-fluid w-100 box-shadow" src="<?php echo base_url().'uploads/no_image_found.png'; ?>" alt="">
                          <?php } ?>
                        </div>
                        <p>Recommended Size: 600 X 600</p>
                        <div class="custom-file" style="margin-top: 15px;">
                          <input type="file" name="image" class="custom-file-input" id="image">
                          <label class="custom-file-label" for="image"><?php echo $this->lang->line('upload_Image'); ?></label>
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
    $('textarea').summernote({
      placeholder: 'TYPE HERE',
      tabsize: 2,
      height: 150
    });
  });
</script>
</body>
</html>
