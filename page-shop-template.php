<?php 

/*
	Template Name: Shop Template
*/


get_header();?>
<style>
    .post-head-as{
        text-align:;
    }
</style>
<div class="main_wrap content_bg content_bg-ss">
    <div class="wrap container-fluid">
        <div id="content_wrapper">
            <div class="row">
                <div class="col-md-12 py-1" id="aj-eshop-theme">
                    <div class="col-12 py-3 mb-3">
                        <div class="post-head-as">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </div>
                    </div>
                    <div class="col-12">
                            <?php
								if(have_posts()) :
									while (have_posts()) : the_post(); ?>

								<article id="main_article_single">
									<div class="post-wrap entry-content">
										<p><?php the_content(); ?></p>
									</div>
								</article>

								<?php        
								endwhile;
									else:
									echo 'No Post Found';
								endif;
							?>
                    </div>
                </div>
            </div>
        </div>			
    </div>
</div>
<?php get_template_part('/template_parts/upper_footer'); ?>
<?php get_footer(); ?>