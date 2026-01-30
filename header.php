<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name=theme-color content="#16171d">
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
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/meme.min.js'); ?>"></script>
   
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    <?php if ($this->options->addheader): ?>
    <?php echo $this->options->addheader(); ?>
    <?php endif; ?>
</head>
<body>
  <div class=container>
    <header class=header>
      <div class=header-wrapper>
        <div class="header-inner single">
          <div class=site-brand>
            <a href="<?php $this->options->siteUrl(); ?>" class=brand title="<?php $this->options->description() ?>"><?php $this->options->title() ?></a>
          </div>
          <nav class=nav>
            <ul class=menu id=menu>
              <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
              <?php while($pages->next()): ?>
              <li class=menu-item>
                <a href="<?php $pages->permalink(); ?>">
                  <span class=menu-item-name><?php echo pageIcon($pages->slug, $pages->title); ?></span>
                </a>
              </li>
              <?php endwhile; ?>
              <li class=menu-item>
                <button id=theme-switcher type=button aria-label="Switch theme">
                  <svg viewBox="0 0 512 512" class="icon theme-icon-light">
                    <path
                      d="M193.2 104.5 242 7a18 18 0 0128 0l48.8 97.5L422.2 70A18 18 0 01442 89.8l-34.5 103.4L505 242a18 18 0 010 28l-97.5 48.8L442 422.2A18 18 0 01422.2 442l-103.4-34.5L270 505a18 18 0 01-28 0l-48.8-97.5L89.8 442A18 18 0 0170 422.2l34.5-103.4-97.5-48.8a18 18 0 010-28l97.5-48.8L70 89.8A18 18 0 0189.8 70zM256 128a128 128 0 10.01.0M256 160a96 96 0 10.01.0" />
                  </svg>
                  <svg viewBox="0 0 512 512" class="icon theme-icon-dark">
                    <path
                      d="M27 412A256 256 0 10181 5a11.5 11.5.0 00-5 20A201.5 201.5.0 0142 399a11.5 11.5.0 00-15 13" />
                  </svg>
                  <svg viewBox="0 0 576 512" class="icon theme-icon-system">
                    <path
                      d="M528 0H48C21.5.0.0 21.5.0 48v320c0 26.5 21.5 48 48 48h192l-16 48h-72c-13.3.0-24 10.7-24 24s10.7 24 24 24h272c13.3.0 24-10.7 24-24s-10.7-24-24-24h-72l-16-48h192c26.5.0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zm-16 352H64V64h448v288z" />
                  </svg>
                </button>
              </li>
              
            </ul>
          </nav>        	
        </div>
	    </div>
      <input type=checkbox id=nav-toggle aria-hidden=true>
      <label for=nav-toggle class=nav-toggle></label>
      <label for=nav-toggle class=nav-curtain></label>
    </header>