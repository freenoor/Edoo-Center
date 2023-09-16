<?php //Template Name: Career
include("includes/headers/demo2.php"); 
?>
<div class="page-career">


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <div class="broad">
                    <?php custom_breadcrumbs(); ?>
                </div>

                <a href="<?php echo get_permalink(312); ?>"
                    class="collaborate-btn"><?php dynamic_sidebar('widget-3');?></a>
            </div>
        </div>
    </div>


    <section class="career__section">
        <div class="container">
            <div class="title">
                <h1><?php the_field('subtitle-career'); ?></h1>
                <h2><?php the_field('title-career'); ?></h2>
            </div>


            <div class="job-posts">
                <?php
            $args = array(
            'post_type' => 'job',
            'posts_per_page' => '-1',
            'order' => 'DESC',
            );
            $loop = new WP_Query($args); 
            while($loop->have_posts()):
            $loop->the_post();
            ?>



                <div class="accordion">
                    <div class="head">
                        <div class="head-title">
                            <div class="leftside-content">
                                <span><?php the_title(); ?></span>
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

                            </div>
                            <a class="" href="<?php the_permalink();?>"><?php dynamic_sidebar('widget-6');?></a>
                        </div>
                    </div>
                </div>



                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>




</div>
<?php include("includes/footers/demo2.php");  ?>