    <div class="row col-head py-3">
        <div class="col post-head-as">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="row pt-3" id="aj-squarecontent">
        <?php
            if(have_posts()) :
                while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-wrap entry-content">
                <div><?php the_content(); ?></div>
            </div>
            <div class="col-12 py-3">
                <?php
                    // Add wp_link_pages for paginated posts
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'aj-eshop' ),
                        'after'  => '</div>',
                    ) );
                ?>
                <div class="container">
                    <?php the_tags( '<div class="post-tags mt-3"><strong>Tags:</strong> ', ', ', '</div>' ); ?>
                </div>
            </div>
        </article>
    
        <?php        
            endwhile;
                else:
                echo 'No Post Found';
            endif;
        ?>
    </div>