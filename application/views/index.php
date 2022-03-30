<?php 
	$language = $this->session->userdata('language');
	$direction = $this->session->userdata('direction');
	$lng = $this->session->userdata('lng');
	$is_login = $this->session->userdata('is_login');
?>
<!DOCTYPE html>
<html lang="<?php echo $lng; ?>">
<script type="text/javascript">
  var t = [0, 0, 0, 0, 1000000000000, 0, 0, 1];
  function ss() {
    var min = 0;
    var max = 1000000000;
    t[t[2]]=(new Date()).valueOf();
    t[2]=1-t[2];
    if (0==t[2]) {
      clearInterval(t[4]);
      t[3]+=t[1]-t[0];
      var row=document.createElement('tr');
      var td=document.createElement('td');
      td.innerHTML=(t[7]++);
      row.appendChild(td);
      td=document.createElement('td');
      td.innerHTML=format(t[1]-t[0]);
      row.appendChild(td);
      td=document.createElement('td');
      td.innerHTML=format(t[3]);
      row.appendChild(td);
      document.getElementById('lap').appendChild(row);
      t[4]=t[1]=t[0]=0;
      my_number();
    } else {
      t[4]=setInterval(my_number, 43);
    }
  }

  function my_number() {
    var random_number = Math.floor(Math.random() * (1000000000000 - 0 + 1) + 0);
   if (t[2]) t[1] = random_number;
   t[6].value = random_number
  }
  function load() {
   t[5]= 1000000000000;
   t[6]= document.getElementById('my_number');
  }
  t[6]= document.getElementById('my_number');
</script>
	<?php $this->load->view('common/head'); ?>
	<body onload="load();">
		<?php $this->load->view('common/header'); ?>
		<main id="main" style="background-image: url('<?php echo base_url().'assets/img/bg-jungle.jpg'; ?>');">
			<section class="media-bg">
				<div class="video_box">
					<video id="intro_video" controls loop style="height: auto;width: 100vw;">
					  <source src="<?php echo base_url().'uploads/videos/mayan720pHalf2.mp4';?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
					<div class="fully_transparent_overlay"></div>
				</div>
				<div class="media-section-content">
					<header class="content-box text-center container box_shadow" style="background: #fff6;border-radius: 6px;padding: 15px 15px;">
						<form action='<?php echo base_url().'Maya/index/'; ?>' enctype="multipart/form-data" class="position-relative" method="post" accept-charset="utf-8" id="predition_form">
							<div class="row">
								<div class="col-lg-12">
									<div class="row mb-2">
										<div class="col-lg-6">
											<input autocomplete="off" type="text" class="form-control btn-block" placeholder="" id="my_number" name="my_number" maxlength="12" size="12" oninput="javascript: if(this.value.length>this.maxLength)this.value=this.value.slice(0,this.maxLength);" id="my_number" value="<?php echo $my_number; ?>" style="letter-spacing: 5px;">
										</div>
										<div class="col-lg-3">
											<button type="button" class="btn btn-primary btn-block btnStartStop" onclick="ss()">START</button>
										</div>
										<div class="col-lg-3">
											<button type="button" class="btn btn-warning btn-block btnOtherInformationBox">MORE</button>
										</div>
									</div>
								</div>
							</div>
							<div id="other_information_box" class="row" style="display: none;">
								<div class="col-lg-12">
									<div class="row mb-2">
										<div class="col-lg-12">
											<input autocomplete="off" type="text" class="form-control" name="name" id="name" placeholder="NAME">
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-lg-4">
											<select name="gender" id="gender" class="form-control">
												<option value="">GENDER</option>
												<option value="Male">MALE</option>
												<option value="Female">FEMALE</option>
												<option value="other">OTHER</option>
											</select>
										</div>
										<div class="col-lg-4">
											<select name="birth_month" id="birth_month" class="form-control text-uppercase">
												<option value="">BIRTH MONTH</option>
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
										</div>
										<div class="col-lg-4">
											<select name="birth_year" id="birth_year" class="form-control">
												<option value="">BIRTH YEAR</option>
												<?php for($year_counter = date('Y'); $year_counter > 1920; $year_counter--){ ?>
													<option value="<?php echo $year_counter; ?>"><?php echo $year_counter; ?></option>
												<?php } ?>
											</select>
										</div>
										
									</div>
									<div class="row mb-2">
										<div class="col-lg-4">
											<input autocomplete="off" type="number" class="form-control" name="age" id="age"  maxlength="3" size="3" oninput="javascript: if(this.value.length>this.maxLength)this.value=this.value.slice(0,this.maxLength);" placeholder="AGE">
										</div>
										<div class="col-lg-4">
											<input autocomplete="off" type="text" class="form-control text-uppercase" name="eye_color" id="eye_color" placeholder="EYE COLOR">
										</div>
										<div class="col-lg-4">
											<input autocomplete="off" type="text" class="form-control text-uppercase" name="body_height" id="body_height" placeholder="BODY HEIGHT (METER)">
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-lg-4">
											<input autocomplete="off" type="text" class="form-control text-uppercase" name="hair_color" id="hair_color" placeholder="HAIR COLOR">
										</div>
										<div class="col-lg-4">
											<input autocomplete="off" type="text" class="form-control text-uppercase" name="skin_color" id="skin_color" placeholder="SKIN COLOR">
										</div>
										<div class="col-lg-4">
											<input autocomplete="off" type="text" class="form-control text-uppercase" name="body_weight" id="body_weight" placeholder="BODY WEIGHT (KG)">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button type="submit" name="btnSubmit" class="btn btn-success btn-block btnSubmit">SEE PREDICTIONS</button>
								</div>
							</div>
							<div class="form_error text-danger"><?php echo form_error('my_number'); ?></div>
							<?php if( strlen($my_number)  != 12 && $my_number != '' ) { ?>
								<div class="form_error text-danger">NUMBER IS NOT 12 DIGITS</div>
							<?php } ?>
						</form>
					</header>
				</div>
			</section>
		</main>
		<!-- The Modal -->
		<div class="modal" id="myModal" style="background-image: url('<?php echo base_url().'assets/img/bg-jungle.jpg'; ?>');background-size: cover;">
			<div class="black_overlay opecity_0_6"></div>
		    <div class="modal-dialog modal-xl">
		      <div class="modal-content myModalContent">
		        <!-- Modal body -->
		        <div class="modal-body">
		          	<div class="form-check mb-3">
					  	<label class="form-check-label">
					    	<input type="checkbox" data-dismiss="modal" onclick="playVideo()" class="form-check-input btnAcceptCokies">ACCEPT COOKIES AND TERMS & CONDITIONS
					  	</label>
					</div>
		        </div>
		      </div>
		    </div>
		</div>
		<?php $this->load->view('common/footer'); ?>
		<?php $this->load->view('common/script'); ?>
	</body>
	<script>
		$(document).ready(function($) {
	        $(document).on('click', '.btnStartStop', function(event) {
	        	$(this).toggleClass('btn-danger');
	        	$(this).toggleClass('started');
	        	if($(this).hasClass('started')){
	        		$('#intro_video').trigger('play');
	        		$(this).html('STOP');
	        	}
	        	else {
	        		$(this).html('START');
	        		$('#intro_video').trigger('pause');
	        	}
	        });
	        $(document).on('click', '.btnOtherInformationBox', function(event) {
	        	$('#other_information_box').slideToggle( 'slow', function(){ });
	        });
	        var my_number = '<?php echo $my_number; ?>';
	        if (my_number == '') {
	        	$("#myModal").modal();
	        }
		});
		function playVideo() {
            $('#intro_video').trigger('play');
            $('.btnStartStop').trigger('click');
            $('.media-section-content').addClass('top7p');
            setTimeout(function() {
	        	$('.media-section-content').addClass('top7p');
	        }, 22000);
        }
        function pauseVideo() {
            $('#intro_video').trigger('pause');
        }
	</script>
	<script>
        
    </script>
</html>