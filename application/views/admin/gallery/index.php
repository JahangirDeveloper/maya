<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/common/head'); ?>
<style>
  .black_overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background-color: #000!important;
    opacity: 0;
    z-index: -1;
    cursor: pointer;
    padding: 31% 38%;
  }
  .btnEditOverlay {
    position: absolute;
    top: 15%;
    left: 0;
    right: 0;
    width: 100px;
    margin: 0 auto;
    display: none;
  }
  .btnViewOverlay {
    position: absolute;
    top: 35%;
    left: 0;
    right: 0;
    width: 100px;
    margin: 0 auto;
    display: none;
  }
  .btnDeleteOverlay {
    position: absolute;
    top: 55%;
    left: 0;
    right: 0;
    width: 100px;
    margin: 0 auto;
    display: none;
  }
  .short_desc {
    position: absolute;
    text-align: center;
    top: 75%;
    left: 5%;
    right: 5%;
    width: 90%;
    margin: 0 auto;
    color: #FFF;
    display: none;
  }
  .mediaBox:hover .black_overlay {
    z-index: 999;
    opacity: 0.7;
  }
  .mediaBox:hover .btnEditOverlay {
    display: block;
    z-index: 9999;
  }
  .mediaBox:hover .btnViewOverlay {
    display: block;
    z-index: 9999;
  }
  .mediaBox:hover .btnDeleteOverlay {
    display: block;
    z-index: 9999;
  }
  .mediaBox:hover .short_desc {
    display: block;
    z-index: 9999;
  }
</style>
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
            <h1><?php echo $this->lang->line('All_Media'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>"><?php echo $this->lang->line('Home'); ?></a></li>
              <li class="breadcrumb-item"><a href="#!"><?php echo $this->lang->line('All_Medias'); ?></a></li>
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
          </div>
        </div>
        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6">
                    <h3 class="card-title"><?php echo $this->lang->line('All_Media'); ?></h3>
                  </div>
                  <div class="col-lg-6 text-right">
                    <a href="<?php echo base_url().'admin/Gallery/add'; ?>" class="nav-link text-uppercase p-0">
                      <?php echo $this->lang->line('Upload_Photo_or_Video'); ?>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <?php if(sizeof($categories) > 0 ) { ?>
                      <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"><?php echo $this->lang->line('Categories'); ?></a>
                      <?php foreach ($categories as $key => $value) { ?>
                        <a class="btn btn-info" href="javascript:void(0)" data-filter="<?php echo base64_encode($value['id']);?>"><?php echo $value['title'];?></a>
                      <?php } ?>
                    <?php } ?>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    <?php if(sizeof($medias) > 0){ ?>
                        <?php 
                          $counter = 1;
                          foreach ($medias as $key => $value) { ?>
                            <div class="mediaBox filtr-item col-sm-2" data-category="<?php echo base64_encode($value['category_id']);?>" data-sort="white sample">
                              <a href="<?php echo  base_url().'uploads/gallery/'.$value['image'];?>" data-toggle="lightbox" data-title="<?php echo $value['short_desc'];?>" id="<?php echo 'media'.base64_encode($value['id']);?>" class="d-block">
                                <img src="<?php echo base_url().'uploads/gallery/'.$value['image'];?>" class="img-fluid mb-2" alt="<?php echo $value['image'];?>"/>
                              </a>
                              <div class="black_overlay" href="<?php echo  base_url().'uploads/gallery/'.$value['image'];?>" data-toggle="lightbox" data-title="<?php echo $value['short_desc'];?>">
                              </div>
                              <a href="<?php echo base_url().'admin/Gallery/edit/'.base64_encode($value['id']); ?>" class="btn btn-success btn-sm btnEditOverlay"><?php echo $this->lang->line('btn_edit'); ?>
                              </a>
                              <a class="btn btn-warning btn-sm btnViewOverlay" href="<?php echo  base_url().'uploads/gallery/'.$value['image'];?>" data-toggle="lightbox" data-title="<?php echo $value['short_desc'];?>"><?php echo $this->lang->line('btn_view'); ?>
                              </a>
                              <a class="btn btn-danger btn-sm btn_delete btnDeleteOverlay" tbl="<?php echo base64_encode('gallery_tbl'); ?>" row="<?php echo base64_encode($value['id']); ?>" href="#!"><?php echo $this->lang->line('btn_delete'); ?> <i class="fa fa-trash float-right"></i></a>
                              <div class="short_desc three_line_show"><?php echo $value['short_desc'];?></div>
                            </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>
