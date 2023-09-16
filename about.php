<?php //Template Name: About
include("includes/headers/demo2.php"); 
?>
<div class="page-about">


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>


    <section class="second__section">
        <div class="container">
            <div class="row">
                <div class="rights col-lg-6">
                    <h1><?php echo ( get_field('second-tab-gr', 6)['upside_titlee'] );?></h1>
                    <h2><?php echo ( get_field('second-tab-gr', 6)['titlee'] );?></h2>
                    <h3><?php echo ( get_field('second-tab-gr', 6)['downside_titlee'] );?></h3>
                </div>
                <div class="lefts col-lg-6">
                    <div class="block">
                        <div class="img img-about"><img src="<?php the_post_thumbnail_url();?>" alt="" loading=“lazy”>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="intro-aboutus">
        <div class="container">
            <div class="title" id="services">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <!-- <div class="more-aboutus">
        <div class="container">
            
            <?php 
                    $args = array(
                        'orderby' => 'ID',
                        'order' => 'ASC',
                        'exclude' => array(124, 115, 127, 129),
                        'hide_empty' => false,
                    );
                    $terms = get_terms('categories', $args );   
                    $count = 0;
                    foreach($terms as $term){ 
                    $fontawesome_icon = get_field('font-awesome-icon', $term);
                    ?>
                    <a href="<?php the_permalink(); ?>">
                    <div class="box1 flex">
                        <div class="icon">
                            <?php echo $fontawesome_icon;?>
                        </div>
                        <div class="content">
                            <h4><?php echo $term->name; ?></h4>
                        </div>
                    </div>
                    <p class="category-description"><?php echo $term->description; ?></p>
                    </a>
                    <?php
                    $count++;
                    }  
                    ?>
        </div>
    </div> -->


    <div class="more-aboutus">
        <div class="container">
            <div class="row">
                <?php 
                $args = array(
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'exclude' => array(124, 115, 127, 129),
                    'hide_empty' => false // show empty categories

                );
                $terms = get_terms('categories', $args );   
                // $count = 0;
                $count = 1;
                foreach($terms as $term){ 
                $bg_img_url = get_field('bg-img', $term);
                // $fontawesome_icon = get_field('font-awesome-icon', $term);
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
                            <!-- <div class="icon">
                                    <?php echo $fontawesome_icon;?>
                                </div> -->

                            <div class="content">
                                <!-- <?php if ($extra_text) { ?>
                                    <p class="extra-text"><?php echo $extra_text; ?></p>
                                    <?php } ?> -->
                                <h1><?php echo $term->name; ?></h1>
                                <?php if ($term->description) { ?>
                                <p class="category-description"><?php echo $term->description; ?></p>
                                <?php } ?>
                            </div>
                        </li>
                        <!-- </div> -->

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