<div class="hfo-slider">
    
    <?php foreach( $products as $product ) : ?>

        <?php
            $current_price = get_post_meta($product->get_id(), '_price');
        ?>
    
        <div class="hfo-single-product">
            <a href="<?php echo esc_url( $product->get_permalink() );?>">
                <?php echo $product->get_image();?> <!-- image comes with <img> tag from Woocommerce -->
            </a>

            <div class="hfo-product-details">
                <span class="product-title">
                    <?php echo esc_html( $product->get_title() ); ?>
                </span>

                <?php if( ! $product->is_on_sale() ) : ?>

                    <?php echo 'normal' . '<br>'; ?>
                    <span class="current-price">
                        <?php echo 'current price: ' .  $current_price[0] ?>
                        <?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
                    </span>
                    
                    <?php var_dump( $current_price ); ?>
                <?php elseif ( $product->is_on_sale() && count( $current_price ) > 1 ) : ?>


                    <?php echo 'from - to' . '<br>'; ?>
                    <span class="current-price">
                        <?php echo 'current price: ' .  $current_price[0] ?>
                        <?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
                    </span>
                    <span class="second-price">
                        <?php echo 'current second: ' . $current_price[1] ?>
                        <?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
                    </span>

                <?php else:  ?>
                
                    <?php echo 'discount' . '<br>'; ?>
                    <span class="current-price">
                        <?php echo 'current price: ' .  $current_price[0] ?>
                        <?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
                    </span>
                    <span class="regular-price">
                        <?php echo 'get_regular: ' .  esc_html( $product->get_regular_price() ); ?>
                        <?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
                    </span>

                <?php endif;  ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
