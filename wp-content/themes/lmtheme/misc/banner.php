<?php
    $sylesbanner = "";
    if( get_field('banner_bg_img') ) {
    $sylesbanner = "background-image: url(" . get_field('banner_bg_img') . ")";
} ?>


<div class="banner <?php echo $banner_class; ?>" style="<?php echo $sylesbanner; ?>">

    <div class="container">
        <div class="banner-intro">

            <h1>
                <?php if( get_field('banner_title') ) : ?>
                    <?php the_field('banner_title'); ?>
                <?php else: ?>
                    <?php the_title(); ?>
                <?php endif; ?>
            </h1>

            <?php if( get_field('banner_excerpt') ) : ?>
                <p><?php the_field('banner_excerpt'); ?></p>
            <?php endif; ?>
        </div>
    </div>

</div>



