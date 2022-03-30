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
          <h2>DASHBOARD</h2>
        </div>
        <div class="row clearfix">
          <!-- Visitors -->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card hide">
              <div class="body bg-teal ">
                <div class="font-bold m-b--35">WEBSITE VIEWS</div>
                <ul class="dashboard-stat-list">
                  <li>
                    TODAY
                    <span class="pull-right"><b>12</b> <small>VISITORS</small></span>
                  </li>
                  <li>
                    YESTERDAY
                    <span class="pull-right"><b>15</b> <small>VISITORS</small></span>
                  </li>
                  <li>
                    LAST WEEK
                    <span class="pull-right"><b>90</b> <small>VISITORS</small></span>
                  </li>
                  <li>
                    LAST MONTH
                    <span class="pull-right"><b>342</b> <small>VISITORS</small></span>
                  </li>
                  <li>
                    LAST YEAR
                    <span class="pull-right"><b>4 225</b> <small>VISITORS</small></span>
                  </li>
                  <li>
                    ALL
                    <span class="pull-right"><b>8 752</b> <small>VISITORS</small></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
            <!-- #END# Answered Tickets -->
        </div>
      </div>
    </section>
    <?php $this->load->view('admin/common/footer'); ?>
    <?php $this->load->view('admin/common/script'); ?>
  </body>
</html>

