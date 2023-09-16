<?php
include("includes/headers/demo2.php"); 
?>

<main id="primary" class="site-main single-page single-page-second-pt">


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>


    <div class="inside-single">
        <div class="container">
            <div class="row">
                <div class="lefts col-lg-6">

                    <div class="three-undertitle">
                        <?php if (get_field('optionone')) : ?>
                        <pre class="optionone"><?php the_field('optionone'); ?></pre>
                        <?php endif; ?>
                        <?php if (get_field('optiontwo')) : ?>
                        <pre class="optiontwo"><?php the_field('optiontwo'); ?></pre>
                        <?php endif; ?>
                        <?php if (get_field('optionthree')) : ?>
                        <pre class="optionthree"><?php the_field('optionthree'); ?></pre>
                        <?php endif; ?>
                    </div>
                    <div class="contentt"><?php the_content(); ?></div>

                    <div class="content">
                        <h2><?php the_field('requirements'); ?></h2>
                        <ul><?php the_field('requirements_content'); ?> </ul>
                        <h3><?php the_field('responsibilites'); ?></h3>
                        <ul><?php the_field('responsibilities_content'); ?></ul>
                    </div>

                </div>
                <div class="righs col-lg-6">
                    <?php include("includes/sides/contactform-drag-drop.php"); ?>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php include("includes/footers/demo2.php");  ?>