<div class="hfo-slider">
    <?php foreach ( $products as $product ) : ?>
        <div class="hfo-single-product">
            <a href="<?php echo esc_url( $product->get_permalink() );?>">
            <!-- image comes with <img> tag from Woocommerce -->
                <?php echo $product->get_image();?>
            </a>
            <div class="hfo-product-details">
                <span><?php echo esc_html( $product->get_title() ); ?></span>
                <span>
                    <?php echo esc_html( $product->get_price() ); ?>
                    <?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
                </span>
            </div>
        </div>
    <?php endforeach; ?>
</div>
