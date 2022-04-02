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
        <h2><?php echo $this->lang->line('Categories'); ?></h2>
      </div>
      <?php $this->load->view('admin/common/flashmsg'); ?>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                  <?php echo $this->lang->line('Categories'); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                  <a href="<?php echo base_url().'admin/Category/add'; ?>" class="nav-link text-uppercase p-0">
                    <?php echo $this->lang->line('Add_Category'); ?>
                  </a>
                </div>
              </div>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr class="text-center">
                      <th class="text-center">#</th>
                      <th class="text-center"><?php echo $this->lang->line('Title_EN'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Title_AR'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('prediction_Count'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(sizeof($categories) > 0){ ?>
                    <?php 
                      $counter = 1;
                      foreach ($categories as $key => $value) { ?>
                      <tr class="text-center">
                        <td><?php echo $counter; $counter++; ?></td>
                        <td><?php echo $value['title_en']; ?></td>
                        <td><?php echo $value['title_ar']; ?></td>
                        <td>
                          <a href="<?php echo base_url().'admin/predictions/index/'.base64_encode($value['prediction_count']); ?>"><?php echo $value['prediction_count']; ?></a>
                        </td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ACTIONS <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url().'admin/Category/edit/'.base64_encode($value['id']); ?>" class="waves-effect waves-block"><?php echo $this->lang->line('btn_edit'); ?></a></li>
                                <li><a href="<?php echo base_url().'admin/predictions/index/'.base64_encode($value['prediction_count']); ?>" class="waves-effect waves-block"><?php echo $value['prediction_count']; ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a type="button" tbl="<?php echo base64_encode('categories_tbl'); ?>" row="<?php echo base64_encode($value['id']); ?>" class="waves-effect waves-block btn_delete col-pink"><?php echo $this->lang->line('btn_delete'); ?> <i class="fa fa-trash float-right"></i></a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                    <?php } else { ?>
                      <tr>
                        <td colspan="5" class="text-center">
                          <div>NO RECORD FOUND!</div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th class="text-center">#</th>
                      <th class="text-center"><?php echo $this->lang->line('Title_EN'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Title_AR'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('prediction_Count'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Actions'); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
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
