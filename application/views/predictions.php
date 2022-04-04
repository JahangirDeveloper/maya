<?php 
	$language = $this->session->userdata('language');
	$direction = $this->session->userdata('direction');
	$lng = $this->session->userdata('lng');
	$is_login = $this->session->userdata('is_login');
?>
<!DOCTYPE html>
<html lang="<?php echo $lng; ?>">
	<?php $this->load->view('common/head'); ?>
	<style>
		.text_blur {
			color: transparent;
     		text-shadow: #111 0px 0px 4px;
		}
		p {
			margin-bottom: 0px !important;
		}
	</style>	
	<body>
		<?php $this->load->view('common/header'); ?>
		<audio id="predictionaudio" src="<?php echo base_url().'uploads/videos/predictionaudio.wav';?>" style="visibility: hidden;"></audio>
		<audio id="predictionresult" loop src="<?php echo base_url().'uploads/videos/predictionresult.wav';?>" style="visibility: hidden;"></audio>
		<header id="btnWrappers" class="d-none" style="position: absolute;text-align: center;width: 100%;top: 20px;z-index: 999">
			<form action='#!' enctype="multipart/form-data" class="position-relative" method="post" accept-charset="utf-8" id="predition_form">
				<div class="container">
					<?php if($is_paid == 'yes') { ?>
						<button type="button" class="btn btn-link d-inline-block text-success"><i class="fa fa-check"></i> PAID</button>
					<?php } else { ?>
						<a href="<?php echo base_url().'Maya/buy/'; ?>" class="btn btn-primary btn-sm btnPayToSeeAll d-none">PAY TO SEE ALL PREDICTIONS</a>
						<button type="button" class="btn btn-warning btn-sm btnAcceptTerms">Accept Cookies and Terms & Conditions</button>
					<?php } ?>
				</div>
			</form>
		</header>
		<main id="main" style="background-image: url('<?php echo base_url().'assets/img/bg-jungle.jpg'; ?>');">
			
			<section class="media-bg">
				<div class="video_box">
					<video id="prediction_video" autoplay muted style="height: auto;width: 100vw;">
					  <source src="<?php echo base_url().'uploads/videos/mayan720pFull.mp4';?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
				</div>
				<div class="media-section-content">
					<div class="content-box text-center container" style="max-width: 90%;display: none">
						
						<section class="prediction_box" style="">
							<div class="prediction_box_inner" style="padding-bottom: 15px;display: none;">
							<?php 
								$counter = 1;
								$showing_counter = 1;
								foreach ($records as $value) { 
								?>
								<div class="row single_prediction position-relative box_shadow">
									<div class="black_overlay opecity_0_7" style="background: #ede6e6 !important;"></div>
									<div class="col-lg-12 col-md-12 col-sm-12 text-left p-2">
										<h5 class="font-weight-bold" style="font-size: 14px"><?php echo '('.$counter.') '.$value['category_title'];  ?></h5>
										<div class="">
											<?php
												if($is_paid == 'yes'){
													echo $value['randomPrediction']['title'];
												} 
												else {
													if($counter <= 5){
												        echo $value['randomPrediction']['title'];
												        $showing_counter++;
												    }
												    elseif($showing_counter > 5) {
												        $string = explode(" ", $value['randomPrediction']['title']);
												        $first_part = implode(" ", array_splice($string, 0, 5));
												        echo $first_part.' ';
												        $blur_words = random_int(15, 20);
												        for ($i = 0; $i < $blur_words; $i++) {
												        	$image_name = random_int(1, 11);
												        	$image_name = $image_name.'.png';
												        	echo '<img src="'.base_url().'assets/img/'.$image_name.'" alt="blur text">';
												        }
												        
												    }
												}
											    $counter++;
											?>
										</div>
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
		<?php $this->load->view('common/footer'); ?>
		<?php $this->load->view('common/script'); ?>
	</body>
	<script>
		$(document).ready(function($) {
	        var predictionaudio = document.getElementById("predictionaudio");
	        predictionaudio.play();
		        setTimeout(function() {
		        	if (!$('.prediction_box_inner').hasClass('opened')) {
		        		$('.prediction_box_inner').addClass('opened');
		        		$('.content-box').slideToggle( '3000', function(){ });
		        		$('.prediction_box_inner').slideToggle( '3000', function(){ });
		        	}
		        	var predictionresult = document.getElementById("predictionresult");
		        	predictionresult.play();
		        	$('#btnWrappers').removeClass('d-none');
		        }, 28*1000);

	        $(document).on('click', '.btnAcceptTerms', function(event) {
	        	event.preventDefault();
	        	/* Act on the event */
	        	$(this).toggleClass('btn-warning');
	        	$(this).toggleClass('btn-success');
	        	if ($(this).hasClass('btn-success')) {
	        		$(this).html('Cookies and Terms & Conditions Accepted <i class="fa fa-check"></i>');
	        		$('.btnPayToSeeAll').toggleClass('d-none');
	        	}
	        	else {
                   $(this).html('Accept Cookies and Terms & Conditions');
                   $('.btnPayToSeeAll').toggleClass('d-none');
	        	}

	        });
		});
        
	</script>
	<script>
        
    </script>
</html>