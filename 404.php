<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name=theme-color content="#fff">
    <meta name=color-scheme content="light dark">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel='icon' href='<?php $this->options->faviconUrl(); ?>' type='image/x-icon' />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.min.css'); ?>">
    <link rel=preconnect href=https://fonts.gstatic.com crossorigin>
    <link rel=stylesheet href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,400;0,500;0,700;1,400;1,700&amp;family=Source+Code+Pro:ital,wght@0,400;0,700;1,400;1,700&amp;family=Comfortaa:wght@700&amp;display=swap" media=print onload='this.media="all"'>
    <noscript>
    <link rel=stylesheet href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,400;0,500;0,700;1,400;1,700&amp;family=Source+Code+Pro:ital,wght@0,400;0,700;1,400;1,700&amp;family=Comfortaa:wght@700&amp;display=swap">
    </noscript>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    <?php if ($this->options->addheader): ?>
    <?php echo $this->options->addheader(); ?>
    <?php endif; ?>
</head>
     <body>
        <div class="container">
  <main class="fof">
    <div class="main-inner">
      <h1>404 Not Found</h1>
        <div class="fof-footer">
          <a href="<?php $this->options->siteUrl(); ?>">返回首页</a>
        </div>
    </div>
  </main>
         </div>
    </body>
</html>