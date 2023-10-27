<div class="hfo-container">
    <button class="hfo-handle hfo-left-handle">
        <div class="hfo-text">&#8249;</div>
    </button>
    
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

    <button class="hfo-handle hfo-right-handle">
        <div class="hfo-text">&#8250;</div>
    </button>
</div>
