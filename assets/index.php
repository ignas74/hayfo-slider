<div class="container">
    <button class="handle left-handle">
        <div class="text">&#8249;</div>
    </button>
    
    <div class="slider">
        <?php foreach ( $products as $product ) : ?>
            <div class="single-product">
                <a href="<?php echo esc_url( $product->get_permalink() );?>">
                    <?php echo $product->get_image();?>
                </a>
                <span><?php echo esc_html( $product->get_title() ); ?></span>
                <span><?php echo esc_html( $product->get_price() ); ?></span>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="handle right-handle">
        <div class="text">&#8250;</div>
    </button>
</div>
