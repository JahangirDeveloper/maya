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
					<video id="intro_video" autoplay muted loop style="height: auto;width: 100vw;">
					  <source src="<?php echo base_url().'uploads/videos/mayan720pHalf2.mp4';?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
					<div class="fully_transparent_overlay"></div>
				</div>
				<div class="media-section-content">
					<header class="content-box text-center container" style="overflow: hidden;">
						<form action='<?php echo base_url().'Maya/index/'; ?>' enctype="multipart/form-data" class="position-relative" method="post" accept-charset="utf-8" id="predition_form">
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="row mb-2">
										<div class="col-lg-12">
											<div id="odometer" class="odometer w-100" style="letter-spacing: 3px;border-radius: 4px;height: 70px;padding-top: 5px;font-size: 56px;color: #FFF !important;">000000000000</div>
											<input type="hidden" class="my_number" id="my_number" name="my_number">
										</div>
										<div class="col-lg-4">
											
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-lg-12">
											<button type="button" class="btn text-white btn-block btnStep1 border-0" style="background-color: #0b0d00; border-color: #0b0d00;background-image: -webkit-radial-gradient(rgba(139, 245, 165, 0.4), #000000);background-image: radial-gradient(rgba(139, 245, 165, 0.4), #000000);">STEP1</button>
										</div>
									</div>
								</div>
								<div class="col-lg-2"></div>
							</div>
							<div class="row" id="other_information_box" style="display: none;">
								<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="row mb-2">
										<div class="col-lg-12">
											<input autocomplete="off" type="hidden" class="form-control" name="name" id="name" placeholder="NAME">
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
								<div class="col-lg-2"></div>
								<div class="clearfix"></div>
								<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<button type="button"  class="btn btn-success btn-block btnStop2" style="background-color: #0b0d00; border-color: #0b0d00;background-image: -webkit-radial-gradient(rgba(139, 245, 165, 0.4), #000000);background-image: radial-gradient(rgba(139, 245, 165, 0.4), #000000);">STEP 2</button>
								</div>
								<div class="col-lg-2"></div>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<button type="submit" name="btnSubmit" class="btn btn-success btn-block btnSubmit d-none" style="background-color: #0b0d00; border-color: #0b0d00;background-image: -webkit-radial-gradient(rgba(139, 245, 165, 0.4), #000000);background-image: radial-gradient(rgba(139, 245, 165, 0.4), #000000);">SEE PREDICTIONS</button>
								</div>
								<div class="col-lg-2"></div>
							</div>
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
					    	<input type="checkbox" data-dismiss="modal" onclick="playVideo()" class="form-check-input btnAcceptCokies">ACCEPT COOKIES
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
		var stoping_duration = 2000;
		$(document).ready(function($) {
	        $(document).on('click', '.btnStep1', function(event) {
	        	$(this).addClass('d-none');
	        	setTimeout(function() {
	        		var my_number = '';
		        	$('.odometer-value').each(function(index, el) {
		        		var odometer_value = $.trim($(this).html());
		        		my_number = my_number.concat(odometer_value);
		        	});
		        	$('.my_number').val(my_number);
	        	}, 2000);
	        	$('#other_information_box').slideToggle( 'slow', function(){ });
	        });
	        $(document).on('click', '.btnStop2', function(event) {
	        	if($('#gender').val() == ''){
	        		$('#gender').addClass('border-danger');
	        	}
	        	else if($('#birth_month').val() == ''){
	        		$('#gender').removeClass('border-danger');
	        		$('#gender').addClass('border-succes');

	        		$('#birth_month').addClass('border-danger');
	        	}
	        	else if($('#birth_year').val() == ''){
	        		$('#gender').removeClass('border-danger');
	        		$('#gender').addClass('border-succes');

	        		$('#birth_month').removeClass('border-danger');
	        		$('#birth_month').addClass('border-succes');

	        		$('#birth_year').addClass('border-danger');
	        	}
	        	else if($('#age').val() == ''){
	        		$('#gender').removeClass('border-danger');
	        		$('#gender').addClass('border-succes');

	        		$('#birth_month').removeClass('border-danger');
	        		$('#birth_month').addClass('border-succes');

	        		$('#birth_year').removeClass('border-danger');
	        		$('#birth_year').addClass('border-succes');

	        		$('#age').addClass('border-danger');
	        	}
	        	else {
	        		$('#gender').removeClass('border-danger');
	        		$('#gender').addClass('border-succes');

	        		$('#birth_month').removeClass('border-danger');
	        		$('#birth_month').addClass('border-succes');

	        		$('#birth_year').removeClass('border-danger');
	        		$('#birth_year').addClass('border-succes');

	        		$('#age').removeClass('border-danger');
	        		$('#age').addClass('border-succes');

	        		$(this).addClass('d-none');
	        		$('.btnSubmit').removeClass('d-none');
	        		$('#intro_video').trigger('pause');
	        		setTimeout(function() {
		        		var my_number = '';
			        	$('.odometer-value').each(function(index, el) {
			        		var odometer_value = $.trim($(this).html());
			        		my_number = my_number.concat(odometer_value);
			        	});
			        	$('.my_number').val(my_number);
		        	}, 2000);
		        	$('#other_information_box').slideToggle('slow', function(){ });
	        	}
	        });
	        var my_number = '<?php echo $my_number; ?>';
	        if (my_number == '') {
	        	$("#myModal").modal();
	        }
		});
		function playVideo() {
            $('#intro_video').trigger('play');
            $('.media-section-content').addClass('top7p');
            setTimeout(function() {
	        	$('.media-section-content').addClass('top7p');
	        }, 22000);
        }
        function pauseVideo() {
            $('#intro_video').trigger('pause');
        }
        function random_int(min, max) {
	    	return Math.floor(Math.random() * (max - min + 1) + min);
	  	}

        setTimeout(function(){
	       odometer.innerHTML = random_int(10000000000, 999999999999);
		}, 1000);

		setInterval( function() {
				if($('.btnSubmit').hasClass('d-none')) {
					console.log('testing...');
					document.getElementById("odometer").innerHTML = random_int(100000000000,199999999999);
				}
	  		},2500
	  	);

		


	</script>
	<script>
        
    </script>
</html>