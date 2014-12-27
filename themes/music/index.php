<?php get_header(); ?>
<?php $options = get_option('classic_options');
function utf8Substr($str, $from, $len)
{
	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s','$1',$str);
}
?>
    <div id="content">
      <div class="indexpage">
        <div class="widthdiv">
          <div class="listdiv clearfix">
            <div class="div210">
              <div class="topbar"></div>
              <p class="pTitle">音乐人</p>
              <ul class="list5 list_1">
                <?php query_posts('cat=22&showposts=5');?>
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	                <li>
	                	<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
	                		<?php echo utf8Substr(strip_tags(the_title('','',false)),0,30); ?>
	                	</a>
	                	<span class="cor">
	                		<?php echo get_post_meta($post->ID, "anthorship", $single = true); ?>
	                	</span>
	                </li>
	                <div class="line"></div>
                <?php endwhile; ?>
				<?php endif ?>
				<?php wp_reset_query();?>
              </ul>
            </div>
            <div class="div210 div210_2">
              <div class="topbar"></div>
              <p class="pTitle">音乐产业</p>
              <ul class="list5 list_1">
               <?php query_posts('cat=33&showposts=5');?>
			   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo utf8Substr(strip_tags(the_title('','',false)),0,40);?></a>
		<span class="cor">
			<?php echo get_post_meta($post->ID, "anthorship", $single = true); ?>
		</span></li>
                <div class="line"></div>
                <?php endwhile; ?>
				<?php endif ?>
				<?php wp_reset_query();?>
              </ul>
            </div>
            <div class="div210 div210_3">
              <div class="topbar"></div>
              <p class="pTitle">推荐</p>
              <ul class="list5 list_1">
               <?php query_posts('cat=434&showposts=5');?>
			   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo utf8Substr(strip_tags(the_title('','',false)),0,30); ?></a>
		<span class="cor">
			<?php echo get_post_meta($post->ID, "anthorship", $single = true); ?>
		</span></li>
                <div class="line"></div>
                <?php endwhile; ?>
				<?php endif ?>
				<?php wp_reset_query();?>
              </ul>
            </div>
            <div class="div210 div210_4">
              <div class="topbar"></div>
              <p class="pTitle">其他相关</p>
              <ul class="list5 list_1">
               <?php query_posts('cat=34&showposts=5');?>
			   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo utf8Substr(strip_tags(the_title('','',false)),0,30); ?></a>
		<span class="cor">
			<?php echo get_post_meta($post->ID, "anthorship", $single = true); ?>
		</span></li>
                <div class="line"></div>
                <?php endwhile; ?>
				<?php endif ?>
				<?php wp_reset_query();?>
              </ul>
            </div>
          </div>
        </div>
        <div class="mainbox">
          <div class="lbox">
            <div class="box1"><a href="<?php echo $options['home_ad_pic1_url']?>" title="合拍网"><img src="<?php echo $options['home_ad_pic1']?>" alt="合拍网"/></a>
            	<span class="pdl"><a href="/mg"><img src="/mg/static/images/mgbanner.jpg"/></a></span>
            </div>
            <div class="linenew"></div>
            <div class="sonmainbox ">
              <div class="sonlbox">
                <div class="combox_2">
                  <div class="pTitle">音乐人</div>
                  <div class="photo"><img src="<?php echo get_option('musician_url');?><?php echo ($options['musician']); ?>" alt="" /></div>
                  <h3 class="hcla"><a href="<?php echo ($options['musician_url']);?>"><?php echo ($options['musician_title']); ?></a></h3>
                  <p class="pDes"><?php echo ($options['musician_content']); ?></p>
                </div>
              </div>
              <div class="sonrbox">
                <ul class="list_5">
                <?php query_posts('cat=22&showposts=5');?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <li>
                    <div class="l_b">
                      <p><span class="fb"><?php the_author(); ?></span></p>
                      <p><?php echo get_the_date( 'y-m-d' ); ?></p>
                    </div>
                    <div class="dDes"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="rnumber"><?php comments_number('0', '1', '%' );?></div>
                  </li>
                  <div class="line"></div>
                  <?php endwhile; ?>
				  <?php endif ?>
				  <?php wp_reset_query();?>
                </ul>
              </div>
            </div>
            <div class="linenew linenew2"></div>
            <div class="sonmainbox ">
              <div class="sonlbox">
                <div class="combox_2">
                  <div class="pTitle">音乐产业</div>
                  <div class="photo"><img src="<?php echo get_option('industry');?><?php echo ($options['industry']); ?>" alt="" /></div>
                  <h3 class="hcla"><a href="<?php echo ($options['industry_url']); ?>"><?php echo ($options['industry_title']); ?></a></h3>
                  <p class="pDes"><?php echo ($options['industry_content']); ?></p>
                </div>
              </div>
              <div class="sonrbox">
                <ul class="list_5">
                <?php query_posts('cat=33&showposts=5');?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <li>
                    <div class="l_b">
                      <p><span class="fb"><?php the_author(); ?></span></p>
                      <p><?php echo get_the_date( 'y-m-d' ); ?></p>
                    </div>
                    <div class="dDes"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="rnumber"><?php comments_number('0', '1', '%' );?></div>
                  </li>
                  <div class="line"></div>
                  <?php endwhile; ?>
				  <?php endif ?>
				  <?php wp_reset_query();?>
                </ul>
              </div>
            </div>
            <div class="linenew linenew4"></div>
            <div class="sonmainbox ">
              <div class="sonlbox">
                <div class="combox_2">
                  <div class="pTitle">推荐</div>
                  <div class="photo"><img src="<?php echo get_option('recommend');?><?php echo ($options['recommend']); ?>" alt="" /></div>
                  <h3 class="hcla"><a href="<?php echo ($options['recommend_url']); ?>"><?php echo ($options['recommend_title']); ?></a></h3>
                  <p class="pDes"><?php echo ($options['recommend_content']); ?></p>
                </div>
              </div>
              <div class="sonrbox">
                <ul class="list_5">
                <?php query_posts('cat=434&showposts=5');?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <li>
                    <div class="l_b">
                      <p><span class="fb"><?php the_author(); ?></span></p>
                      <p><?php echo get_the_date( 'y-m-d' ); ?></p>
                    </div>
                    <div class="dDes"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="rnumber"><?php comments_number('0', '1', '%' );?></div>
                  </li>
                  <div class="line"></div>
                  <?php endwhile; ?>
				  <?php endif ?>
				  <?php wp_reset_query();?>
                </ul>
              </div>
            </div>
            <div class="linenew linenew5"></div>
            <div class="sonmainbox ">
              <div class="sonlbox">
                <div class="combox_2">
                  <div class="pTitle">其他相关</div>
                  <div class="photo"><img src="<?php echo get_option('other');?><?php echo ($options['other']); ?>" alt="" /></div>
                  <h3 class="hcla"><a href="<?php echo ($options['other_url']); ?>"><?php echo ($options['other_title']); ?></a></h3>
                  <p class="pDes"><?php echo ($options['other_content']); ?></p>
                </div>
              </div>
              <div class="sonrbox">
                <ul class="list_5">
                  <?php query_posts('cat=34&showposts=5');?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <li>
                    <div class="l_b">
                      <p><span class="fb"><?php the_author(); ?></span></p>
                      <p><?php echo get_the_date( 'y-m-d' ); ?></p>
                    </div>
                    <div class="dDes"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="rnumber"><?php comments_number('0', '1', '%' );?></div>
                  </li>
                  <div class="line"></div>
                  <?php endwhile; ?>
		  <?php endif ?>
		  <?php wp_reset_query();?>
                </ul>
              </div>
            </div>
          </div>
          <div class="rbox">
            <div class="dybox">
              <div class="link"><a href="http://feed.feedsky.com/MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a38.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg'"/></a><a href="http://www.feedsky.com/msub_wr.html?burl=MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg" alt="" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a39.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg'" /></a><a href="http://t.sina.com.cn/musicianguidecn"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a40.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg'" /></a></div>
            </div>
            <div class="line"></div>
            <p class="pTitle">在这里可以找到我们</p>
            <div class="wb">
                <div class="clearfix">
                    <ul>
                        <li class="db">
                            <a href="http://site.douban.com/111914/">豆瓣</a>
			</li>

                        <li class="sn">
                            <a href="http://weibo.com/musicianguidecn">新浪微博</a>
			</li>

                        <li class="rr">
                            <a href="http://page.renren.com/600962666">人人</a>
			</li>

                        <li class="dd">
                            <a href="http://musicianguidecn.diandian.com/">点点</a>
			</li>

                        <li class="yy">
                            <a href="http://pro.yeeyan.org/musicianguidecn">译言</a>
			</li>

                        <li class="qq">
                            <a href="http://t.qq.com/musicianguidecn">腾讯微博</a>
			</li>

                        <li class="sh">
                            <a href="http://musicianguide.t.sohu.com/">搜狐微博</a>
			</li>

                        <li class="wy">
                            <a href="http://t.163.com/musicianguidecn">网易微博</a>
			</li>
                    </ul>
                </div>
            </div>
            <div class="line"></div>
            <div class="search">
            <form method="get" id="searchform" action="<?php echo get_option('home') ?>/">
			<span class="fl"><label class="ibg"><input type="text" name="s" value="<?php the_search_query(); ?>"/></label></span>
			<input type="image" src="<?php bloginfo('template_url'); ?>/image/img_ty_46.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a46.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_46.jpg'" onclick="this.form.submit()">
			</form>
            </div>
            <div class="line"></div>
            <div class="wolist">
               <EMBED src=" http://tjs.sjs.sinajs.cn/t3/miniblog/static/swf/miniblogwidget.swf" wmode="transparent" quality="high" width="230" height="500" align="L" scale="noborder" flashvars="width=230&height=500&uid=1791950544&skin=skin1"							allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></EMBED>
            </div>
            <div class="line"></div>
            <div class="tabBox ">
              <div class="tabMenu">
                <ul class="listNav clearHidden">
                  <li>本月热门</li>
                </ul>
              </div>
              <div class="tabCon" >
                <ul class="list5 list_1">
                   <?php if(function_exists('most_comm_posts')) most_comm_posts(30, 6); ?>
                </ul>
              </div>
            </div>
            <div class="tabBox ">
              <div class="tabMenu">
                <ul class="listNav clearHidden">

                  <li>历史热门</li>
                </ul>
              </div>
              <div class="tabCon" >
                <ul class="list5 list_1">
                   <?php if(function_exists('most_comm_posts')) most_comm_posts(720, 6); ?>
                </ul>
              </div>
            </div>
            <div class="tabBox ">
              <div class="tabMenu">
                <ul class="listNav clearHidden">
                  <li>最近热评</li>
                </ul>
              </div>
              <div class="tabCon" >
                <ul class="list5 list_1">
                  <?php some_posts( $orderby = 'date', $plusmsg = 'post_date', 6 ); ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="bgFoot"></div>
</div>
<?php get_footer(); ?>
