<?php $this->load->view('frontend/includes/head') ?>
<body>
	<div id="mainContainer">

		<?php $this->load->view('frontend/includes/links')  ?>

		<div id="HomeCarousel"></div>
		<div class="wrapper">

			<div id="mainContent">

				<section id="home">
					<script type="text/javascript">
					jQuery(function() {
						jQuery('.slideshow').appendTo('#HomeCarousel');
					});
					</script>


					<!--START: home_carousel-->
					<div class="slideshow">
						<div class="home-carousel">
							<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/templates/common-html5/css/flexslider9682.css" type="text/css" media="screen" />
							<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/templates/common-html5/js/jquery.flexslider-min9682.js"></script>

							<div id="homeCarousel" class="flexslider">
								<ul class="slides">
									<!--START: carousel-->
									<?php for($i = 1; $i<=5; $i++): ?>
									<li><a href="#"><img src="<?=base_url() ?>assets/frontend/images/slide<?=$i ?>.png" alt="" /></a></li>
								<?php endfor ?>

									<!--END: carousel-->
								</ul>
							</div>

							<script type="text/javascript" charset="utf-8">
							jQuery(document).ready(function() {
								jQuery('#homeCarousel').flexslider({
									animation: "slide",
									slideshowSpeed: 4000,
									controlNav: true,
									keyboard: false
								});
							});
							</script>
						</div>
					</div>
					<!--END: home_carousel-->



					<div class="featured-products">
						<!--START: FEATURE_MENU-->
						<div class="heading">
							<h2 class="header-specials">Featured<span> Products</span></h2>
						</div>
						<?php $this->load->helper('text') ?>
						<?php if(!empty($products)): ?>
							<div class="productBlockContainer columns-4">
								<?php $count = 1; $position = ''; ?>
								<?php foreach($products as $row): ?>
									<?php
									if($count % 4 == 1)
									$position = 'first-item';
									else if($count % 4 == 2 || $count % 4 == 3)
									$position = 'middle-item';
									else
									$position = 'last-item';

									?>
									<div class="product-container <?=$position ?>">
										<div class="product-item alternative">
											<div class="img">
												<?php (empty($row->image) ? ($image = 'product.png'): ($image = $row->image)) ?>
												<a href="<?php echo site_url('products/details/'.$row->sku) ?>"><img src="<?php echo PRODUCTS_IMAGE_DIR.$image ?>" alt="<?=$row->slug ?>" id="<?=$row->id ?>" /></a>
											</div>

											<div class="name"><a href="<?php echo site_url('products/details/'.$row->sku) ?>"><?=character_limiter(ucfirst(strtolower($row->name)), 15) ?></a></div>
											<div class="price">
												<span class="hidden">Your Price:&nbsp;</span><?=APP_CURRENCY.$row->selling_price ?>&nbsp;
											</div>
											<!-- <div class="status">Ships in 24hrs >>Free Shipping.</div> -->

											<div class="action">
												<input type="text" style="width:25px !important; padding:0 !important; margin:0 !important;" name="qty" id="<?=$row->sku ?>" value="1">
												<input type="button" value="Add To Cart" onclick="addToCart('<?=$row->sku ?>')" class="btn" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'" />
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<?php $count++; ?>
								<?php endforeach;  ?>

								<div style="clear: both;"></div>
							</div>
						<?php endif; ?>

						<div class="clear"></div>
					</div>
					<!--END: FEATURE_MENU-->


					<!--START: CATEGORY_FOOTER-->
					<link rel="stylesheet" href="<?=base_url() ?>assets/frontend/paginate.css" title="no title" charset="utf-8">
					<div class="category-footer" id="homeFooter">
						<?php echo $pagination; ?>
					</div>
					<!--END: CATEGORY_FOOTER-->
				</section>
			</div>
			<!-- end of main content -->




			<div class="clear"></div>

		</div>
		<?php $this->load->view('frontend/includes/footer') ?>
	</div>
</body>
</html>
