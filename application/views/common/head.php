<?php 
    $language  = $this->session->userdata('language');
    $direction = $this->session->userdata('direction');
    $lng       = $this->session->userdata('lng');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php if(isset($pageTitle)){echo $pageTitle;}else{echo 'MAYA';} ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link href="<?php echo base_url().'assets/css/odometer-theme-digital.css';?>" rel="stylesheet" rel="stylesheet"/>
  <link href="<?php echo base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet"/>
  <link href="<?php echo base_url().'assets/css/style.css';?>" rel="stylesheet"/>
  <script type="text/javascript">
    var myIP    = '<?php echo $this->input->ip_address(); ?>';
    var baseURL = '<?php echo base_url(); ?>';
  </script>
  <style>
    .odometer {
      font-size: 24px;
    }
  </style>
</head>
