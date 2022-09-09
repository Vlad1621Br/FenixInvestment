<?php
if (get_locale() == 'ru_RU') {
$p_id = 2;
} else if (get_locale() == 'en_GB') {
$p_id = 81;
} else {
$p_id = 83;
}
?>
<section id="faq_list" class="pb-96">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title_section line_left_title ps-4 mb-4"><?php pll_e('title_faq'); ?></div>
                <div class="mb-md-5 h6 mb-4"><?php pll_e('subtitle_faq'); ?></div>
                <?php if( have_rows('faq_list', $p_id) ):
                $i=1;while ( have_rows('faq_list', $p_id) ) : the_row();
                ?>
                <div id="accordeon-parent-block_<?=$i;?>" class="accordeon-block col-12">
                    <div class="name-tab num-one strong fs-18 d-flex align-items-center">
                        <div class="accordeon_num me-md-4 me-3">0<?=$i;?>/</div>
                        <?php the_sub_field('ask', 2); ?>
                        <div class="plus_minus"></div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="accordeon-info" style="display: none;">
                            <div class="accordeon-info-wrapper">
                                <?php the_sub_field('answer', 2); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;endwhile;endif; ?>
            </div>
        </div>
    </div>
</section>