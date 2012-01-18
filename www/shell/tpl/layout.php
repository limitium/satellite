<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="generator" content="WordPress.com" />

        <meta property="og:type" content="blog" />
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:url" content="/" />
        <meta property="og:description" content="" />
        <meta property="og:site_name" content="<?php echo $title; ?>" />
        <meta property="og:image" content="" />

        <meta name='Description' content='<?php echo $description ?>' >
        <meta name='Keywords' content='<?php echo $keys ?>'>
        <meta name="application-name" content="<?php echo $title; ?>" />
        <meta name="msapplication-window" content="width=device-width;height=device-height" />

        <link rel="shortcut icon" type="image/x-icon" href="http://s2.wp.com/i/favicon.ico" sizes="16x16 24x24 32x32 48x48" />
        <link rel="icon" type="image/x-icon" href="http://s2.wp.com/i/favicon.ico" sizes="16x16 24x24 32x32 48x48" />

        <link rel="stylesheet" type="text/css" media="screen" href="/css/style_002.css" />
        <link rel="stylesheet" type="text/css" media="print" href="/css/print.css" />        
        <link rel="stylesheet" href="/css/global.css" type="text/css" />
        <link rel="stylesheet" id="loggedout-subscribe-css" href="/css/widget.css" type="text/css" media="all" />
        <link rel="stylesheet" id="post-reactions-css" href="/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" id="gravatar-card-css" href="/css/hovercard.css" />
        <link rel="stylesheet" type="text/css" id="gravatar-card-services-css" href="/css/services.css" />
        <style type="text/css">.recentcomments a{display:inline !important;padding: 0 !important;margin: 0 !important;}</style>
        <style type="text/css">
            table.recentcommentsavatar img.avatar {border: 0px; margin:0;}
            table.recentcommentsavatar a {border: 0px !important;background-color: transparent !important}
            td.recentcommentsavatartop {padding:0px 0px 1px 0px;margin:0px; }
            td.recentcommentsavatarend {padding:0px 0px 1px 0px;margin:0px; }
            td.recentcommentstexttop { border: none !important;padding:0px 0px 0px 10px;}
            td.recentcommentstextend { border: none !important;padding:0px 0px 2px 10px;}
        </style>


        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/widget.js"></script>
        <script type="text/javascript" async="" src="/js/quant.js"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            function addLoadEvent(func){var oldonload=window.onload;if(typeof window.onload!='function'){window.onload=func;}else{window.onload=function(){oldonload();func();}}}
            /* ]]> */
        </script>
        <title> <?php echo $title; ?></title>
    </head>

    <body class="typekit-enabled highlander-enabled highlander-light">
        <div id="page">
            <div id="header">
                <h1><a href="/"><?php echo $title; ?></a></h1>
                <p class="description"></p>

                <div class="menu">
                    <ul id="nav" class="menu">
                        <li class="c1urrent_page_item"><a href="/" title="Blog">Публикации</a></li>
                        <?php foreach ($pages as $url => $page): ?>
                            <li class="page_item page-item-<?php echo $url; ?>"><a href="/<?php echo $url; ?>" title="<?php echo $page->title; ?>"><?php echo $page->title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <hr />
            <div class="content">
                <div id="primary">
                    <div id="current-content">
                        <?php echo $content; ?>
                    </div> <!-- #current-content -->

                    <div id="dynamic-content"></div>
                </div> <!-- #primary -->

                <hr />

                <div class="secondary">

                    <div id="text-1" class="widget widget_text"><h2 class="widgettitle">О блоге</h2>
                        <div class="textwidget"><?php echo $about; ?></div>
                    </div>		
                    <div id="recent-posts-2" class="widget widget_recent_entries">		
                        <h2 class="widgettitle">Последние публикации</h2>
                        <ul>
                            <?php foreach ($recentPosts as $post): ?>
                                <li><a href="/post/<?php echo $post->getId(); ?>" title="<?php echo $post->title; ?>"><?php echo $post->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div id="archives-2" class="widget widget_archive">
                        <h2 class="widgettitle">Архив</h2>
                        <ul>
                            <?php foreach ($archive as $uri => $text): ?>
                                <li><a href="/archive/<?php echo $uri; ?>" title="<?php echo $text; ?>"><?php echo $text; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>

            </div> <!-- .content -->

            <div class="clear"></div>

        </div> <!-- Close Page -->

        <hr />

        <style type="text/css">

            .reblog-from img                   { margin: 0 10px 0 0; vertical-align: middle; padding: 0; border: 0; }
            .reblogger-note img.avatar         { float: left; padding: 0; border: 0; }
            .reblogger-note-content            { margin: 0 0 20px 35px; }
            .reblog-post                       { border-left: 3px solid #eee; padding-left: 15px; }
            .reblog-post ul.thumb-list         { display: block; list-style: none; margin: 2px 0; padding: 0; clear: both; }
            .reblog-post ul.thumb-list li      { display: inline; margin: 0; padding: 0 1px; border: 0; }
            .reblog-post ul.thumb-list li a    { margin: 0; padding: 0; border: 0; }
            .reblog-post ul.thumb-list li img  { margin: 0; padding: 0; border: 0; }
            .reblog-post                       { border-left: 3px solid #eee; padding-left: 15px; }
        </style>	


    </body>
</html>