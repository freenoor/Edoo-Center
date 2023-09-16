<div class="title-imp">
    <a href="#myModal-<?php the_ID(); ?>" aria-label="events" data-toggle="modal">
        <?php dynamic_sidebar('widget-7'); ?>
    </a>
</div>
<div class="modal fade" id="myModal-<?php the_ID(); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php the_title(); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php if (is_active_sidebar('contactform-events')) : ?>
                <div id="widget-area" class="widget-area">
                    <?php dynamic_sidebar('contactform-events'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>