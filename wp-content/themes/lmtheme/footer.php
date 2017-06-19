<footer class="section section-prefooter">
    <div class="container py4">
        <?php if( have_rows('address', 'option') ): ?>
            <?php while( have_rows('address', 'option') ): the_row(); ?>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="mt0 pb2"><?php the_sub_field('country'); ?></h4>
                        </div>
                        <div class="col-sm-7">
                            <p><?php the_sub_field('full_address'); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="col-sm-4">
            <div class="footer-logo text-right">
                <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-footer-fitch.png" alt=""></a>
            </div>
        </div>
    </div>
</footer>
<footer class="section section-footer">
    <div class="container pt4 pb3">
        <div class="footer-copy pull-left">
            Copyright &copy; <?php echo date("Y") ?> Light Source Digital T/A Montgomery Fitch. All Rights Reserved.
            <?php hybrid_get_menu( 'secondary' );  ?>
        </div>
        <div class="footer-social pull-right">
            <?php if( have_rows('links', 'option') ): ?>
                <?php while( have_rows('links', 'option') ): the_row(); ?>
                    <a target="_blank" href="<?php the_sub_field('link'); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-<?php the_sub_field('media'); ?> fa-stack-1x"></i>
                        </span>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>