<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/common/head'); ?>
<body class="hold-transition sidebar-mini">
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
            <h1><?php echo $this->lang->line('Users');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home');?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('Users');?></a></li>
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
                <div class="card-header d-block">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <h3 class="card-title"><?php echo $this->lang->line('Users').' ('.sizeof($users).')'; ?></h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <a href="<?php echo base_url().'admin/user/add/' ?>" class="btn btn-sm btn-primary float-right">
                        <i class="fa fa-plus"></i>
                        <?php echo $this->lang->line('User');?>
                      </a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped w-100">
                  <thead>
                  <tr class="text-center w-space-nowrap">
                    <th class="w-space-nowrap"><?php echo $this->lang->line('ID');?></th>
                    <th><?php echo $this->lang->line('User_Role');?></th>
                    <th><?php echo $this->lang->line('Name');?></th>
                    <th><?php echo $this->lang->line('Email');?></th>
                    <th><?php echo $this->lang->line('Image');?></th>
                    <th><?php echo $this->lang->line('Registration_Date');?></th>
                    <th><?php echo $this->lang->line('Actions');?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(sizeof($users) > 0){ ?>
                    <?php 
                      $counter = 1;
                      foreach ($users as $key => $value) { ?>
                      <tr class="text-center">
                        <?php $counter; $counter++; ?>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php if(array_key_exists($value['role_id'], $user_roles)){echo $user_roles[$value['role_id']]['title'];}  ?></td>
                        <td><?php echo $value['first_name'].' '.$value['middle_name'].' '.$value['last_name']  ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td>
                          <?php 
                              if($value['profile_image'] !='') { 
                                $profile_image =  base_url().'uploads/users/'.$value['profile_image']; 
                              } 
                              else {
                                $profile_image = base_url().'uploads/no_image_found.png';
                              } 
                            ?>
                            <img class="img-thumbnail" style="width: 100px;margin: 0 auto;" src="<?php echo $profile_image; ?>">
                        </td>
                        <td><?php if($value['inserted_at'] !=''){ echo date('d-m-Y',$value['inserted_at']); }; ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default"><?php echo $this->lang->line('Actions');?></button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item text-primary" href="<?php echo base_url().'admin/user/edit/'.base64_encode($value['id']); ?>"><?php echo $this->lang->line('btn_edit');?></a>
                              <a class="dropdown-item" href="<?php echo base_url().'admin/user/permissions/'.base64_encode($value['id']); ?>"><?php echo $this->lang->line('Permissions');?></a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item text-danger btn_delete" tbl="<?php echo base64_encode('holiday_tbl'); ?>" row="<?php echo base64_encode($value['id']); ?>" href="#!"><?php echo $this->lang->line('btn_delete'); ?> <i class="fa fa-trash float-right"></i></a>
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
                    <tr class="text-center w-space-nowrap">
                      <th class="w-space-nowrap"><?php echo $this->lang->line('ID');?></th>
                      <th><?php echo $this->lang->line('User_Role');?></th>
                      <th><?php echo $this->lang->line('Name');?></th>
                      <th><?php echo $this->lang->line('Email');?></th>
                      <th><?php echo $this->lang->line('Image');?></th>
                      <th><?php echo $this->lang->line('Registration_Date');?></th>
                      <th><?php echo $this->lang->line('Actions');?></th>
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
      "scrollY": '100vh',
      "scrollX": '100wh',
      "scrollCollapse": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "dom": '<"row"f><"col-lg-6"l>tip',
      "language": {
          search: "_INPUT_",
          searchPlaceholder: "TYPE HERE FOR SEARCH",
      },
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
</body>
</html>
