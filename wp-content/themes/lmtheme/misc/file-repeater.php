<?php

// check if the repeater field has rows of data
if( have_rows('file_repeater') ): ?>

    <div class="audio-list">

        <?php

        while ( have_rows('file_repeater') ) : the_row(); ?>

            <div class="file-item">

                <?php if( get_sub_field('file_type') == 'Audio' ) : ?>

                    <a class="file-title" href="<?php the_sub_field('audio_file'); ?>" target="_blank">
                        <?php the_sub_field('file_title'); ?>
                    </a>


                    <?php if( get_sub_field('file_link') ) : ?>
                        <audio src="<?php the_sub_field('file_link'); ?>" type="audio/mp3" controls="controls">
                    <?php endif; ?>

                <?php endif; ?>

                <?php if( get_sub_field('file_type') == 'PDF' || get_sub_field('file_type') == 'Link' ) : ?>

                    <a class="file-title" href="<?php the_sub_field('file_link'); ?>" target="_blank">
                        <?php if( get_sub_field('file_type') == 'PDF' ) : ?>
                            <i class="icon icon-download-svg"></i>
                        <?php else: ?>
                            <i class="icon icon-link-svg"></i>
                        <?php endif; ?>
                        <?php the_sub_field('file_title'); ?>
                    </a>

                <?php endif; ?>

                <?php if( get_sub_field('file_type') == 'iframelink' ) : ?>

                    <h2 class="file-title"><?php the_sub_field('file_title'); ?></h2>

                    <?php if( get_sub_field('file_link') ) : ?>
                        <iframe src="<?php the_sub_field('file_link'); ?>" frameborder="0"></iframe>
                    <?php endif; ?>

                <?php endif; ?>

            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>

