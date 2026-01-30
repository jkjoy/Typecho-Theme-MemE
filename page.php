<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main class="main single" id=main>
    <div class=main-inner>
        <article class="content post h-entry" data-small-caps=true data-align=default data-type=posts data-toc-num=true>
            <h1 class="post-title p-name"><?php $this->title() ?></h1>
            <div class="post-description p-summary"> </div>
			<div class=post-meta>
                    <time datetime=<?php $this->date(); ?> class="post-meta-item published dt-published">
                        <svg viewBox="0 0 448 512" class="icon post-meta-icon"><path d="M148 288h-40c-6.6.0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6.0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6.0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6.0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5.0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6.0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6.0 12 5.4 12 12v52h48c26.5.0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3.0 6-2.7 6-6z" /></svg>
                        <?php $this->date('Y.m.d'); ?>
                    </time>
                    <time datetime=<?php echo date('Y.m.d', $this->modified); ?> class="post-meta-item modified dt-updated">
                        <svg viewBox="0 0 448 512" class="icon post-meta-icon"><path d="M482 64h-48V12c0-6.627-5.373-12-12-12h-40c-6.627.0-12 5.373-12 12v52H160V12c0-6.627-5.373-12-12-12h-40c-6.627.0-12 5.373-12 12v52H48C21.49 64 0 85.49 0 112v352c0 26.51 21.49 48 48 48h352c26.51.0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm-6 402H54a6 6 0 01-6-6V160h352v298a6 6 0 01-6 6zm-52.849-200.65L198.842 404.519c-4.705 4.667-12.303 4.637-16.971-.068l-75.091-75.699c-4.667-4.705-4.637-12.303.068-16.971l22.719-22.536c4.705-4.667 12.303-4.637 16.97.069l44.104 44.461 111.072-110.181c4.705-4.667 12.303-4.637 16.971.068l22.536 22.718c4.667 4.705 4.636 12.303-.069 16.97z" /></svg>
                        <?php echo date('Y.m.d', $this->modified); ?>
                    </time>
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
    </div>
</main>
<?php $this->need('footer.php'); ?>