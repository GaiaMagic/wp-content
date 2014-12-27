<?php get_header();
$about = get_page_by_path('about-us');
$contact = get_page_by_path('contact-us'); ?>

<section id='page'>
    <div class='colorful'></div>
    
    <article class='page clearfix'>
        <header class='title l'>
            <h2><?php echo apply_filters('the_title', $about->post_title); ?></h2>
            <div class='separator'></div>
        </header>
        <div class='content'>
            <?php echo apply_filters('the_content', $about->post_content); ?>
        </div>
    </article>

    <div class='colorful'></div>
    
    <article class='page clearfix'>
        <header class='title l'>
            <h2><?php echo apply_filters('the_title', $contact->post_title); ?></h2>
            <div class='separator'></div>
        </header>
        <div class='content'>
            <?php echo apply_filters('the_content', $contact->post_content); ?>
        </div>
    </article>
</section>

<?php get_footer(); ?>
