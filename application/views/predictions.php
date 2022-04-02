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
					<video id="intro_video" controls autoplay muted style="height: auto;width: 100vw;">
					  <source src="<?php echo base_url().'uploads/videos/mayan720pFull.mp4';?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
					<div class="fully_transparent_overlay"></div>
				</div>
				<div class="media-section-content top7p">
					<div class="content-box text-center container" style="max-width: 90%;display: none">
						<div class="transparent_overlay"></div>
						<header class="box_shadow" style="border: 1px solid #fff;border-top-left-radius: 15px;border-top-right-radius: 15px;">
							<div class="transparent_overlay"></div>
							<form action='#!' enctype="multipart/form-data" class="position-relative" method="post" accept-charset="utf-8" id="predition_form">
								<div class="container">
									<?php if($is_paid == 'yes') { ?>
										<button type="button" class="btn btn-link d-inline-block text-success"><i class="fa fa-check"></i> PAID</button>
									<?php } else { ?>
										<button type="button" class="btn btn-primary d-inline-block">PAY TO SEE ALL PREDICTIONS</button>
									<?php } ?>
								</div>
							</form>
						</header>
						<section class="prediction_box" style="">
							<div class="prediction_box_inner" style="padding-bottom: 15px;display: none;">
							<?php 
								$counter = 1;
								$showing_counter = 0;
								foreach ($records as $value) { $stars ='';?>
								<div class="row text-white single_prediction position-relative mb-3 box_shadow">
									<div class="black_overlay opecity_0_7"></div>
									<div class="col-lg-12 col-md-12 col-sm-12 text-left">
										<h5 class="text-white"><?php echo '('.$counter.') '.$value['category_name'];  ?></h5>
										<p class="text-white">
											<?php
												if($is_paid == 'yes'){
													echo $value['prediction'];
												} 
												else {
													if($counter <= 5){
												        echo $value['prediction'];
												        $showing_counter++;
												    }
												    elseif($counter % 2 != 0 && $showing_counter <= 5) {
												        

												        $string = explode(" ", $value['prediction']);
												        $string_words = sizeof($string);
												        $first_part = implode(" ", array_splice($string, 0, 5));
												        $remaining_words = ($string_words - 5);
												        for ($i = 1; $i <= $remaining_words; $i++) {
												        	$stars .='*';
												        }
												        echo $first_part.' '.$stars;
												    }
												}
												
											    $counter++;
											?>
										</p>
									</div>
									<div class="clearfix"></div>
								</div>
							<?php } ?>

							</div>
							
						</section>
					</div>
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
	        $(document).on('click', '.btnShowPredictions', function(event) {
	        	$('.prediction_box_inner').slideToggle( 'slow', function(){ });
	        	$('.prediction_box_inner').addClass('opened');
	        });
	        setTimeout(function() {
	        	if (!$('.prediction_box_inner').hasClass('opened')) {
	        		$('.prediction_box_inner').addClass('opened');
	        	}
	        	$('.content-box').slideToggle( '3000', function(){ });
	        	$('.prediction_box_inner').slideToggle( '3000', function(){ });
	        }, 28*1000);
	        
		});
		function playVideo() {
            $('#intro_video').trigger('play').css('property', 'value');
            $('.btnStartStop').trigger('click');
        }
        function pauseVideo() {
            $('#intro_video').trigger('pause');
        }
        $('.btnShowPredictions').trigger('click');
	</script>
	<script>
        
    </script>
</html>