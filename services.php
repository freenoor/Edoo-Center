<?php //Template Name: Services
include("includes/headers/demo2.php"); 
?>

<div class="page-references">


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


    <div class="courses__section">
        <div class="container">
            <div class="title">
                <?php the_content(); ?>
            </div>
            <div class="row">
                <?php 
                $args = array(
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'exclude' => array(124, 115, 127, 129),
                    'hide_empty' => false,

                );
                $terms = get_terms('categories', $args );   
                $count = 1;
                foreach($terms as $term){ 
                $bg_img_url = get_field('bg-img', $term);
                $checkbox_value = get_field('newoption', $term);
                ?>

                <a class="outter" href='<?php echo get_term_link($term);?>'>
                    <div class="col-lg-6 p-0 simple_back <?php if($count % 2 == 0){echo 'order-lg-12 order-sm-1';}?>">
                        <div class="img" style="background-image: url('<?php echo $bg_img_url;?>');">
                        </div>
                        <?php if ($checkbox_value) { ?>
                        <p class="new">New</p>
                        <?php } ?>
                    </div>

                    <div
                        class="col-lg-6 text <?php if($count % 2 == 0){echo 'order-lg-1  order-sm-12';} else{echo 'bg-grey';}?>">
                        <li class="nav-item">
                            <div class="content">
                                <h1><?php echo $term->name; ?></h1>
                                <?php if ($term->description) { ?>
                                <p class="category-description"><?php echo $term->description; ?></p>
                                <?php } ?>
                            </div>
                        </li>
                    </div>
                </a>
                <?php
                $count++;
                }  
                ?>
            </div>
        </div>
    </div>

</div>

<?php include("includes/footers/demo2.php");  ?>