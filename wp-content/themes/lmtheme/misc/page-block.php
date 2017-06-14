<?php if( have_rows('pb_block_item', 'option') ): ?>

    <div class="clearfix">

        <?php while( have_rows('pb_block_item', 'option') ): the_row(); ?>

            <?php
                $pb_block_class = "";
                $pb_block_title = "";
                $pb_block_style = "";
                $pb_block_btn = "";

                if( get_sub_field('pb_block_container_column', 'option') == 'Two' ) {
                    $pb_block_class = "col-md-8 block block-reason";
                    $pb_block_btn = "btn-primary";
                    $pb_block_title = "<h2>". get_sub_field('pb_block_title', 'option') ."</h2>";
                } else {

                    $pb_block_btn = "btn-white";
                    $pb_block_class = "col-md-4 block";
                    $pb_block_title = "<h3>". get_sub_field('pb_block_title', 'option') ."</h3>";
                }


                if ( get_sub_field('pb_block_bg_color', 'option') ) {
                    $pb_block_style .= "background-color:". get_sub_field('pb_block_bg_color', 'option') .";";
                }

                if ( get_sub_field('pb_block_background', 'option') ) {
                    $pb_block_style .= "background-image:url(". get_sub_field('pb_block_background', 'option') .")";
                }
            ?>

            <div class="<?php echo $pb_block_class; ?>" style="<?php echo $pb_block_style; ?>">
                <?php
                    if( get_sub_field('pb_block_icon') ) { ?>
                        <i class="icon <?php the_sub_field('pb_block_icon'); ?>"></i><?php
                    }
                ?>
                <?php echo $pb_block_title; ?>
                <?php the_sub_field('pb_block_content'); ?>

                <?php if( get_sub_field('pb_block_button_label') ) { ?>
                    <a href="<?php echo get_sub_field('pb_block_button_link'); ?>" class="btn <?php echo $pb_block_btn;?>"><?php echo get_sub_field('pb_block_button_label'); ?></a>
                <?php } ?>

            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>