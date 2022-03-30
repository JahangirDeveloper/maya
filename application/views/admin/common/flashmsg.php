<div class="row clearfix">
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
      <?php 
        if($this->session->flashdata('alert_msg')!='') { 
          echo $this->session->flashdata('alert_msg'); 
        } 
      ?>
    </div>
  <?php } ?>
  <!-- End: FlashMsg -->
</div>