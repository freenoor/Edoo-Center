<?php 
include("includes/headers/demo2.php"); 
?>


	<main id="primary" class="taxonomy-single">

		<div class="breadcrumb">
			<div class="container">
			<div class="breadcrumbs">
			<?php $term = get_queried_object(); ?>
			<?php echo $term->name; ?>
			</div>
			</div>
		</div>

		<div class="container">
		<?php
		$term = get_queried_object();
		$bg_img_url = get_field('bg-img', $term);
		// $extra_text = get_field('extra_text', $term);
		?> 
		<div class="intro-section">

		<!-- <h1><?php echo $term->name; ?></h1> -->
		<!-- <div class="row"> -->
		<div class="row">
		<div class="nav-bg col-lg-12">
		<div class="img" style="background-image: url('<?php echo $bg_img_url;?>')"></div>
		</div>

		<div class="content col-lg-12">
		<div class="content-inside">

		<!-- <?php if ($extra_text) { ?>
			<span><i class="far fa-clock"></i><?php echo $extra_text; ?></p></span>
		<?php } ?> -->
		<?php if ($term->description) { ?>
			<p class="category-description"><?php echo $term->description; ?></p>
		<?php } ?>

		
		<!-- </div> -->
		</div>
		</div>
		</div>
		</div>

		</div>

<div class="register-form">
	<div class="container">
		<div class="title">
			<h1><?php the_field('subtitle-category-courses', 18); ?></h1>
            <h2><?php the_field('title-category-courses', 18); ?></h2>
		</div>

		<div class="contantform">
		<?php include("includes/sides/contactform-drag-drop.php"); ?>
		</div>
	</div>
</div>


	<div class="related-posts">
		<div class="container">
			<div class="title">
                <h1>
				EXPLORE MORE
				</h1>
                <h2>
				<strong>You</strong> May Also Like
				</h2>
            </div>
			
			<div class="swiper mySwiper mySwipercat mySwipercat2">
                <div class="swiper-wrapper ">
                    <?php 
					$current_category = get_queried_object(); // Get the current category
                	$args = array(
					'taxonomy' => 'categories', // Replace 'categories' with your actual taxonomy name
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'exclude' => array(124, 115, 127, 129, $current_category->term_id),
                    'hide_empty' => false // show empty categories

                );
                $terms = get_terms('categories', $args );   
                $count = 0;
                foreach($terms as $term){ 
                $bg_img_url = get_field('bg-img', $term);
                $extra_text = get_field('extra_text', $term);
                $checkbox_value = get_field('newoption', $term);
                ?>
                    <div class="swiper-slide">
                        <a href='<?php echo get_term_link($term);?>'>
                            <li class="nav-item">
                                <?php if ($checkbox_value) { ?>
                                <p class="new">New</p>
                                <?php } ?>
                                <div class="nav-bg" style="background-image: url('<?php echo $bg_img_url;?>')"></div>
								<div class="content">
                                    <?php if ($extra_text) { ?>
										<span><i class="far fa-clock"></i><p class="extra-text"><?php echo $extra_text; ?></p></span>
                                    <?php } ?>
                                    <h1><?php echo $term->name; ?></h1>
                                    <?php if ($term->description) { ?>
                                    <p class="category-description"><?php echo $term->description; ?></p>
                                    <?php } ?>
                                </div>
                            </li>
                        </a>
                    </div>
                    <?php
                $count++;
                }  
                ?>
                </div>
            </div>
	


			</div>
		</div>

	</main><!-- #main -->

	<?php include("includes/footers/demo2.php");  ?>