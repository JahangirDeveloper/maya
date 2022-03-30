<!DOCTYPE html>
<html lang='<?php echo $lang; ?>'>
<?php $this->load->view('include/head'); ?>
<body style='direction: <?php echo $direction; ?>'>
    <div id="newsPage" class="page-content-wrapper" >
      <?php $this->load->view('include/main_navbar'); ?>
      <section class="page_breadcrumb">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li><a href="#"><span>Home</span></a></li>
            <li class="active"><span>Thank You</span></li>        
          </ol>
        </div>
      </section>
      <main class="page-content">
        <div class="container-fluid">
          <?php if($this->session->flashdata('status')){ ?>
          <div class="alert <?php echo $this->session->flashdata('alert_type');?> alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?php echo $this->session->flashdata('alert_heading');?></strong> <?php echo $this->session->flashdata('alert_msg');?>
          </div>
          <?php } ?>
        </div>
      </main>
    </div>
    <!-- End: page-content -->
    <?php $this->load->view('include/footer'); ?>
    <?php $this->load->view('include/script'); ?>
    <script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
        });
        }, false);
        })();
    </script>
  </body>
</html>
