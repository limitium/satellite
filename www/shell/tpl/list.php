<div id="primarycontent" class="hfeed">
    <?php foreach ($posts as $post): ?>
        <div id="post-318" class="post-318 post type-post status-publish format-standard hentry category-art category-arts category-christianity category-faith category-ideas category-life category-photo category-religion category-spirituality category-women">
            <div class="entry-head">
                <h3 class="entry-title"><a href="http://bestblog.wordpress.com/2007/06/13/elle-effect/" rel="bookmark" title="Permanent link to Elle&nbsp;Effect"><?php echo $post->title; ?></a></h3>

                <small class="entry-meta">
                    <span class="chronodata">
                        Published <abbr class="published" title="2007-06-13T11:05:14+0000">13 June, 2007</abbr>					</span>
                    <a href="http://bestblog.wordpress.com/2007/06/13/elle-effect/#comments" class="commentslink" title="Comment on Elle&nbsp;Effect"><?php echo $post->getCommentsCount(); ?>&nbsp;<span>Comments</span></a>				

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
<p align="center"><a href="http://bestblog.wordpress.com/page/2/">Next Page »</a></p>