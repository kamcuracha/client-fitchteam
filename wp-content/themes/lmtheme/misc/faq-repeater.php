<?php

// check if the repeater field has rows of data
if( have_rows('faq_repeater') ): ?>

    <div class="panel-group faq-accordion" id="accordion" role="tablist" aria-multiselectable="true">

        <?php

        $faq_count = 1;

        while ( have_rows('faq_repeater') ) : the_row(); ?>


            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $faq_count?>">
                    <h4 class="panel-title">

                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $faq_count?>" aria-expanded="true" aria-controls="collapse<?php echo $faq_count?>">
                            <?php the_sub_field('faq_question'); ?>
                            <span class="icon icon-arrowdown-svg" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $faq_count?>" aria-expanded="true" aria-controls="collapse<?php echo $faq_count?>"></span>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?php echo $faq_count?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $faq_count?>">
                    <div class="panel-body">
                        <?php the_sub_field('faq_answer'); ?>
                    </div>
                </div>
            </div>
            <?php  $faq_count++; endwhile; ?>

    </div>

<?php endif; ?>