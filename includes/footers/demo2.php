<?php
/**
 * @package Standard
 */
?>
<footer id="colophon" class="site-footer">
    <div class="cols">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 footer-1">
                    <ul>
                        <?php dynamic_sidebar('footer-1');?>
                    </ul>
                </div>
                <div class="col-lg-3 footer-2">
                    <ul>
                        <?php dynamic_sidebar('footer-2');?>
                    </ul>
                </div>
                <div class="col-lg-4 footer-3">
                    <ul>
                        <?php dynamic_sidebar('footer-3');?>
                    </ul>
                </div>
                <!-- <div class="col-lg-3 footer-4">
                    <ul>
                    <?php dynamic_sidebar('footer-4');?>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <div class="copyr">
        <p>&copy;<?php echo date(' Y  ') ;?>All rights Reserved.
            <!-- <a href="https://puzzle-enterprise.com/">Puzzle Enterprise</a>  -->
        </p>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>