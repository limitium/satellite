<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="/css/style.css" type="text/css"
          media="screen"/>

    <meta name="generator" content="WordPress 3.2.1"/>
</head>
<body>
<div class="all">
<div class="header">
    <h1><a href="/"><?php echo $title; ?></a></h1>

</div>
<!-- HEADER -->

<div class="menu1">
    <div class="menu2">
        <ul>
             <?php foreach ($pages as $url => $page): ?>
                            <li class="page_item page-item-<?php echo $url; ?>"><a href="/<?php echo $url; ?>" title="<?php echo $page['title']; ?>"><?php echo $page['title']; ?></a></li>
                        <?php endforeach; ?>
        </ul>
    </div>
    <!-- MENU 2 -->
</div>
<!-- MENU 1 -->
<div class="content">


<div class="contenttext">
 <?php echo $content; ?>

<!-- POST -->

<div class="navigation">
    <div class="alignleft"></div>
    <div class="alignright"></div>
</div>


</div>
<!-- CONTENT TEXT -->


</div>
<!-- CONTENT -->

<div class="sidebar">


    <div class="box1">

        <div class="box1text">
            <ul>
                <li class="categories">  <h2 class="widgettitle">Последние публикации</h2>
                        <ul>
                            <?php foreach ($recentPosts as $post): ?>
                                <li><a href="/post/<?php echo $post->getId(); ?>" title="<?php echo $post->title; ?>"><?php echo $post->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                </li>
            </ul>

        </div>
        <!-- BOX1 TEXT -->
    </div>
    <!-- BOX1 -->

    <div class="box2">
        <div class="box2text">
            <ul>
                <li> <h2 class="widgettitle">Архив</h2>
                        <ul>
                            <?php foreach ($archive as $uri => $text): ?>
                                <li><a href="/archive/<?php echo $uri; ?>" title="<?php echo $text; ?>"><?php echo $text; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                </li>
            </ul>
        </div>
        <!-- BOX2 TEXT -->

    </div>
    <!-- BOX2 -->

    <div class="box3">
        <div class="box3text">
            <ul>
                <li id="linkcat-2" class="linkcat"><?php echo $about; ?>
                </li>
            </ul>

        </div>
        <!-- BOX3 TEXT -->
    </div>
    <!-- BOX3 -->

</div>
<!-- SIDEBAR -->
<div style="clear: both;"></div>
<div class="footer">

    <div class="footertext">

        <?php echo $title; ?>
    </div>
    <!-- FOOTER -->
</div>
<!-- FOOTER TEXT-->
</div>
<!-- ALL -->

</body>
</html>