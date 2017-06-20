<?php
/**
 * Template Name: Homepage
 */

get_header(); // Loads the header.php template. ?>

<?php if( have_rows('banner', 'option') ): ?>
    <section class="section section-banner">
        <div class="owl-carousel">
            <?php while( have_rows('banner', 'option') ): the_row(); ?>
                <div class="owl-slide" style="background-image: url('<?php the_sub_field('image'); ?>')">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5">
                                <h1><?php the_sub_field('heading'); ?></h1>
                                <p><?php the_sub_field('body'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="container">
            <?php if(get_field('quote_form')) : ?>
            <div class="styled-conversion">
                <h2><?php echo get_field('quote_heading'); ?></h2>
                <?php echo (get_field('quote_body')) ? '<p>'.get_field('quote_body').'</p>' : ''; ?>
                <?php echo do_shortcode(get_field('quote_form')); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if(have_rows('brands')) : $rowctr = 1; ?>
    <section class="section section-brands">
        <div class="container">
            <div class="row py3">
                <?php while(have_rows('brands')): the_row(); ?>
                <img class="brand-img" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('brandname'); ?>">
                <?php $rowctr++; endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(get_field('feature_heading')) : ?>
    <section class="section section-feature">
        <div class="container py4">
            <div class="section-heading">
                <h2><?php echo get_field('feature_heading'); ?></h2>
                <p><?php echo get_field('feature_body'); ?></p>
                <?php if(get_field('feature_link')) : ?>
                    <?php echo (get_field('featurette')) ? '<div class="featurette">'.get_field('featurette').'</div>': ''; ?>
                    <a class="btn btn-default btn-toggler" href="#" target="_self"><?php echo get_field('feature_link'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(get_field('works_heading')) : ?>
    <section class="section section-works">
        <div class="container pt4 pb2">
            <div class="section-heading">
                <h2><?php echo get_field('works_heading'); ?></h2>
                <p><?php echo get_field('works_body'); ?></p>
            </div>
            <div class="row">
                <?php $sequence = 0; $dataid = 0; while(have_rows('works')): the_row(); ?>
                    <div class="col-sm-6 col-md-3 mb3" data-id="<?php echo $dataid+=1; ?>" data-sequence="<?php echo $sequence+=300; ?>">
                        <div class="the-works text-center p2">
                            <div class="icon-the-works py2">
                                <i class="icon icon-<?php the_sub_field('icon'); ?>"></i>
                            </div>
                            <h4><?php the_sub_field('heading'); ?></h4>
                        </div>
                    </div>
                <?php $rowctr++; endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<hr>

<?php if(get_field('services_heading')) : ?>
    <section class="section section-services">
        <div class="container py4">
            <div class="section-heading">
                <h2><?php echo get_field('services_heading'); ?></h2>
            </div>
            <div class="row">
                <?php $sequence = 0; $dataid = 0; while(have_rows('services')): the_row(); ?>
                    <div class="col-sm-6 col-md-4 mb3" data-id="<?php echo $dataid+=1; ?>" data-sequence="<?php echo $sequence+=300; ?>">
                        <div class="the-services text-center p3">
                            <div class="icon-the-services py2">
                                <i class="icon icon-<?php the_sub_field('icon'); ?>"></i>
                            </div>
                            <h4><?php the_sub_field('heading'); ?></h4>
                            <p class="mb0"><?php the_sub_field('body'); ?></p>
                        </div>
                    </div>
                <?php $rowctr++; endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(get_field('review_heading')) : ?>
    <section class="section section-reviews">
        <div class="container">
            <div class="row py4">
                <div class="col-sm-6">
                    <h2 class="pb3"><?php echo get_field('review_heading'); ?></h2>
                    <a href="#" target="_self" class="btn btn-default">Contact Us</a>
                </div>
                <?php query_posts('post_type=review&post_status=publish&posts_per_page=3'); ?>
                <?php if(have_posts()) : ?>
                    <div class="col-sm-6">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="fitch-review-item">
                                <div class="fitch-rating">
                                    <label for=""><?php the_title(); ?></label>
                                    <?php $stars = explode( ',', get_field('stars')); ?>
                                    <div class="rating">
                                        <?php
                                        $length = count($stars);
                                        for ($i = 0; $i < $length; $i++) {
                                            echo '<span class="star '.$stars[$i].'"></span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="fitch-review-copy">
                                    <?php echo get_the_content(); ?>
                                </div>
                                <?php if ($wp_query->current_post +1 != $wp_query->post_count) : ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; wp_reset_query();?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(get_field('best_field_heading')) : ?>
    <section class="section section-best-field">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 best-field-bg">
                    <div class="leaders-holder">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-leaders-fitch.png" alt="">
                    </div>
                </div>
                <div class="col-sm-6 best-field-content">
                    <h2 class="mb3"><?php echo get_field('best_field_heading'); ?></h2>
                    <p><?php echo get_field('best_field_body'); ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(get_field('location')) : ?>
    <section class="section section-location">
        <div class="container py4">
            <div class="location-holder py2 pull-right">
                <?php echo get_field('location'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if(get_field('get_started_form')) : ?>
    <section class="section section-get-started">
        <div class="container py4">
            <div class="section-heading">
                <?php echo (get_field('get_started_heading')) ? '<h2>'.get_field('get_started_heading').'</h2>' : '' ?>
                <?php echo (get_field('get_started_body')) ? '<p>'.get_field('get_started_body').'</p>' : '' ?>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="get-started-holder py2 text-center">
                    <?php echo do_shortcode(get_field('get_started_form')); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); // Loads the footer.php template. ?>