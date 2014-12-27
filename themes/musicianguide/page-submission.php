<?php get_header(); ?>

<section id='page'>
    <div class='colorful'></div>

    <article id='submission'>
        <h2>投稿</h2>
        
        <div class='buttons clearfix'>
            <a class='account l' href='<?php echo wp_login_url("/wp-admin/post-new.php"); ?>'>登录或注册</a>
            <a class='submission l' href='<?php home_url(); ?>/wp-admin/post-new.php'>投稿</a>
        </div>

        <div class="help">
                <a href="/edit-and-publish-articles/">如何注册和设置头像</a>（没有收到账号密码请查看垃圾邮箱，如果仍然没有可通过更换邮箱进行注册）

                <br/>
                
                <a href="/register-as-a-contributor/">如何成为投稿人</a>
        </div>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class='notice'>
            <?php the_content(); ?>
        </div>
        <?php endwhile; endif; ?>
    </article>
</section>

<?php get_footer(); ?>
