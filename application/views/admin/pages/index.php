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
            <h1><?php echo $this->lang->line('Pages'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Pages'); ?></a></li>
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
                  <div class="row">
                    <div class="col-lg-6">
                      <h3 class="card-title"><?php echo $this->lang->line('Pages'); ?></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                      <a href="<?php echo base_url().'admin/Pages/add'; ?>" class="nav-link text-uppercase p-0">
                        <?php echo $this->lang->line('Add_Page'); ?>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th><?php echo $this->lang->line('Page_Category'); ?></th>
                    <th><?php echo $this->lang->line('Title_EN'); ?></th>
                    <th><?php echo $this->lang->line('Title_AR'); ?></th>
                    <th><?php echo $this->lang->line('link'); ?></th>
                    <th><?php echo $this->lang->line('Actions'); ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(sizeof($pages) > 0){ ?>
                    <?php 
                      $counter = 1;
                      foreach ($pages as $key => $value) { ?>
                      <tr class="text-center">
                        <td><?php echo $counter; $counter++; ?></td>
                        <td>
                          <?php 
                            if(array_key_exists($value['category_id'], $categories)){
                              echo $categories[$value['category_id']]['title'];
                            }
                          ?>
                        </td>
                        <td><?php echo $value['title_en']; ?></td>
                        <td><?php echo $value['title_ar']; ?></td>
                        <td><?php echo $value['link']; ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default">ACTIONS</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item text-primary " href="<?php echo base_url().'admin/Pages/edit/'.base64_encode($value['id']); ?>"><?php echo $this->lang->line('btn_edit'); ?> <i class="fa fa-edit float-right"></i></a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item text-danger btn_delete d-none" tbl="<?php echo base64_encode('pages_tbl'); ?>" row="<?php echo base64_encode($value['id']); ?>" href="#!"><?php echo $this->lang->line('btn_delete'); ?> <i class="fa fa-trash float-right"></i></a>
                            </div>
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
                    <th>#</th>
                    <th><?php echo $this->lang->line('Page_Category'); ?></th>
                    <th><?php echo $this->lang->line('Title_EN'); ?></th>
                    <th><?php echo $this->lang->line('Title_AR'); ?></th>
                    <th><?php echo $this->lang->line('link'); ?></th>
                    <th><?php echo $this->lang->line('Actions'); ?></th>
                  </tr>
                  </tfoot>
                  </table>
                </div>
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
</script>
</body>
</html>
