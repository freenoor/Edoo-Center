<?php //Template Name: Collaborate
include("includes/headers/demo2.php"); 
?>
<div class="page-collaborate">


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>

    <section class="contact__section">
        <div class="title">
            <h1><?php the_field('subtitle-collaborate'); ?></h1>
            <h2><?php the_field('title-collaborate'); ?></h2>
        </div>
        <div class="container">
            <div class="content">
                <?php the_content(); ?>
            </div>

            <div class="img-centerized">
                <img src="<?php the_field('img-ola'); ?>" alt="" loading=“lazy”>
            </div>

            <div class="centerise col-lg-12">
                <?php include("includes/sides/contactform.php"); ?>
            </div>

        </div>
    </section>




</div>
<?php include("includes/footers/demo2.php");  ?>