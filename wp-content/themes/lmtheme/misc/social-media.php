<ul class="social-media">
    <?php if( get_field('social_facebook', 'option') ) :?>
        <li class="facebook">
            <a href="<?php the_field('social_facebook', 'option'); ?>" title="Facebook" target="_blank"><i class="icon icon-facebook "></i></a>
        </li>
    <?php endif; ?>
    <?php if( get_field('social_twitter', 'option') ) :?>
        <li class="twitter">
            <a href="<?php the_field('social_twitter', 'option'); ?>" title="Twitter" target="_blank"><i class="icon icon-twitter"></i></a>
        </li>
    <?php endif; ?>
    <?php if( get_field('social_instagram', 'option') ) :?>
        <li class="instagram">
            <a href="<?php the_field('social_instagram', 'option'); ?>" title="Instagram" target="_blank"><i class="icon icon-instagram"></i></a>
        </li>
    <?php endif; ?>
    <?php if( get_field('social_youtube', 'option') ) :?>
        <li class="youtube">
            <a href="<?php the_field('social_youtube', 'option'); ?>" title="Youtube" target="_blank"><i class="icon icon-youtube"></i></a>
        </li>
    <?php endif; ?>
</ul>