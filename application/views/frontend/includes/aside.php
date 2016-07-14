    <aside id="rightBar" class="rightBar">
      <div class="column" id="column2">
        <div id="modPrice" class="module"> <span class="menu-headers">Browse by <span>Price</span></span>
          <ul>
            <li><a href="<?=site_url('search-by-price/1') ?>" class="cat"><?=APP_CURRENCY ?>0 - <?=APP_CURRENCY ?>50</a></li>
            <li><a href="<?=site_url('search-by-price/2') ?>" class="cat"><?=APP_CURRENCY ?>50 - <?=APP_CURRENCY ?>100</a></li>
            <li><a href="<?=site_url('search-by-price/3') ?>" class="cat"><?=APP_CURRENCY ?>100 - <?=APP_CURRENCY ?>200</a></li>
            <li><a href="<?=site_url('search-by-price/4') ?>" class="cat"><?=APP_CURRENCY ?>200 - <?=APP_CURRENCY ?>500</a></li>
            <li><a href="<?=site_url('search-by-price/5') ?>" class="cat"><?=APP_CURRENCY ?>500 - <?=APP_CURRENCY ?>1000</a></li>
            <li><a href="<?=site_url('search-by-price/6') ?>" class="cat"><?=APP_CURRENCY ?>1000 - <?=APP_CURRENCY ?>2000</a></li>
            <li><a href="<?=site_url('search-by-price/7') ?>" class="cat">Over <?=APP_CURRENCY ?>2000</a></li>
          </ul>
        </div>
        </div>

              <div class="clear"></div>

              <?php if(!empty($new_products)): ?>
                <div id="modNewReleases" class="module">
                  <span class="menu-headers">New<span> Products</span></span>

                  <?php foreach($new_products as $row): ?>
                    <div class="info">
                     <div class="img">
                      <a href="<?php echo site_url('products/details/'.$row->sku) ?>" title="<?=$row->name ?>">
                      <?php (empty($row->image) ? ($image = 'product.png'): ($image = $row->image)) ?>
                        <img src="<?php echo PRODUCTS_IMAGE_DIR.$image ?>" alt="<?=$row->name ?>" width="205" height="205" />
                      </a>
                    </div>
                    <div class="name"><a href="<?php echo site_url('products/details/'.$row->sku) ?>" class="link"><?=$row->name ?></a></div>
                    <div class="stars"><img src="<?=base_url() ?>assets/frontend/templates/common-html5/images/star5.png" alt="<?=$row->name ?>" /></div>
                    <div class="price"><?=APP_CURRENCY.number_format($row->selling_price) ?></div>
                    <div class="clear"></div>
                  </div>
                <?php endforeach; ?>

                <div class="div"></div>
              </div>
            <?php endif; ?>

          </div>
        </aside>
