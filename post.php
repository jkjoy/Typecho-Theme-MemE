<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main class="main single" id=main>
    <div class=main-inner>
        <article class="content post h-entry" data-small-caps=true data-align=default data-type=posts data-toc-num=true>
            <h1 class="post-title p-name"><?php $this->title() ?></h1>
            <div class="post-description p-summary"><?php if($this->fields->summary){echo $this->fields->summary;} else {$this->excerpt(180);}?> </div>
            <div class=post-meta>
                    <time datetime=<?php $this->date(); ?> class="post-meta-item published dt-published">
                        <svg viewBox="0 0 448 512" class="icon post-meta-icon"><path d="M148 288h-40c-6.6.0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6.0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5.0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6.0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6.0 12 5.4 12 12v52h48c26.5.0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3.0 6-2.7 6-6z" /></svg>
                        <?php $this->date('Y.m.d'); ?>
                    </time>
                    <time datetime=<?php echo date('Y.m.d', $this->modified); ?> class="post-meta-item modified dt-updated">
                        <svg viewBox="0 0 448 512" class="icon post-meta-icon"><path d="M482 64h-48V12c0-6.627-5.373-12-12-12h-40c-6.627.0-12 5.373-12 12v52H160V12c0-6.627-5.373-12-12-12h-40c-6.627.0-12 5.373-12 12v52H48C21.49 64 0 85.49 0 112v352c0 26.51 21.49 48 48 48h352c26.51.0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm-6 402H54a6 6 0 01-6-6V160h352v298a6 6 0 01-6 6zm-52.849-200.65L198.842 404.519c-4.705 4.667-12.303 4.637-16.971-.068l-75.091-75.699c-4.667-4.705-4.637-12.303.068-16.971l22.719-22.536c4.705-4.667 12.303-4.637 16.97.069l44.104 44.461 111.072-110.181c4.705-4.667 12.303-4.637 16.971.068l22.536 22.718c4.667 4.705 4.636 12.303-.069 16.97z" /></svg>
                        <?php echo date('Y.m.d', $this->modified); ?>
                    </time>
                    <span class="post-meta-item category">
                        <svg viewBox="0 0 512 512" class="icon post-meta-icon"><path d="M464 128H272l-54.63-54.63c-6-6-14.14-9.37-22.63-9.37H48C21.49 64 0 85.49.0 112v288c0 26.51 21.49 48 48 48h416c26.51.0 48-21.49 48-48V176c0-26.51-21.49-48-48-48zm0 272H48V112h140.12l54.63 54.63c6 6 14.14 9.37 22.63 9.37H464v224z" /></svg>
                        <?php foreach($this->categories as $category): ?>
                        <a href="<?php echo $category['permalink']; ?>" class="category-link p-category">
                        <?php echo $category['name']; ?>
                        </a>
                        <?php endforeach; ?> 
                    </span>
                    <span class="post-meta-item wordcount">
                        <svg viewBox="0 0 512 512" class="icon post-meta-icon"><path d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3.0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9.0l60.1 60.1c18.8 18.7 18.8 49.1.0 67.9zM284.2 99.8 21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3.0-17l-111-111c-4.8-4.7-12.4-4.7-17.1.0zM124.1 339.9c-5.5-5.5-5.5-14.3.0-19.8l154-154c5.5-5.5 14.3-5.5 19.8.0s5.5 14.3.0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8.0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z" /></svg>
                        <?php echo ArticleWordCount($this->content); ?>
                    </span>
                    <span class="post-meta-item reading-time">
                        <svg viewBox="0 0 512 512" class="icon post-meta-icon"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5.0-2e2-89.5-2e2-2e2S145.5 56 256 56s2e2 89.5 2e2 2e2-89.5 2e2-2e2 2e2zm61.8-104.4-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6.0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                            <?php echo getReadingTime($this->content); ?> mins
                    </span>
            </div>
            <div class="post-body e-content">
                <?php $this->content(); ?> 
            </div>
            <!--
            <ul class=post-copyright>
                <li class="copyright-item author">
                    <span class=copyright-item-text>署名</span>: 
                    <?php $this->author(); ?>
                </li>
                <li class="copyright-item link">
                    <span class=copyright-item-text>链接</span>: 
                    <a href=<?php $this->permalink() ?> target=_blank rel=noopener><?php $this->permalink() ?></a>
                </li>
                <li class="copyright-item license">
                    <span class=copyright-item-text>许可</span>:
                    <a href=https://creativecommons.org/licenses/by-nc-sa/4.0/deed.en target=_blank rel=noopener>CC BY-NC-SA 4.0</a>
                </li>
            </ul>
            -->
        </article>
        <div class=updated-badge-container>
            <span title="更新于 @ <?php echo date('Y.m.d', $this->modified); ?>" style=cursor:help>
                <svg width="130" height="20" class="updated-badge">
                    <linearGradient id="b" x2="0" y2="100%">
                        <stop offset="0" stop-color="#bbb" stop-opacity=".1" />
                        <stop offset="1" stop-opacity=".1" />
                    </linearGradient>
                    <clipPath id="a">
                        <rect width="130" height="20" rx="3" fill="#fff" />
                    </clipPath>
                    <g clip-path="url(#a)">
                        <path class="updated-badge-left" d="M0 0h55v20H0z" />
                        <path class="updated-badge-right" d="M55 0h75v20H55z" />
                        <path fill="url(#b)" d="M0 0h130v20H0z" />
                    </g>
                    <g fill="#fff" text-anchor="middle" font-size="110">
                        <text x="285" y="150" fill="#010101" fill-opacity=".3" textLength="450" transform="scale(.1)">updated</text>
                        <text x="285" y="140" textLength="450" transform="scale(.1)">updated</text>
                        <text x="915" y="150" fill="#010101" fill-opacity=".3" textLength="650" transform="scale(.1)"><?php echo date('Y-m-d', $this->modified); ?></text>
                        <text x="915" y="140" textLength="650" transform="scale(.1)"><?php echo date('Y-m-d', $this->modified); ?></text>
                    </g>
                </svg>
            </span>
        </div>
                <div class=post-share>
                    <div class=share-items>
                        <div class="share-item facebook">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->permalink() ?>&amp;hashtag=%23markdown" title="Share on Facebook" target=_blank rel=noopener>
                                <svg viewBox="0 0 512 512"
                                    class="icon facebook-icon">
                                    <path
                                        d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14.0 55.52 4.84 55.52 4.84v61h-31.28c-30.8.0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                                </svg>
                            </a>
                        </div>
                        <div class="share-item x">
                            <a href="https://x.com/share?url=<?php $this->permalink() ?>&amp;text=<?php $this->title() ?>&amp;via=<?php $this->author->screenName(); ?>"
                                title="Share on 𝕏" target=_blank rel=noopener>
                                <svg viewBox="0 0 512 512"
                                    class="icon x-icon">
                                    <path
                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                </svg>
                            </a>
                        </div>
                        <div class="share-item linkedin">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>&amp;" title="Share on LinkedIn" target=_blank rel=noopener>
                            <svg viewBox="0 0 448 512" class="icon linkedin-icon">
                                <path d="M416 32H31.9C14.3 32 0 46.5.0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6.0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3.0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2.0 38.5 17.3 38.5 38.5.0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6.0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2.0 79.7 44.3 79.7 101.9V416z" />
                            </svg>
                            </a>
                        </div>
                        <div class="share-item telegram">
                            <a href="https://t.me/share/url?url=<?php $this->permalink() ?>&amp;text=<?php $this->title() ?>"
                                title="Share on Telegram" target=_blank rel=noopener>
                                <svg viewBox="0 0 496 512" class="icon telegram-icon">
                                    <path
                                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z" />
                                </svg>
                            </a>
                        </div>
                        <div class="share-item weibo">
                            <a href="https://service.weibo.com/share/share.php?&amp;url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>&amp;pic=https://io-oi.me/icons/apple-touch-icon.png&amp;searchPic=false"
                                title="Share on Weibo" target=_blank rel=noopener>
                                <svg viewBox="0 0 512 512" class="icon weibo-icon">
                                    <path
                                        d="M407 177.6c7.6-24-13.4-46.8-37.4-41.7-22 4.8-28.8-28.1-7.1-32.8 50.1-10.9 92.3 37.1 76.5 84.8-6.8 21.2-38.8 10.8-32-10.3zM214.8 446.7C108.5 446.7.0 395.3.0 310.4c0-44.3 28-95.4 76.3-143.7C176 67 279.5 65.8 249.9 161c-4 13.1 12.3 5.7 12.3 6 79.5-33.6 140.5-16.8 114 51.4-3.7 9.4 1.1 10.9 8.3 13.1 135.7 42.3 34.8 215.2-169.7 215.2zm143.7-146.3c-5.4-55.7-78.5-94-163.4-85.7-84.8 8.6-148.8 60.3-143.4 116s78.5 94 163.4 85.7c84.8-8.6 148.8-60.3 143.4-116zM347.9 35.1c-25.9 5.6-16.8 43.7 8.3 38.3 72.3-15.2 134.8 52.8 111.7 124-7.4 24.2 29.1 37 37.4 12 31.9-99.8-55.1-195.9-157.4-174.3zm-78.5 311c-17.1 38.8-66.8 60-109.1 46.3-40.8-13.1-58-53.4-40.3-89.7 17.7-35.4 63.1-55.4 103.4-45.1 42 10.8 63.1 50.2 46 88.5zm-86.3-30c-12.9-5.4-30 .3-38 12.9-8.3 12.9-4.3 28 8.6 34 13.1 6 30.8.3 39.1-12.9 8-13.1 3.7-28.3-9.7-34zm32.6-13.4c-5.1-1.7-11.4.6-14.3 5.4-2.9 5.1-1.4 10.6 3.7 12.9 5.1 2 11.7-.3 14.6-5.4 2.8-5.2 1.1-10.9-4-12.9z" />
                                </svg>
                            </a>
                        </div>
                        <div class="share-item qq">
                            <a href="https://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>&amp;pics=https://io-oi.me/icons/apple-touch-icon.png&amp;site=Hugo%20Theme%20MemE"
                                title="Share on QQ" target=_blank rel=noopener>
                                <svg viewBox="0 0 448 512" class="icon qq-icon">
                                    <path
                                        d="M433.754 420.445c-11.526 1.393-44.86-52.741-44.86-52.741.0 31.345-16.136 72.247-51.051 101.786 16.842 5.192 54.843 19.167 45.803 34.421-7.316 12.343-125.51 7.881-159.632 4.037-34.122 3.844-152.316 8.306-159.632-4.037-9.045-15.25 28.918-29.214 45.783-34.415-34.92-29.539-51.059-70.445-51.059-101.792.0.0-33.334 54.134-44.859 52.741-5.37-.65-12.424-29.644 9.347-99.704 10.261-33.024 21.995-60.478 40.144-105.779C60.683 98.063 108.982.006 224 0c113.737.006 163.156 96.133 160.264 214.963 18.118 45.223 29.912 72.85 40.144 105.778 21.768 70.06 14.716 99.053 9.346 99.704z" />
                                </svg>
                            </a>
                        </div>
                        <div class="share-item qrcode">
                            <div class=qrcode-container title="Share via QR Code">
                                <svg viewBox="0 0 448 512"
                                    class="icon qrcode-icon">
                                    <path
                                        d="M0 224h192V32H0v192zM64 96h64v64H64V96zm192-64v192h192V32H256zm128 128h-64V96h64v64zM0 480h192V288H0v192zm64-128h64v64H64v-64zm352-64h32v128h-96v-32h-32v96h-64V288h96v32h64v-32zm0 160h32v32h-32v-32zm-64 0h32v32h-32v-32z" />
                                </svg>
                                <div id=qrcode-img></div>
                            </div>
                            <script src=<?php $this->options->themeUrl('js/qrcode.min.js') ?>></script>
                            <script>const typeNumber = 0, errorCorrectionLevel = "L", qr = qrcode(typeNumber, errorCorrectionLevel); qr.addData("<?php $this->permalink() ?>"), qr.make(), document.getElementById("qrcode-img").innerHTML = qr.createImgTag()</script>
                        </div>
                        <div class="share-item email">
                            <a
                                href="mailto:?subject=<?php $this->title() ?>&amp;body=<?php $this->permalink() ?>"
                                title="Share via email" target=_blank rel=noopener>
                                <svg viewBox="0 0 512 512"
                                    class="icon email-icon">
                                    <path
                                        d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V4e2c0 26.5-21.5 48-48 48H48c-26.5.0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5.0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <?php $this->related(5)->to($relatedPosts); ?> 
                <?php if ($relatedPosts->have()): ?>                 
                <div class=related-posts>
                    <h2 class=related-title>相关文章:
                        <svg viewBox="0 0 512 512" class="icon related-icon">
                            <path
                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6.0-12-5.4-12-12v-92h-92c-6.6.0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6.0 12 5.4 12 12v92h92c6.6.0 12 5.4 12 12v56z" />
                        </svg>
                    </h2>
                    <ul class=related-list>
                        <?php while ($relatedPosts->next()): ?>     
                        <li class=related-item>
                            <a href=<?php $relatedPosts->permalink(); ?>
                                class=related-link><?php $relatedPosts->title(); ?>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>                
                <div class=post-tags>
                    <?php if ($this->tags): ?>
                    <?php foreach ($this->tags as $tag): ?>
                    <a href="<?php echo $tag['permalink']; ?>" rel=tag class=post-tags-link>
                        <svg viewBox="0 0 512 512" class="icon tag-icon"><path d="M0 252.118V48C0 21.49 21.49.0 48 0h204.118a48 48 0 0133.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137.0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882.0L14.059 286.059A48 48 0 010 252.118zM112 64c-26.51.0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z" /></svg>
                        <?php echo $tag['name']; ?>
                    </a> 
                    <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
                <ul class=post-nav>
                    <li class=post-nav-prev>
                        <?php $this->thePrev('%s',''); ?>
                    </li>
                    <li class=post-nav-next>
                        <?php $this->theNext('%s',''); ?>
                    </li>
                </ul>
                <div class="load-comments">
                    <div id="load-comments"></div>
                </div>
                <?php $this->need('comments.php'); ?>
<!--
                <div id="tcomment"></div>
<script src="https://cdn.jsdelivr.net/npm/twikoo@1.6.44/dist/twikoo.min.js"></script>
<script>
twikoo.init({
  envId: 'https://t.imsun.org', 
  el: '#tcomment', 
})
</script>-->
    </div>
</main>
<?php $this->need('footer.php'); ?>