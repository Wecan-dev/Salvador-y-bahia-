<div class="edge-vertical-split-slider">
    <?php if($custom_sidebar !== ''){ ?>
        <div class="edge-vertical-split-slider-widget-area">
            <?php dynamic_sidebar($custom_sidebar); ?>
        </div>
    <?php } ?>
    <?php echo do_shortcode($content); ?>
</div>