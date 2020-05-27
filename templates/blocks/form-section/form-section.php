<?php
$title = get_field('title');
$shortcode = get_field('shortcode');
$preForm = get_field('pre_form');
$postForm = get_field('post_form');
$img = get_field('img');
?>

<div class="arrive-on-scroll">
    <?php if(get_field('required')): ?>
        <div class="os-form-section important-section" style="margin-top:10px;">
    <?php else: ?>
        <div class="os-form-section" style="margin-top:10px;">
    <?php endif; ?>
        <div class="os-form-section-question-wrapper">
            <i id="form-section-warning" class="fas fa-exclamation-circle" style="color:#fa9833;margin-right:10px;display:none;"></i>
            <i id="form-section-good" class="fas fa-check-circle" style="color:#669efc;margin-right:10px;display:none;"></i>
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
            <?php
            if(!is_admin()){
                echo do_shortcode($shortcode);
            }
            ?>
            <div style="margin-top:20px;margin-bottom:20px;"><?php echo $postForm ?></div>
            </div>
    </div>
</div>
