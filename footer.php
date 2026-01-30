<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id=back-to-top class=back-to-top>
    <a href=#top aria-label="Back to top">
        <svg viewBox="0 0 448 512" class="icon arrow-up"><path d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6.0-33.9L207 39c9.4-9.4 24.6-9.4 33.9.0l194.3 194.3c9.4 9.4 9.4 24.6.0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3.0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z" /></svg>
    </a>
</div>
<footer id=footer class=footer>
    <div class=footer-inner>
        <div class=site-info>
        &copy; 1969–<?php echo date('Y'); ?>&nbsp;
        <svg viewBox="0 0 512 512" class="icon footer-icon"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3.0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" /></svg>
                    &nbsp;<?php $this->options->title() ?>
        </div>
        <div class=powered-by>
            Powered by
            <a href=https://typecho.org target=_blank rel=noopener>Typecho</a> 
            | Theme is 
            <a href=https://github.com/jkjoy/typecho-theme-meme target=_blank rel=noopener>MemE</a>
        </div>
        <div class=site-copyright>
            <a href=https://creativecommons.org/licenses/by-nc-sa/4.0/deed.en target=_blank rel=noopener>
                CC BY-NC-SA 4.0
            </a>
            <?php _e('页面加载耗时'); ?><?php echo timer_stop();?>
            <a class="beian" href="https://beian.miit.gov.cn/" rel="external nofollow" target="_blank" title="备案号"><?php $this->options->icpbeian() ?></a>
        </div>
        <?php if ($this->options->tongji): ?>
        <?php echo $this->options->tongji(); ?>
        <?php endif; ?>
        <ul class=socials>
            <li class=socials-item>
                <a href=/feed target=_blank rel="external noopener" title=RSS>
                    <svg viewBox="0 0 24 24" class="icon social-icon"><path d="M19.199 24C19.199 13.467 10.533 4.8.0 4.8V0c13.165.0 24 10.835 24 24h-4.801zM3.291 17.415c1.814.0 3.293 1.479 3.293 3.295.0 1.813-1.485 3.29-3.301 3.29C1.47 24 0 22.526.0 20.71s1.475-3.294 3.291-3.295zM15.909 24h-4.665c0-6.169-5.075-11.245-11.244-11.245V8.09c8.727.0 15.909 7.184 15.909 15.91z" /></svg>
                </a>
            </li>
            <?php if($this->options->email): ?>
            <li class=socials-item>
                <a href=mailto:<?php echo $this->options->email; ?> target=_blank rel="external noopener" title=Email>
                    <svg viewBox="0 0 512 512" class="icon social-icon">
                        <path
                            d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 402V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V402H48z" />
                    </svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if($this->options->github): ?>
            <li class=socials-item>
                <a href=<?php echo $this->options->github; ?> target=_blank rel="external noopener"
                    title=GitHub>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon social-icon"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M173.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM252.8 8c-138.7 0-244.8 105.3-244.8 244 0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1 100-33.2 167.8-128.1 167.8-239 0-138.7-112.5-244-251.2-244zM105.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9s4.3 3.3 5.6 2.3c1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if($this->options->weibo): ?>
            <li class=socials-item>
                <a href=<?php echo $this->options->weibo; ?> target=_blank rel="external noopener"
                    title=Weibo>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon social-icon"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M407 177.6c7.6-24-13.4-46.8-37.4-41.7-22 4.8-28.8-28.1-7.1-32.8 50.1-10.9 92.3 37.1 76.5 84.8-6.8 21.2-38.8 10.8-32-10.3zM214.8 446.7c-106.3 0-214.8-51.4-214.8-136.3 0-44.3 28-95.4 76.3-143.7 99.7-99.7 203.2-100.9 173.6-5.7-4 13.1 12.3 5.7 12.3 6 79.5-33.6 140.5-16.8 114 51.4-3.7 9.4 1.1 10.9 8.3 13.1 135.7 42.3 34.8 215.2-169.7 215.2zM358.5 300.4c-5.4-55.7-78.5-94-163.4-85.7-84.8 8.6-148.8 60.3-143.4 116s78.5 94 163.4 85.7c84.8-8.6 148.8-60.3 143.4-116zM347.9 35.1c-25.9 5.6-16.8 43.7 8.3 38.3 72.3-15.2 134.8 52.8 111.7 124-7.4 24.2 29.1 37 37.4 12 31.9-99.8-55.1-195.9-157.4-174.3zm-78.5 311c-17.1 38.8-66.8 60-109.1 46.3-40.8-13.1-58-53.4-40.3-89.7 17.7-35.4 63.1-55.4 103.4-45.1 42 10.8 63.1 50.2 46 88.5zm-86.3-30c-12.9-5.4-30 .3-38 12.9-8.3 12.9-4.3 28 8.6 34 13.1 6 30.8 .3 39.1-12.9 8-13.1 3.7-28.3-9.7-34zm32.6-13.4c-5.1-1.7-11.4 .6-14.3 5.4-2.9 5.1-1.4 10.6 3.7 12.9 5.1 2 11.7-.3 14.6-5.4 2.8-5.2 1.1-10.9-4-12.9z"/></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if($this->options->telegram): ?>
            <li class=socials-item>
                <a href=<?php echo $this->options->telegram; ?> target=_blank rel="external noopener"
                    title=Telegram>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon social-icon"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 8a248 248 0 1 0 0 496 248 248 0 1 0 0-496zM371 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5c-2.2 .5-37.1 23.5-104.6 69.1-9.9 6.8-18.9 10.1-26.9 9.9-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3 .6-4.5 6.7-9 18.4-13.7 72.3-31.5 120.5-52.3 144.6-62.3 68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9 2 1.7 3.2 4.1 3.5 6.7 .5 3.2 .6 6.5 .4 9.8z"/></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if($this->options->mastodon): ?>
            <li class=socials-item>
                <a href=<?php echo $this->options->mastodon; ?> target=_blank rel="external noopener" title=Mastodon>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icon social-icon"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M433 179.1c0-97.2-63.7-125.7-63.7-125.7-62.5-28.7-228.6-28.4-290.5 0 0 0-63.7 28.5-63.7 125.7 0 115.7-6.6 259.4 105.6 289.1 40.5 10.7 75.3 13 103.3 11.4 50.8-2.8 79.3-18.1 79.3-18.1l-1.7-36.9s-36.3 11.4-77.1 10.1c-40.4-1.4-83-4.4-89.6-54-.6-4.6-.9-9.3-.9-13.9 85.6 20.9 158.7 9.1 178.7 6.7 56.1-6.7 105-41.3 111.2-72.9 9.8-49.8 9-121.5 9-121.5zM357.9 304.3l-46.6 0 0-114.2c0-49.7-64-51.6-64 6.9l0 62.5-46.3 0 0-62.5c0-58.5-64-56.6-64-6.9l0 114.2-46.7 0c0-122.1-5.2-147.9 18.4-175 25.9-28.9 79.8-30.8 103.8 6.1l11.6 19.5 11.6-19.5c24.1-37.1 78.1-34.8 103.8-6.1 23.7 27.3 18.4 53 18.4 175l0 0z"/></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if($this->options->twitter): ?>
            <li class=socials-item>
                <a href=<?php echo $this->options->twitter; ?> target=_blank rel="external noopener" title=Twitter>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icon social-icon"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M357.2 48L427.8 48 273.6 224.2 455 464 313 464 201.7 318.6 74.5 464 3.8 464 168.7 275.5-5.2 48 140.4 48 240.9 180.9 357.2 48zM332.4 421.8l39.1 0-252.4-333.8-42 0 255.3 333.8z"/></svg>
                </a>    
            </li>
            <?php endif; ?>
            <?php if($this->options->bilibili): ?>
            <li class=socials-item>
                <a href=<?php echo $this->options->bilibili; ?> target=_blank rel="external noopener"
                    title=Bilibili>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon social-icon"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M488.6 104.1c16.7 18.1 24.4 39.7 23.3 65.7l0 202.4c-.4 26.4-9.2 48.1-26.5 65.1-17.2 17-39.1 25.9-65.5 26.7L92 464c-26.4-.8-48.2-9.8-65.3-27.2-17.1-17.4-26-40.3-26.7-68.6L0 169.8c.8-26 9.7-47.6 26.7-65.7 17.1-16.3 38.8-25.3 65.3-26.1l29.4 0-25.4-25.8c-5.7-5.7-8.6-13-8.6-21.8s2.9-16.1 8.6-21.8 13-8.6 21.9-8.6 16.1 2.9 21.9 8.6l73.3 69.4 88 0 74.5-69.4C381.7 2.9 389.2 0 398 0s16.1 2.9 21.9 8.6c5.7 5.7 8.6 13 8.6 21.8s-2.9 16.1-8.6 21.8L394.6 78 423.9 78c26.4 .8 48 9.8 64.7 26.1zm-38.8 69.7c-.4-9.6-3.7-17.4-10.7-23.5-5.2-6.1-14-9.4-22.7-9.8l-320.4 0c-9.6 .4-17.4 3.7-23.6 9.8-6.1 6.1-9.4 13.9-9.8 23.5l0 194.4c0 9.2 3.3 17 9.8 23.5s14.4 9.8 23.6 9.8l320.4 0c9.2 0 17-3.3 23.3-9.8s9.7-14.3 10.1-23.5l0-194.4zM185.5 216.5c6.3 6.3 9.7 14.1 10.1 23.2l0 33.3c-.4 9.2-3.7 16.9-9.8 23.2-6.2 6.3-14 9.5-23.6 9.5s-17.5-3.2-23.6-9.5-9.4-14-9.8-23.2l0-33.3c.4-9.1 3.8-16.9 10.1-23.2s13.2-9.6 23.3-10c9.2 .4 17 3.7 23.3 10zm191.5 0c6.3 6.3 9.7 14.1 10.1 23.2l0 33.3c-.4 9.2-3.7 16.9-9.8 23.2s-14 9.5-23.6 9.5-17.4-3.2-23.6-9.5c-7-6.3-9.4-14-9.7-23.2l0-33.3c.3-9.1 3.7-16.9 10-23.2s14.1-9.6 23.3-10c9.2 .4 17 3.7 23.3 10z"/></svg>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</footer>
</div>
<script src=<?php $this->options->themeUrl('js/medium-zoom.min.js'); ?>></script>
<script>let imgNodes = document.querySelectorAll("div.post-body img"); imgNodes = Array.from(imgNodes).filter(e => e.parentNode.tagName !== "A"), mediumZoom(imgNodes, { background: "hsla(var(--color-bg-h), var(--color-bg-s), var(--color-bg-l), 0.95)" })</script>
<script src=<?php $this->options->themeUrl('js/instantpage.min.js'); ?> type=module defer></script>
<?php $this->footer(); ?>
</body>
</html>