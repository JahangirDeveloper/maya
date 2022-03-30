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
            <h1>COUNTRY</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>">Home</a></li>
              <li class="breadcrumb-item"><a href="#">COUNTRY</a></li>
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
                      <h3 class="card-title">ALL COUNTRIES</h3>
                    </div>
                    <div class="col-lg-6 text-right">
                      <a href="<?php echo base_url().'admin/country/add'; ?>" class="nav-link text-uppercase p-0">
                        ADD COUNTRY
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
                        <th>ID</th>
                        <th>COUNTRY NAME (ENGLISH)</th>
                        <th>COUNTRY NAME (ARABIC)</th>
                        <th>ACTIONS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(sizeof($countries) > 0){ ?>
                      <?php 
                        $counter = 1;
                        foreach ($countries as $key => $value) { ?>
                        <tr class="text-center">
                          <td><?php echo $counter; $counter++; ?></td>
                          <td><?php echo $value['id']; ?></td>
                          <td><?php echo $value['title_en']; ?></td>
                          <td><?php echo $value['title_ar']; ?></td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">ACTIONS</button>
                              <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu text-uppercase" role="menu">
                                <a class="dropdown-item" href="<?php echo base_url().'admin/country/edit/'.base64_encode($value['id']); ?>">EDIT</a>
                                <a class="dropdown-item text-uppercase" href="<?php echo base_url().'admin/state/add/'.base64_encode($value['id']); ?>">ADD STATE / Provinces</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item btn_delete text-danger" tbl="<?php echo base64_encode('area_tbl'); ?>" row="<?php echo base64_encode($value['id']); ?>" href="#!"><?php echo $this->lang->line('btn_delete'); ?> <i class="fa fa-trash float-right"></i></a>
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
                        <th>ID</th>
                        <th>NAME (ENGLISH)</th>
                        <th>NAME (ARABIC)</th>
                        <th>ACTIONS</th>
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
