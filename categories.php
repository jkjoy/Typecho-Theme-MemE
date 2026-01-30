<?php
/**
 * 全部分类 (兼容自定义固定链接的最终版)
 * @package custom
 */
 $this->need('header.php');
?>

<main class="main list" id="main">
    <div class="main-inner">
        <div class="content categories">
            <h1 class="list-title"><?php $this->title() ?></h1>
            <div class="tree">
                <?php
                /**
                 * 递归显示分类树，仅在叶子节点显示文章
                 * @param int $parentId 父分类ID
                 * @param object $options Typecho配置对象
                 */
                function showCategoryTree($parentId, $options)
                {
                    $db = Typecho_Db::get();
                    
                    $categories = $db->fetchAll($db->select()->from('table.metas')
                        ->where('type = ?', 'category')
                        ->where('parent = ?', $parentId)
                        ->order('order', Typecho_Db::SORT_ASC));

                    if (!empty($categories)) {
                        echo '<ul class="list-categories">';
                        foreach ($categories as $category) {
                            $hasChildren = $db->fetchObject($db->select(array('COUNT(mid)' => 'count'))->from('table.metas')
                                ->where('type = ?', 'category')
                                ->where('parent = ?', $category['mid']))->count > 0;

                            echo '<li>';
                            $categorySlug = !empty($category['slug']) ? $category['slug'] : $category['mid'];
                            $categoryUrl = Typecho_Router::url('category', array('slug' => $categorySlug), $options->index);
                            echo '<a href="' . $categoryUrl . '" class="category-item">' . htmlspecialchars($category['name']) . '</a>';
                            echo '<span class="category-count">(' . $category['count'] . ')</span>';

                            if ($hasChildren) {
                                showCategoryTree($category['mid'], $options);
                            } else {
                                // 【关键修正】查询时获取文章的 'slug' 字段
                                $posts = $db->fetchAll($db->select('table.contents.cid', 'table.contents.title', 'table.contents.slug')->from('table.contents')
                                    ->join('table.relationships', 'table.contents.cid = table.relationships.cid')
                                    ->where('table.contents.status = ?', 'publish')
                                    ->where('table.contents.type = ?', 'post')
                                    ->where('table.relationships.mid = ?', $category['mid'])
                                    ->order('table.contents.created', Typecho_Db::SORT_DESC));
                                
                                if (!empty($posts)) {
                                    echo '<ul class="list-posts">';
                                    foreach ($posts as $post) {
                                        // 【核心】构建一个完整的路径信息数组，包含 cid 和 slug
                                        $pathInfo = array(
                                            'cid' => $post['cid'],
                                            'slug' => $post['slug']
                                        );

                                        // 使用这个完整的路径信息来生成URL，以兼容所有自定义链接
                                        $postUrl = Typecho_Router::url('post', $pathInfo, $options->index);

                                        echo '<li><a href="' . $postUrl . '" class="category-post">' . htmlspecialchars($post['title']) . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                            }
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                }

                showCategoryTree(0, $this->options);
                ?>
            </div>
        </div>
    </div>
</main>
 
<?php $this->need('footer.php'); ?>