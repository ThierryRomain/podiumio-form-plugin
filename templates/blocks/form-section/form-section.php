<?php
$title = get_field('title');
$shortcode = get_field('shortcode');
$preForm = get_field('pre_form');
$postForm = get_field('post_form');
$img = get_field('img');
?>

<div class="arrive-on-scroll">
    <div class="os-form-section" style="margin-top:10px;">
        <div class="os-form-section-question-wrapper">
            <h4><?php echo $title ?></h4>
            <div class="os-form-section-arrow-wrapper">
                <i class="fas fa-angle-down os-form-section-arrow"></i>
            </div>
        </div>
        <?php if(is_admin()): ?>
            <div class="os-form-section-answer-panel" style="display:block;">
        <?php else: ?>
            <div class="os-form-section-answer-panel">
        <?php endif; ?>
            <?php if($img): ?>
                <img src="<?php echo $img; ?>" class="os-form-section-preview" />
            <?php endif; ?>
            <div style="margin-top:20px;margin-bottom:20px;"><?php echo $preForm ?></div>
            <?php echo do_shortcode($shortcode);  ?>
            <div style="margin-top:20px;margin-bottom:20px;"><?php echo $postForm ?></div>
            </div>
    </div>
</div>
