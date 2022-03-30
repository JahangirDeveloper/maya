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
        <h2><?php echo $this->lang->line('Predictions'); ?></h2>
      </div>
      <?php $this->load->view('admin/common/flashmsg'); ?>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                  <?php echo $this->lang->line('Predictions'); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                  <a href="<?php echo base_url().'admin/Predictions/add'; ?>" class="nav-link text-uppercase p-0">
                    <?php echo $this->lang->line('add_Prediction'); ?>
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
                      <th class="text-center"><?php echo $this->lang->line('Category'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Prediction_EN'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Prediction_AR'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(sizeof($predictions) > 0){ ?>
                    <?php 
                      $counter = 1;
                      foreach ($predictions as $key => $value) { ?>
                      <tr class="text-center">
                        <td><?php echo $counter; $counter++; ?></td>
                        <td><?php if(array_key_exists($value['category_id'], $categories)){} echo $categories[$value['category_id']]['title'];; ?></td>
                        <td><?php echo $value['prediction_en']; ?></td>
                        <td><?php echo $value['prediction_ar']; ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ACTIONS <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url().'admin/Predictions/edit/'.base64_encode($value['id']); ?>" class=" waves-effect waves-block"><?php echo $this->lang->line('btn_edit'); ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0);" tbl="<?php echo base64_encode('prediction_tbl'); ?>" row="<?php echo base64_encode($value['id']); ?>" class="waves-effect waves-block btn_delete col-pink"><?php echo $this->lang->line('btn_delete'); ?> <i class="fa fa-trash float-right"></i></a></li>
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
                      <th class="text-center"><?php echo $this->lang->line('Category'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Prediction_EN'); ?></th>
                      <th class="text-center"><?php echo $this->lang->line('Prediction_AR'); ?></th>
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
<script>
  $(document).ready(function($) {
    $(function () {
      $("#example2").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example1').DataTable({
        "paging": false,
        "scrollY": '40vh',
        "scrollCollapse": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "dom": '<"row"f><"col-lg-6"l>tip',
        "language": {
            search: "_INPUT_",
            searchPlaceholder: "TYPE HERE FOR SEARCH",
        },
      });
    });
  });
</script>
</body>
</html>
