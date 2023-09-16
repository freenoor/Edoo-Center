<?php
include("includes/headers/demo2.php"); 
?>

<main id="primary" class="site-main single-page">


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <?php custom_breadcrumbs(); ?>
                <h1><?php the_title();?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="intro-section">

            <div class="row">
                <div class="nav-bg col-lg-6" style="background-image: url('<?php the_post_thumbnail_url();?>')"></div>

                <div class="content col-lg-6">
                    <div class="content-inside">
                        <h1><?php the_title();?></h1>
                        <?php the_content();?>
                    </div>
                    <div class="info-intro">
                        <?php if(get_field('date')): ?>
                        <span><i class="fas fa-calendar-alt"></i><?php the_field('date'); ?></span>
                        <?php endif; ?>
                        <?php if(get_field('hour')): ?>
                        <span><i class="fa-regular fa-clock"></i><?php the_field('hour'); ?></span>
                        <?php endif; ?>
                        <?php if(get_field('meeting')): ?>
                        <span><i class="fa-solid fa-map-pin"></i><?php the_field('meeting'); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


        <?php include("includes/sides/contactform.php"); ?>
    </div>

</main>

<?php include("includes/footers/demo2.php");  ?>