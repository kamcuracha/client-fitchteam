<?php if( get_field('f_video') ): ?>
<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item"  src="//<?php the_field('f_video'); ?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
</div>
<?php endif; ?>