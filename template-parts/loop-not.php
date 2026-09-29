   <div class="inner">
       <div class="not">
           <p>記事がありません。</p>
       </div>
   </div>

   <?php
    $recommend = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'orderby'        => 'rand',
    ));
    ?>

   <?php if ($recommend->have_posts()) : ?>
       <div class="recommend">
           <div class="title">
               <h1 id="menu1">おすすめBlog</h1>
               <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/matuge1 1.png')); ?>" alt="">
           </div>


           <div class="post">
               <?php while ($recommend->have_posts()) : $recommend->the_post(); ?>
                   <article class="posts">
                       <div class="imgs">
                           <a href="<?php the_permalink(); ?>" class="category-tag">
                               <span>
                                   <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                               </span>
                           </a>
                           <a href="<?php the_permalink(); ?>" class="thumbnail-link">
                               <div class="thumbnail">
                                   <?php
                                    if (has_post_thumbnail()):
                                        the_post_thumbnail('large');
                                    else:
                                    ?>
                                       <img src="<?php echo esc_url(get_theme_file_uri('/blog_img/blog_img.png')); ?>" alt="" class="default-thumbnail">
                                   <?php endif; ?>
                               </div>
                           </a>
                       </div>
                       <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                           <p><?php the_time('Y/m/d'); ?></p>
                       </time>
                       <a href="<?php the_permalink(); ?>">
                           <h2><?php the_title(); ?></h2>
                       </a>
                   </article>
               <?php endwhile; ?>
           </div>
       </div>
   <?php endif; ?>

   <?php wp_reset_postdata(); ?>