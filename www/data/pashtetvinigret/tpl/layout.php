<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?php echo $title; ?></title>
    <meta name="generator" content="WordPress.com"/>
    <link rel="stylesheet" href="/data/pashtetvinigret/css/style.css" type="text/css"
          media="screen"/>

    <link rel='index' title='<?php echo $title; ?>' href='/'/>
    <meta name="generator" content="WordPress 3.2.1"/>

</head>
<body>

<div id="wrapper">

<h1><a href="http://wp-themes.com/"><?php echo $title; ?></a></h1>


<div id="main">
 <?php echo $content; ?>

<ul>

<div class="navigation"><p></p></div>

</div>
<!-- // main -->


<div id="sidebar">
    <ul>

        <li>
            <ul>

               <li class="c1urrent_page_item"><a href="/" title="Blog">Публикации</a></li>
                        <?php foreach ($pages as $url => $page): ?>
                            <li class="page_item page-item-<?php echo $url; ?>"><a href="/<?php echo $url; ?>" title="<?php echo $page['title']; ?>"><?php echo $page['title']; ?></a></li>
                        <?php endforeach; ?>

            </ul>

            <p><?php echo $about; ?></p>

        </li>

        <li class="credits">
           <h2 class="widgettitle">Последние публикации</h2>
                        <ul>
                            <?php foreach ($recentPosts as $post): ?>
                                <li><a href="/post/<?php echo $post->getId(); ?>" title="<?php echo $post->title; ?>"><?php echo $post->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>

        </li>
    </ul>
</div>
<!-- // sidebar -->

<div id="footer">
</div>

</div>
<!-- // wrapper -->


</body>
</html>
