<div class="hfeed" id="primarycontent">
    <hr />
    <div class="navigation">
        <?php $prev = $post->getPrev(); ?>
        <?php $next = $post->getNext(); ?>
        <?php if ($prev): ?>
            <div class="left"><span>«</span> <a href="/post/<?php echo $prev->getId(); ?>"><?php echo $prev->title; ?></a></div>		
        <?php endif; ?>
        <?php if ($next): ?>
            <div class="right"><a href="/post/<?php echo $next->getId(); ?>"><?php echo $next->title; ?></a> <span>»</span></div>		
        <?php endif; ?>
        <div class="clear"></div>
    </div>

    <hr />

    <div class="post-<?php echo $post->getId(); ?> post type-post status-publish format-standard hentry" id="post-<?php echo $post->getId(); ?>">
        <div class="entry-head">
            <h3 class="entry-title"><a title="Постоянная ссылка на <?php echo $post->title; ?>" rel="bookmark" href="/post/<?php echo $post->getId(); ?>"><?php echo $post->title; ?></a></h3>

            <small class="entry-meta">
                <span class="chronodata">
                    Опубликовано <abbr title="<?php echo $post->getPublished("Y-m-d\TH:m:i+0000"); ?>" class="published"><?php echo $post->getPublished("d F Y"); ?></abbr></span>

                <a title="Комментариев к <?php echo $post->title; ?>" class="commentslink" href="/post/<?php echo $post->getId(); ?>/#comments"><?php echo $post->getCommentsCount(); ?>&nbsp;<span>Комментариев</span></a>				

                <br />				
            </small> <!-- .entry-meta -->
        </div> <!-- .entry-head -->

        <div class="entry-content">
            <p>
                <?php echo $post->body; ?>
            </p>
            <div class="sharedaddy sd-like-enabled">
                <div class="sd-block sd-like" id="wpl-likebox">
                </div>
            </div>
        </div> <!-- .entry-content -->
        <div class="clear"></div>
    </div> <!-- #post-ID -->

    <div class="comments">

        <h4><span id="comments"><?php echo $post->getCommentsCount(); ?></span> Ответов к “<?php echo $post->title; ?>”</h4>

        <div class="metalinks">
            <span class="commentsrsslink"><a href="/post/<?php echo $post->getId(); ?>/feed/">Feed for this Entry</a></span>
            <span class="trackbacklink"><a title="Copy this URI to trackback this entry." href="/post/<?php echo $post->getId(); ?>/trackback/">Trackback Address</a></span>		</div>
        <hr />

        <ol id="commentlist">
            <li id="comment-55596" class="comment even thread-even depth-1 highlander-comment">
                <div id="div-comment-55596">
                    <span class="comment-author vcard">
                        <img width="48" height="48" class="avatar avatar-48 grav-hashed grav-hijack" src="http://1.gravatar.com/avatar/b52cb736f100d405ec8f5367895222fd?s=48&amp;d=identicon&amp;r=G" alt="" id="grav-b52cb736f100d405ec8f5367895222fd-0">		<a title="Permanent Link to this Comment" class="counter" href="#comment-55596">1</a>
                        <span class="commentauthor fn"><a class="url" rel="external nofollow" href="http://www.siku-moja.blogspot.com">collins</a></span>
                    </span>
                    <small class="comment-meta">
                        <a title="3 years, 6 months ago." href="#comment-55596">25 April, 2008 at 8:59 pm</a>	</small>

                    <div class="comment-content">
                        <p>nice blog and quite good page ranking,how did you do it?</p>

                    </div>

                    <div class="reply">
                        <a onclick="return addComment.moveForm(&quot;div-comment-55596&quot;, &quot;55596&quot;, &quot;respond&quot;, &quot;<?php echo $post->getId(); ?>&quot;)" href="/2007/06/13/elle-effect/?replytocom=55596#respond" class="comment-reply-link">Reply</a>	</div>
                </div>
            </li>
            <li id="comment-55598" class="comment odd alt thread-odd thread-alt depth-1 highlander-comment">
                <div id="div-comment-55598">
                    <span class="comment-author vcard">
                        <img width="48" height="48" class="avatar avatar-48 grav-hashed grav-hijack" src="http://1.gravatar.com/avatar/3dc8f833402e23114198af2d49a3c785?s=48&amp;d=identicon&amp;r=G" alt="" id="grav-3dc8f833402e23114198af2d49a3c785-0">		<a title="Permanent Link to this Comment" class="counter" href="#comment-55598">2</a>
                        <span class="commentauthor fn"><a class="url" rel="external nofollow" href="http://www.qibt.co.nr">kang Choi</a></span>
                    </span>
                    <small class="comment-meta">
                        <a title="3 years, 6 months ago." href="#comment-55598">27 April, 2008 at 10:02 pm</a>	</small>

                    <div class="comment-content">
                        <p>I like the topic that you chose and it gives the people to make more interest about what it is going to next about Elle Effect.</p>

                    </div>


                    <div class="reply">
                        <a onclick="return addComment.moveForm(&quot;div-comment-55598&quot;, &quot;55598&quot;, &quot;respond&quot;, &quot;<?php echo $post->getId(); ?>&quot;)" href="/2007/06/13/elle-effect/?replytocom=55598#respond" class="comment-reply-link">Reply</a>	</div>
                </div>
            </li>
        </ol> <!-- END #commentlist -->

        <div class="navigation">
            <div class="alignleft"></div>
            <div class="alignright"></div>
        </div>
        <br />

        <ol id="pinglist">
        </ol> <!-- END #pinglist -->

    </div> <!-- END .comments 1 -->

    <div style="clear: both;"></div>			

    <hr/>

    <div class="navigation">
        <?php if ($prev): ?>
            <div class="left"><span>«</span> <a href="/post/<?php echo $prev->getId(); ?>"><?php echo $prev->title; ?></a></div>		
        <?php endif; ?>
        <?php if ($next): ?>
            <div class="right"><a href="/post/<?php echo $next->getId(); ?>"><?php echo $next->title; ?></a> <span>»</span></div>		
        <?php endif; ?>
        <div class="clear"></div>
    </div>

    <hr />

</div>