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
            <h1><?php echo $this->lang->line('Testimonials'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Testimonials'); ?></a></li>
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
                      <h3 class="card-title"><?php echo $this->lang->line('Testimonials'); ?></h3>
                    </div>
                    <div class="col-lg-6 text-right">
                      <a href="<?php echo base_url().'admin/Testimonial/add'; ?>" class="nav-link text-uppercase p-0">
                        <?php echo $this->lang->line('Add_Testimonial'); ?>
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
                    <th><?php echo $this->lang->line('Name'); ?></th>
                    <th><?php echo $this->lang->line('Image'); ?></th>
                    <th><?php echo $this->lang->line('designation'); ?></th>
                    <th><?php echo $this->lang->line('Remarks_EN'); ?></th>
                    <th><?php echo $this->lang->line('Remarks_AR'); ?></th>
                    <th><?php echo $this->lang->line('Actions'); ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(sizeof($testimonials) > 0){ ?>
                    <?php 
                      $counter = 1;
                      foreach ($testimonials as $key => $value) { ?>
                      <tr class="text-center">
                        <td><?php echo $counter; $counter++; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td class="text-center">
                          <div class="w_h_150 ml-auto mr-auto">
                            <?php if($value['image'] != ''){ ?>
                            <img class="img-fluid w-100 box-shadow"  src="<?php echo base_url().'uploads/testimonial/'.$value['image']; ?>" alt="">
                            <?php } else { ?>
                              <img class="img-fluid w-100 box-shadow" src="<?php echo base_url().'uploads/no_image_found.png'; ?>" alt="">
                            <?php } ?>
                          </div>
                        </td>
                        <td><?php echo $value['designation']; ?></td>
                        <td><?php echo $value['remarks_en']; ?></td>
                        <td><?php echo $value['remarks_ar']; ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default">ACTIONS</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="<?php echo base_url().'admin/Testimonial/edit/'.base64_encode($value['id']); ?>"><?php echo $this->lang->line('btn_edit'); ?></a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item btn_delete text-danger" tbl="<?php echo base64_encode('testimonial_tbl'); ?>" row="<?php echo base64_encode($value['id']); ?>" href="#!"><?php echo $this->lang->line('btn_delete'); ?> <i class="fa fa-trash float-right"></i></a>
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
                    <th><?php echo $this->lang->line('Name'); ?></th>
                    <th><?php echo $this->lang->line('Image'); ?></th>
                    <th><?php echo $this->lang->line('designation'); ?></th>
                    <th><?php echo $this->lang->line('Remarks_EN'); ?></th>
                    <th><?php echo $this->lang->line('Remarks_AR'); ?></th>
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
