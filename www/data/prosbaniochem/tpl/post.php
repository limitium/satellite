<div class="hfeed" id="primarycontent">
    <hr />

    <div class="post-<?php echo $post->getId(); ?> post type-post status-publish format-standard hentry" id="post-<?php echo $post->getId(); ?>">
        <div class="entry-head">
            <h3 class="entry-title"><a title="Постоянная ссылка на <?php echo $post->title; ?>" rel="bookmark" href="/post/<?php echo $post->getId(); ?>"><?php echo $post->title; ?></a></h3>

            <small class="entry-meta">
                <span class="chronodata">
                    Опубликовано <abbr title="<?php echo $post->getPublished("Y-m-d\TH:m:i+0000"); ?>" class="published"><?php echo $post->getPublished("d F Y"); ?></abbr></span>


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



    </div> <!-- END .comments 1 -->

    <div style="clear: both;"></div>			

    <hr/>


</div>