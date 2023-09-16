<?php /* Template Name: Home */ 
include("includes/headers/demo2.php"); 
?>
<div class="page-home">

    <section class="desk-height banner__section">
        <div class="container">
            <div class="row">
                <div class="lefts" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <h1><?php echo ( get_field('first-tab-gr')['upside-title'] );?></h1>
                    <h2 data-aos-delay="100"><?php echo ( get_field('first-tab-gr')['title'] );?></h2>
                    <h3 data-aos-delay="200"><?php echo ( get_field('first-tab-gr')['downside-title'] );?></h3>
                    <div class="btn-custom btn-banner" data-aos-delay="200">
                        <a aria-label="button" href="<?php echo ( get_field('first-tab-gr')['link'] );?>"><?php echo ( get_field('first-tab-gr')['btn-title'] );?></a>
                    </div>
                </div>

                <div class="rights">
                    <div class="img img-rights" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="300" data-aos-duration="500">
                        <img src="<?php echo ( get_field('first-tab-gr')['prof-icon'] );?>" alt="" loading=“lazy”>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="second__section" id="about">
        <div class="container">
            <div class="row">
                <div class="lefts col-lg-6" data-aos="fade-right" data-aos-delay="300">
                    <div class="block">
                        <div class="img img-big"><img src="<?php echo ( get_field('second-tab-gr')['big-img'] );?>"
                                alt="" loading=“lazy”></div>
                        <div class="img img-small"><img src="<?php echo ( get_field('second-tab-gr')['small-img'] );?>"
                                alt="" loading=“lazy”></div>
                    </div>
                </div>
                <div class="rights col-lg-6">
                    <h1 data-aos="fade-left" data-aos-delay="100"><?php echo ( get_field('second-tab-gr')['upside_titlee'] );?></h1>
                    <h2 data-aos="fade-left" data-aos-delay="200"><?php echo ( get_field('second-tab-gr')['titlee'] );?></h2>
                    <h3 data-aos="fade-left" data-aos-delay="300"><?php echo ( get_field('second-tab-gr')['downside_titlee'] );?></h3>

                    <?php 
                    $args = array(
                        'orderby' => 'ID',
                        'order' => 'ASC',
                        'exclude' => array(124, 115, 127, 129),
                        'hide_empty' => false // show empty categories
                    );
                    $terms = get_terms('categories', $args );   
                    $count = 0;
                    foreach($terms as $term){ 
                    $fontawesome_icon = get_field('font-awesome-icon', $term);
                    ?>
                    <div class="box1 flex" data-aos="fade-left" data-aos-delay="400"> 
                        <div class="icon">
                        <?php echo $fontawesome_icon;?>
                        </div>
                        <div class="content">
                            <h4><?php echo $term->name; ?></h4>
                        </div>
                    </div>
                    <?php
                    $count++;
                    }  
                    ?>
                    <div class="btn-custom bton-aboutus" data-aos="fade-left" data-aos-delay="600"><a aria-label="button" href="<?php echo ( get_field('second-tab-gr')['link-about'] );?>"><?php echo ( get_field('second-tab-gr')['btn-title-about'] );?></a>
                    </div>
                </div>
            </div>
        </div>

    </section>





    <section class="courses__section" id="courses">
        <div class="container">
            <div class="title" data-aos="zoom-out-down">
                <h1><?php the_field('subtitle-category'); ?></h1>
                <h2><?php the_field('title-category'); ?></h2>
            </div>

            <div class="swiper mySwiper mySwipercat">
                <div class="swiper-wrapper ">
                    <?php 
                    $args = array(
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'exclude' => array(124, 115, 127, 129),
                    'hide_empty' => false // show empty categories

                );
                $terms = get_terms('categories', $args );   
                $count = 0;
                foreach($terms as $term){ 
                $bg_img_url = get_field('bg-img', $term);
                // $extra_text = get_field('extra_text', $term);
                $checkbox_value = get_field('newoption', $term);
                ?>
                    <div class="swiper-slide">
                        <a href='<?php echo get_term_link($term);?>' aria-label="services">
                        <ul>
                            <li class="nav-item">
                                <?php if ($checkbox_value) { ?>
                                <p class="new">New</p>
                                <?php } ?>
                                <div class="nav-bg" style="background-image: url('<?php echo $bg_img_url;?>')"></div>
                                <div class="content">
                                    <!-- <?php if ($extra_text) { ?>
                                    <span><i class="far fa-clock"></i><p class="extra-text"><?php echo $extra_text; ?></p></span>
                                    <?php } ?> -->
                                    <h1><?php echo $term->name; ?></h1>
                                    <?php if ($term->description) { ?>
                                    <p class="category-description"><?php echo $term->description; ?></p>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                        </a>
                    </div>
                    <?php
                $count++;
                }  
                ?>
                </div>
            </div>

            <div class="btn-all">
            <a href="/about#services" aria-label="view all">View all</a>
            </div>
            
        </div>
    </section>


    <section class="latestpost__section" id="features">
        <div class="container">
            <div class="title" data-aos="zoom-out">
                <h1><?php the_field('subtitle-events'); ?></h1>
                <h2><?php the_field('title-events'); ?></h2>
            </div>

            <div class="upcoming-events-courses only-webinar">
            <?php
                $args = array(
                'post_type' => 'services',
                'posts_per_page' => '-1',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categories',
                        'field' => 'slug',
                        'terms' => array( 'webinar'),
                    ),
                ),
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) :
                $loop->the_post();
            ?>
                <div class="inner">
                    <div class="lefts">
                        <img src="<?php the_post_thumbnail_url();?>" alt="" loading=“lazy”>
                        <div class="inside-content">

                            <div class="clc">
                                <h1><?php the_title();?></h1>
                                <?php the_content();?>

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

                            <div class="btn-event">
                                <?php include("includes/sides/modal.php"); ?>
                            </div>

                        </div>
                    </div>

                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            </div>




            <div class="upcoming-events-courses">
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => '-1',
                    'order' => 'DESC',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'categories',
                            'field' => 'slug',
                            'terms' => array('upcoming-events'),
                            // 'terms' => array('webinar'),
                            // 'operator' => 'NOT IN',
                        ),
                    ),
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) :
                $loop->the_post(); 
                ?>
                <div class="inner">
                    <div class="lefts">
                        <img src="<?php the_post_thumbnail_url();?>" alt="" loading=“lazy”>
                        <div class="inside-content">

                            <div class="clc">
                                <h1><?php the_title();?></h1>
                                <?php the_content();?>

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

                            <div class="btn-event">
                                <?php include("includes/sides/modal.php"); ?>
                            </div>

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



    <section class="reviews__section">
        <div class="container">
            <div class="title">
                <h1 data-aos="zoom-in"><?php the_field('subtitle-review'); ?></h1>
                <h2 data-aos="zoom-in"><?php the_field('title-review'); ?></h2>
            </div>

            <div class="swiper mySwiper mySwipereviews">
                <div class="swiper-wrapper ">
                    <?php
                            $args = array(
                            'post_type' => 'testimonials-reviews',
                            'posts_per_page' => '-1',
                            );
                            $loop = new WP_Query($args);
                            while($loop->have_posts()):
                            $loop->the_post();
                            ?>
                    <div class="swiper-slide">
                        <div class="lefts">
                            <div class="img">

                                <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                                    loading="lazy">
                                <?php endif; ?>

                            </div>
                            <div class="circle-image"><span></span><span></span></div>
                        </div>

                        <div class="rights">
                            <div class="reww">
                                <?php the_content(); ?>
                            </div>

                            <div class="review-per">
                                <div class="content">
                                    <?php if (!empty(get_the_title())): ?>
                                    <h1><?php the_title(); ?></h1>
                                    <?php endif; ?>
                                    <?php $excerpt = get_post_field('post_excerpt', get_the_ID()); ?>
                                    <?php if (!empty($excerpt)) : ?>
                                    <?php the_excerpt();?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                </div>
            </div>
        </div>
    </section>



    <section class="instructor__section" id="instructors">
        <div class="container">
            <div class="title" data-aos="zoom-in-up">
                <h1><?php the_field('subtitle-instr'); ?></h1>
                <h2><?php the_field('title-instr'); ?></h2>
            </div>

            <div class="swiper mySwiper mySwiperinstructor">
                <div class="swiper-wrapper ">
                    <?php
                $args = array(
                'post_type' => 'tutors',
                'posts_per_page' => '-1',
                );
                $loop = new WP_Query($args);
                while($loop->have_posts()):
                $loop->the_post();
                ?>
                    <div class="swiper-slide">
                        <img src="<?php the_post_thumbnail_url();?>" alt="" loading=“lazy”>
                        <div class="slider__content">
                            <div class="inside-content">
                                <h1><?php the_title();?></h1>
                                <?php the_content();?>
                                <div class="socials">
                                    <?php if(get_field('linkedin')): ?>
                                    <a aria-label="socials" href="<?php the_field('linkedin'); ?>"><i class="fab fa-linkedin-in"></i></a>
                                    <?php endif; ?>
                                    <?php if(get_field('instagram')): ?>
                                    <a aria-label="socials" href="<?php the_field('instagram'); ?>"><i
                                            class="fa-brands fa-instagram"></i></a>
                                    <?php endif; ?>
                                    <?php if(get_field('twitter')): ?>
                                    <a aria-label="socials" href="<?php the_field('twitter'); ?>"><i class="fa-brands fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if(get_field('youtube')): ?>
                                    <a aria-label="socials" href="<?php the_field('youtube'); ?>"><i class="fa-brands fa-youtube"></i></a>
                                    <?php endif; ?>
                                    <?php if(get_field('skype')): ?>
                                    <a aria-label="socials" href="<?php the_field('skype'); ?>"><i class="fa-brands fa-skype"></i></a>
                                    <?php endif; ?>
                                    <?php if(get_field('extra')): ?>
                                    <a aria-label="socials" href="<?php the_field('extra'); ?>"><i
                                            class="fa-sharp fa-regular fa-thumbs-up"></i></a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
                </div>
            </div>
        </div>
    </section>



</div>

<?php include("includes/footers/demo2.php");  ?>