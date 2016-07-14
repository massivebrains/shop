	<?php $this->load->view('frontend/includes/head') ?>
	<body>
		<div id="mainContainer">
			<?php $this->load->view('frontend/includes/links')  ?>
			<div id="HomeCarousel"></div>
			<div class="wrapper">

				<div id="mainContent">
					<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/templates/common-html5/js/listing9682.js"></script>
					<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/templates/common-html5/js/jquery.responsive.tabs.min9682.js"></script>

					<section id="listing0" itemscope itemtype="">
						<form enctype="multipart/form-data" method="post" action="#" name="add" id="add">
							<input type="hidden" name="item_id" value="9" />
							<input type="hidden" name="itemid" value="SAMPLE-1009" id="itemid" />
							<input type="hidden" name="category_id" value="7" />


							<div class="breadcrumbs">
								<a id='catCrumbHomeLink' href='#'>Home</a> > 
								<a href='#'><?=get_cell(TABLE_CATEGORIES, array('id'=>$product->category_id), 'name'); ?></a>  >  <?=$product->name ?>
							</div>

							<div class="clear"></div>

							<div class="primary">
								<div id="mediaContainer">

									<div id="mediaBlock">
										<!--START: image1-->
										<div class="main-image">
                      <?php (empty($product->image) ? ($image = 'product.png'): ($image = $product->image)) ?>
											<a href="#">
												<img itemprop="image" src="<?=PRODUCTS_IMAGE_DIR.$image ?>" align="middle" id="large" name="large" alt="<?=$product->name ?>" />
											</a>
											<div name="imagecaptiont" title="<?=$product->name ?>" id="imagecaptiont" class="item"><h4><?=$product->name ?></h4></div>
										</div>
										<!--END: image1-->

										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="secondary">
								<h1 itemprop="name" class="page_headers"><?=$product->name ?></h1>

								<!--START: totalrating-->
								<div class="totalrating" itemprop="aggregateRating" itemscope itemtype="#">
									<div class="stars">
										<img src="<?php echo base_url() ?>assets/frontend/templates/common-html5/images/star5.png" alt="review">
									</div>
									<div class="review-count" itemprop="reviewCount">
										<a href="javascript:void(0);" onclick="viewTabs();jQuery('#rTabs').responsiveTabs('activate', 1);">1 Review(s)</a>                 </div>
										<div class="review_average" itemprop="ratingValue">5</div>
									</div>
									<!--END: totalrating-->


									<div class="clear"></div>
									<div class="prodBox">
										<ul class="availabilityInfo">
											<li id="availability">In Stock.</li>
											<!--<li class="freeshippingblock">Free Shipping.</li> -->
											<li class="product-id">Product Code:<span id="product_id"><?=$product->sku ?></span></li>
										</ul>

										<div class="pricingBlock" itemprop="offers" itemscope itemtype="#">
											<link itemprop="availability" href="#" />
											<div class="yourprice price">Price:<span itemprop="price" id="price"><?=APP_CURRENCY.' '.number_format($product->selling_price,2) ?></span></div>
											<!--<div class="retailprice">Retail Price:<span>$25</span></div>
											<div class="savings">You Save:<span>$8</span><span>(32%)</span></div> -->

											<div class="clear"></div>
										</div>

									</div>

									<div id="divOptionsBlock">

										<div class="header">
											<h3>Choose Options</h3>
											<div class="clear"></div>
										</div>
										<div class="container">

											<!--<div class="opt-regular">
											<span class="label"><span class="required">*</span>Size</span>

											<div class="opt-field Size">
											<?php //for($i = 0; $i<=4; $i++): ?>
											<div class="radio-format">
											<input type="radio" name="option-7-9" id="radio-26" value="26"  />
											<div class="radio-option" data-group="option-7-9" title="XS" id="26" onclick="document.getElementById('radio-26').checked=true;validateValues(document.add,1);selectOption(document.getElementById('radio-26'));">
											<span class="XS">XS </span>
										</div>
										<div class="clear"></div>
									</div>
									<?php //endfor ?>

								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>


							<div class="opt-regular">
							<span class="label"><span class="required">*</span>Color</span>

							<div class="opt-field Color">
							<div class="radio-format">
							<input type="radio" name="option-8-9" id="radio-31" value="31"  />
							<div class="radio-option" data-group="option-8-9" title="Pink" id="31" onclick="document.getElementById('radio-31').checked=true;validateValues(document.add,1);selectOption(document.getElementById('radio-31'));">

							<span class="Pink">Pink </span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div> -->
			<div class="">
				No options available for this product.
			</div>
			<div class="clear"></div>
			<input type="hidden" name="std_price" value="17">

		</div>

	</div>

	<div class="detail-section">
		<div class="alpha-col">
			<div class="addToCartBlock">
				<div class="qtybox-addcart">
					<!--START: qtybox-->
					<label>Quantity</label>
					<input type="text"  name="qty" id="<?=$product->sku ?>" value="1" size="3" class="txtBoxStyle">
					<!--END: qtybox-->
					<button type="button" id="Add" class="btn" onclick="addToCart('<?=$product->sku ?>')"><span>Add to Cart</span></button>
					<div class="clear"></div>
				</div>

				<!--START: quantity-->
				<!--
				<div class="quantityBlock">
				<a href="javascript:void(0);" id="showQtyTable">Quantity Pricing</a>
				<div class="clear"></div>
				<div class="quantity-table">
				<div class="title-header">Quantity</div>
				<div class="title-header-price">Price</div>
				<div class="clear"></div>
				<ul>

				<li>3 - 5</li>
				<li class="qtyPrice">$15</li>

				<li>6 - 10</li>
				<li class="qtyPrice">$14</li>

				<li>11+</li>
				<li class="qtyPrice">$14</li>

			</ul>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	-->
	<!--END: quantity-->
	<div class="clear"></div>
	<!--START: reminders_block--><!--END: reminders_block-->
	</div>
	<!--START: reward_redeem--><!--END: reward_redeem-->
	</div>
	<!--END: addtocart-->
	<div class="beta-col">
		<!--START: create_first_review--><!--END: create_first_review-->
		<!--START: create_review_link-->
		<div class="createReviewLink">
			<button type="button" class="btn accent-bg-color" onclick="javascript:;"><span><i class="icon-star"></i> Write a Review</span></button>

		</div>
		<!--END: create_review_link-->
		<!--START: addWishlist-->
		<div class="addWishlist">
			<button type="button" class="btn accent-bg-color" onclick="javascript:;">
				<span><i class="icon-heart"></i> Add to Wish List</span>
			</button>

		</div>


	</div>
	<div class="clear"></div>
	</div>


	<div class="clear"></div>
	<div class="extrafieldsBlock"></div>
	</div>
	<div class="clear"></div>
	<div class="prodWrapper">
		<div class="wrapper">

			<?php  //$this->load->view('frontend/home/related-items') ?>
			<div class="clear"></div>

			<div id="rTabs">
				<ul>
					<!--START: extended_description-->
					<li><a href="#tab-1">Description</a></li>
					<!--END: extended_description-->
					<li id="reviewsTab" style="display:none;"><a href="#tab-2">Customer Reviews</a></li>

				</ul>
				<div id="tab-1">
					<div class="item" itemprop="description">
						<div class="">
							<?=$product->description ?>
						</div>
					</div>
				</div>
				<!--START: reviews-->
				<div id="tab-2">
					<script type="text/javascript">
					jQuery(function() {
						jQuery('#reviewsTab').show();
					});
					</script>
					<div class="button right"></div>
					<div class="clear"></div>
					<div class="reviewsBlock" itemprop="review" itemscope itemtype="#">
						<!--START: user_reviews-->
						<div class="user_reviews">
							<div class="star-rating"><img src="<?php base_url() ?>assets/frontend/templates/common-html5/images/star5.png" alt="5 Stars" /></div>
							<div class="review-info">
								<div class="review-shortDesc" itemprop="name">Awesome Tee</div>
								<div class="review-longDesc" itemprop="description">This product is really nice.</div>
								<!--START: rev_allowratings-->
								<div class="rev_allowratings"> Did you find this helpful?&nbsp;
									<input type="button" value="Yes" onclick="" />
									<input type="button" value="No" onclick="" />
									<span id="spnReview3"><strong>2&nbsp;of&nbsp;2</strong>&nbsp;<em>Found Helpful</em><!--END: rev_helpcount--></span>
								</div>

								<div class="clear"></div>
								<em class="reviewed-by">Reviewed by:&nbsp;<span itemprop="author">#</span>#.
									<!--START: user_email-->
									<a href="mailto:"></a>
									<!--END: user_email-->
									on 11/26/2015</em>
									<div style="display: none;" itemprop="reviewRating" itemscope itemtype="#"> <span itemprop="ratingValue">5</span>/<span itemprop="bestRating">5</span> </div>
								</div>
								<div class="clear"></div>
							</div>
							<!--END: user_reviews-->
						</div>
					</div>
					<!--END: reviews-->

				</div>


				<div class="clear"></div>

			</div>
		</div><!-- end prodWrapper -->
	</form>
	</section>
	</div>
	<!--START: RIGHT BAR--><!--START: FRAME_CATEGORY--><!--END: FRAME_CATEGORY--><!--END: RIGHT BAR-->
	<div class="clear"></div>
	</div>
  <script type="text/javascript" src='<?php echo base_url('assets/frontend/singlejs.js') ?>'>

  </script>
	<?php $this->load->view('frontend/includes/footer') ?>
	</div>
	</body>
	</html>
