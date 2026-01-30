<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main class="main list" id=main>
    <div class=main-inner>
        <div class="content list-group">
            <h1 class=list-title><?php $this->archiveTitle([
            'category' => _t('%s'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('%s'),
            'author'   => _t('%s 发布的文章')
        ], '', ''); ?></h1>
        <?php
        $currentYear = null;
        $currentMonth = null;
        while ($this->next()):
            // 使用文章时间戳构建年份和月份字符串，避免调用会直接输出的 $this->date()
            $timestamp = isset($this->created) ? (int)$this->created : strtotime($this->date('c'));
            $year = date('Y', $timestamp);
            $month = date('F', $timestamp);

            // 年变化，输出年份标题并重置月份
            if ($year !== $currentYear) {
                // 如果之前有未关闭的月份列表，先关闭它
                if ($currentMonth !== null) {
                    echo "</ul>\n";
                }

                // 输出年份和 SVG（保持原有样式）
                ?>
                <h2 class=list-year><?php echo $year; ?>
                    <?php echo get_zodiac_icon($year); ?>
                </h2>
                <?php
                $currentYear = $year;
                $currentMonth = null;
            }

            // 月份变化，输出月份标题并打开列表
            if ($month !== $currentMonth) {
                if ($currentMonth !== null) {
                    echo "</ul>\n";
                }
                ?>
                <h3 class=list-month><?php echo $month; ?></h3>
                <ul class=list-part>
                <?php $currentMonth = $month;
            }

            // 输出文章项（确保位于 <ul> 内）
            ?>
                <li class=list-item>
                    <a href=<?php $this->permalink() ?> class=list-item-title><?php $this->title() ?></a>
                    <time datetime=<?php $this->date('c'); ?> class=list-item-time><?php $this->date('F j'); ?></time>
                </li>
        <?php endwhile; ?>
        <?php if ($currentMonth !== null): ?></ul><?php endif; ?>
        </div>
    </div>
</main>
<?php $this->need('footer.php'); ?>