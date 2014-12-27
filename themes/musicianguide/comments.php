<section id='comments'>
    <h4 class='title'>留言</h4>
    <iframe width="100%" height="500"  frameborder="0" scrolling="no" src="http://widget.weibo.com/distribution/comments.php?language=zh_cn&width=0&height=500&skin=1&dpc=1&url=<?php the_permalink(); ?>&titlebar=1&border=1&appkey=1620491747&dpc=1"></iframe>
    <div class='separator'></div>
    <ol class='commentlist'>
        <?php wp_list_comments('type=comment&callback=musicianguide_comment'); ?>
        <!--
        <li class='comment clearfix'>
         <div class='avatar l'>
             <img src='//dummyimage.com/50x50/000/fff.png' />
            </div>
            <article class='comment'>
                <div class='user'>奉化市</div>
                <div class='content'>
                    <p>发挥到几十分集散地行风建设房价是发神经符合实际符合实际行风建设分解开始粉红色的积分还涉及符合实际花费时间花费时间客户</p>
                </div>
                <footer class='meta clearfix'>
                    <time class='l'>2011-11-11</time>
                    <div class='links r'>
                        <a href='#'>回复</a>
                    </div>
                </footer>
            </article>
            <div class='top-indicator'></div>
            <ul class='children'>
                <li class='comment clearfix'>
                    <div class='avatar l'>
                        <img src='//dummyimage.com/50x50/000/fff.png' />
                    </div>
                    <article class='comment'>
                        <div class='user'>奉化市</div>
                        <div class='content'>
                            <p>发挥到几十分集散地行风建设房价是发神经符合实际符合实际行风建设分解开始粉红色的积分还涉及符合实际花费时间花费时间客户</p>
                        </div>
                        <footer class='meta clearfix'>
                            <time class='l'>2011-11-11</time>
                            <div class='links r'>
                                <a href='#'>回复</a>
                            </div>
                        </footer>
                    </article>
                </li>
                <li class='comment clearfix'>
                    <div class='avatar l'>
                        <img src='//dummyimage.com/50x50/000/fff.png' />
                    </div>
                    <article class='comment'>
                        <div class='user'>奉化市</div>
                        <div class='content'>
                            <p>发挥到几十分集散地行风建设房价是发神经符合实际符合实际行风建设分解开始粉红色的积分还涉及符合实际花费时间花费时间客户</p>
                        </div>
                        <footer class='meta clearfix'>
                            <time class='l'>2011-11-11</time>
                            <div class='links r'>
                                <a href='#'>回复</a>
                            </div>
                        </footer>
                    </article>
                </li>
                <div class='top-indicator'></div>
                <ul class='children'>
                    <li class='comment clearfix'>
                        <div class='avatar l'>
                            <img src='//dummyimage.com/50x50/000/fff.png' />
                        </div>
                        <article class='comment'>
                            <div class='user'>奉化市</div>
                            <div class='content'>
                                <p>发挥到几十分集散地行风建设房价是发神经符合实际符合实际行风建设分解开始粉红色的积分还涉及符合实际花费时间花费时间客户</p>
                            </div>
                            <footer class='meta clearfix'>
                                <time class='l'>2011-11-11</time>
                                <div class='links r'>
                                    <a href='#'>回复</a>
                                </div>
                            </footer>
                        </article>
                    </li>
                </ul>
            </ul>
        </li>
        -->
    </ol>
    <?php if (get_query_var('cpage') >= 2): ?>
    <div class='pagination clearfix'>
        <div class='pager clearfix'>
            <?php paginate_comments_links('prev_text=&next_text='); ?>
        </div>
    </div>
    <div class='separator'></div>
    <?php else: ?>
    <?php endif; ?>
    <?php if ('open' == $post->comment_status) : ?>
    <div id='respond'>

    <form class='clearfix' id='commentform' action='<?php echo get_option("siteurl"); ?>/wp-comments-post.php' method='post'>
        <?php if ( $user_ID ) : ?>

        <p>
            登录为 <a href='<?php echo get_option("siteurl"); ?>/wp-admin/profile.php'><?php $current_user = wp_get_current_user(); echo $current_user->display_name; ?></a>. <a title="Log out of this account" href='<?php echo wp_logout_url(get_permalink()); ?>'>登出 »</a>
        </p>

        <?php else: ?>
            <label for='author'>姓名</label>
            <input class='input-text' id='author' name='author' size='30' type='text' />
            <label for='email'>E-MAIL</label>
            <input class='input-text' id='email' name='email' size='30' type='text' />
            <label for='url'>网址</label>
            <input class='input-text' id='url' name='url' size='30' type='text' />
            <?php endif; ?>
            <textarea cols='45' id='comment' name='comment' rows='10'></textarea>
            <?php comment_id_fields(); ?>
            <?php do_action('comment_form', $post->ID); ?>
            <input class='input-button styled-btn r' id='submit' name='submit' type='submit' value='留言' />
    </form>
    </div>
    <?php endif; ?>
</section>
