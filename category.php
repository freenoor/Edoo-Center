<?php 
include("includes/headers/demo2.php"); 
?>


<main id="primary" class="category-single">

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <?php custom_breadcrumbs(); ?>
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
            <div class="nav-bg" style="background-image: url('<?php echo $bg_img_url;?>')"></div>

            <div class="content">
                <div class="content-inside">

                    <?php if ($term->description) { ?>
                    <p class="category-description"><?php echo $term->description; ?></p>
                    <?php } ?>

                    <!-- <?php if ($extra_text) { ?>
			<span><i class="far fa-clock"></i><p class="extra-text"><?php echo $extra_text; ?></p></span>
		<?php } ?> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>

    </div>




</main><!-- #main -->

<?php include("includes/footers/demo1.php");  ?>