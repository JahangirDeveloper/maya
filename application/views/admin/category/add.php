<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('admin/common/head'); ?>
  <body class="theme-light-blue">
  <div class="wrapper">
    <?php $this->load->view('admin/common/search_bar'); ?>
    <?php $this->load->view('admin/common/navbar'); ?>
    <section>
        <!-- Main Sidebar Container -->
        <?php $this->load->view('admin/common/sidebar_left'); ?> 
        <?php $this->load->view('admin/common/sidebar_right'); ?>
    </section>
  <section class="content">
    <div class="container-fluid">
      <div class="block-header">
        <h2><?php echo $this->lang->line('Add_Category'); ?></h2>
      </div>
      <?php $this->load->view('admin/common/flashmsg'); ?>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-left">
                  <?php echo $this->lang->line('Add_Category'); ?>
                </div>
              </div>
            </div>
            <div class="body">
              <form action='<?php echo base_url()."admin/Category/add/"; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                <div class="row clearfix">
                  <div class="col-sm-6">
                    <label for=""><?php echo $this->lang->line('Title_EN'); ?></label>
                    <input type="text" id="title_en" name="title_en" class="form-control" placeholder="<?php echo $this->lang->line('Title_EN'); ?>" value="<?php echo set_value('title_en');?>">
                    <?php echo form_error('title_en'); ?>
                  </div>
                  <div class="col-sm-6">
                    <label for=""><?php echo $this->lang->line('Title_AR'); ?></label>
                    <input type="text" id="title_ar" name="title_ar" class="form-control" placeholder="<?php echo $this->lang->line('Title_AR'); ?>" value="<?php echo set_value('title_ar');?>">
                    <?php echo form_error('title_ar'); ?>
                  </div>
                </div>
                <div class="row clearfix">
                  <div class="col-sm-12 text-right">
                    <a href="<?php echo base_url().'admin/Category/index' ?>" class="btn bg-green waves-effect"><?php echo $this->lang->line('Categories'); ?></a>
                    <button type="submit" name="btnADD" value="yes"  class="btn bg-green waves-effect"><?php echo $this->lang->line('btn_save'); ?></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('admin/common/footer'); ?>
  <?php $this->load->view('admin/common/script'); ?>
  </body>
</html>
<script>
  $(document).ready(function($) {
    CKEDITOR.replace('prediction_en');
    CKEDITOR.config.height = 300;
  });
</script>
</body>
</html>
