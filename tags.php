<?php 
/**
 * 全部标签
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main class="main list" id="main">
    <div class="main-inner">
        <div class="content tag-cloud">
            <h1 class="list-title"><?php $this->title(); ?></h1>
            <?php
            $db = Typecho_Db::get();
            // 获取所有标签
            $tags = $db->fetchAll($db->select()->from('table.metas')->where('type = ?', 'tag'));
            // 计算每个标签的文章数量
            $counts = [];
            $max = 0; $min = PHP_INT_MAX;
            foreach ($tags as $t) {
                $mid = $t['mid'];
                $row = $db->fetchRow($db->select('COUNT(cid) as c')->from('table.relationships')->where('mid = ?', $mid));
                $c = $row ? (int)$row['c'] : 0;
                $counts[$t['mid']] = $c;
                if ($c > $max) $max = $c;
                if ($c < $min) $min = $c;
            }
            if ($min === PHP_INT_MAX) $min = 0;

            // 字体大小范围
            $minSize = 1.0; // em
            $maxSize = 2.5; // em

            // 输出标签云
            echo "<div class=tag-cloud-list>\n";
            foreach ($tags as $t) {
                $mid = $t['mid'];
                $name = htmlspecialchars($t['name']);
                $slug = $t['slug'];
                $count = isset($counts[$mid]) ? $counts[$mid] : 0;

                // 线性映射到字体大小
                $size = ($max === $min) ? ($minSize + ($maxSize - $minSize)/2) : ($minSize + ($count - $min) * ($maxSize - $minSize) / max(1, ($max - $min)));
                $size = round($size, 12);

                $href = '/tag/' . $slug . '/';
                echo "<a href=\"{$href}\" class=tag-cloud-item style=\"font-size: {$size}em\">{$name}</a>\n";
            }
            echo "</div>\n";
            ?>
        </div>
    </div>
</main>
<?php $this->need('footer.php'); ?>