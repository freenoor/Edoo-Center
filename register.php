<?php //Template Name: Register
include("includes/headers/demo2.php");
?>
<div class="page-contact">


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <div class="broad">
                    <?php custom_breadcrumbs(); ?>
                </div>

                <a href="<?php echo get_permalink(312); ?>" class="collaborate-btn"><?php dynamic_sidebar('widget-3');?></a>

            </div>
        </div>
    </div>

    <section class="contact__section">
        <div class="title">
            <h1><?php the_field('subtitle-register'); ?></h1>
            <h2><?php the_field('title-register'); ?></h2>
        </div>
        <div class="container">
            <div class="undertitle">
                <?php the_content();?>
            </div>
            <div class="centerise col-lg-12">
                <?php include("includes/sides/contactform.php"); ?>
            </div>
        </div>
    </section>


    <?php include("includes/sides/social-contact.php"); ?>


</div>
<?php include("includes/footers/demo2.php");  ?>