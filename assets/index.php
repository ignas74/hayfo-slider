
<div class="hfo-slider">
    <?php foreach ( $products as $product ) : ?>
        <div class="hfo-single-product">
            <a href="<?php echo esc_url( $product->get_permalink() );?>">
                <?php echo $product->get_image();?>
            </a>
            <span><?php echo esc_html( $product->get_title() ); ?></span>
            <span><?php echo esc_html( $product->get_price() ); ?></span>
        </div>
    <?php endforeach; ?>
</div>
