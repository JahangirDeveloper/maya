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
        <h2><?php echo $this->lang->line('edit_Prediction'); ?></h2>
      </div>
      <?php $this->load->view('admin/common/flashmsg'); ?>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                  <?php echo $this->lang->line('edit_Prediction'); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                </div>
              </div>
            </div>
            <div class="body">
              <form action='<?php echo base_url()."admin/Predictions/edit/".$prediction_id_encoded; ?>' enctype="multipart/form-data" class="" method="post" accept-charset="utf-8">
                <div class="row clearfix">
                  <div class="col-sm-6">
                    <h2 class="card-inside-title"><?php echo $this->lang->line('Category'); ?></h2>
                    <select name="category_id" id="category_id" class="form-control show-tick">
                      <option value=""><?php echo $this->lang->line('Choose'); ?></option>
                      <?php foreach ($categories as $key => $value) { ?>
                        <option <?php if($PredictionDetails['category_id'] == $value['id']){ echo 'selected';} ?> value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row clearfix">
                  <div class="col-sm-6">
                    <textarea id="prediction_en" name="prediction_en" class="form-control" rows="5" placeholder="<?php echo $this->lang->line('Prediction_EN'); ?>"><?php echo $PredictionDetails['prediction_en'];?></textarea>
                  </div>
                  <div class="col-sm-6">
                    <textarea id="prediction_ar" name="prediction_ar" class="form-control" rows="5" placeholder="<?php echo $this->lang->line('Prediction_AR'); ?>"><?php echo $PredictionDetails['prediction_ar'];?></textarea>
                  </div>
                </div>
                <div class="row clearfix">
                  <div class="col-sm-12 text-right">
                    <a href="<?php echo base_url().'admin/Predictions/index' ?>" class="btn bg-green waves-effect"><?php echo $this->lang->line('Predictions'); ?></a>
                    <button type="submit" name="btnEdit" value="yes_close" class="btn bg-green waves-effect"><?php echo $this->lang->line('Save_and_Close'); ?></button>
                    <button type="submit" name="btnEdit" value="yes"  class="btn bg-green waves-effect"><?php echo $this->lang->line('btn_save'); ?></button>
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
    CKEDITOR.replace('prediction_ar');
  });
</script>
</body>
</html>
