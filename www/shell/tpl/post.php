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


        <ol id="commentlist">
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