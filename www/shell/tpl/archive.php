<div id="primarycontent" class="hfeed">
    <h2>Архив за <?php echo $archiveDate; ?></h2>
    <?php foreach ($posts as $post): ?>
        <div id="post-<?php echo $post->getId(); ?>" class="post-<?php echo $post->getId(); ?> post type-post status-publish format-standard hentry">
            <div class="entry-head">
                <h3 class="entry-title"><a href="/post/<?php echo $post->getId(); ?>" rel="bookmark" title="Постоянная ссылка на <?php echo $post->title; ?>"><?php echo $post->title; ?></a></h3>

                <small class="entry-meta">
                    <span class="chronodata">
                        Опубликовано <abbr class="published" title="<?php echo $post->getPublished("Y-m-d\TH:m:i+0000"); ?>"><?php echo $post->getPublished("d F Y"); ?></abbr></span>
                    <a href="/post/<?php echo $post->getId(); ?>/#comments" class="commentslink" title="Комментарии к <?php echo $post->title; ?>"><?php echo $post->getCommentsCount(); ?>&nbsp;<span>Комментариев</span></a>				

                    <br>				
                </small> <!-- .entry-meta -->
            </div> <!-- .entry-head -->

            <div class="entry-content">
                <p>
                    <?php echo $post->body; ?>
                </p>
                <div class="sharedaddy"></div>
            </div> <!-- .entry-content -->
            <div class="clear"></div>
        </div> <!-- #post-ID -->
    <?php endforeach; ?>
</div><!-- #primarycontent .hfeed -->