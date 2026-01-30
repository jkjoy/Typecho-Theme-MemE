<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $faviconUrl = new \Typecho\Widget\Helper\Form\Element\Text('faviconUrl',null,null,_t('站点 favicon 地址'),_t('在这里填入一个图片 URL 地址, 以在浏览器标签页的网站标题前加上一个 favicon'));
    $form->addInput($faviconUrl); 
    $cnavatar = new \Typecho\Widget\Helper\Form\Element\Text('cnavatar', NULL, NULL, _t('Gravatar镜像'), _t('默认https://cravatar.cn/avatar/'));
    $form->addInput($cnavatar);
    $icpbeian = new \Typecho\Widget\Helper\Form\Element\Text('icpbeian', NULL, NULL, _t('备案号码'), _t('不填写则不显示'));
    $form->addInput($icpbeian);
    $addheader = new \Typecho\Widget\Helper\Form\Element\Textarea('addheader', NULL, NULL, _t('网站认证代码'), _t('在<head>中插入代码支持HTML'));
    $form->addInput($addheader);
    $tongji = new \Typecho\Widget\Helper\Form\Element\Textarea('tongji', NULL, NULL, _t('Footer代码'), _t('在footer中插入代码支持HTML'));
    $form->addInput($tongji);
    $mastodon = new \Typecho\Widget\Helper\Form\Element\Text('mastodon', NULL, NULL, _t('Mastodon'), _t('填写你的Mastodon个人主页地址'));
    $form->addInput($mastodon);
    $twitter = new \Typecho\Widget\Helper\Form\Element\Text('twitter', NULL, NULL, _t('Twitter'), _t('填写你的Twitter个人主页地址'));
    $form->addInput($twitter);
    $github = new \Typecho\Widget\Helper\Form\Element\Text('github', NULL, NULL, _t('GitHub'), _t('填写你的GitHub个人主页地址'));
    $form->addInput($github);
    $weibo = new \Typecho\Widget\Helper\Form\Element\Text('weibo', NULL, NULL, _t('微博'), _t('填写你的微博个人主页地址'));
    $form->addInput($weibo);
    $telegram = new \Typecho\Widget\Helper\Form\Element\Text('telegram', NULL, NULL, _t('Telegram'), _t('填写你的Telegram个人主页地址'));
    $form->addInput($telegram);
    $bilibili = new \Typecho\Widget\Helper\Form\Element\Text('bilibili', NULL, NULL, _t('Bilibili'), _t('填写你的Bilibili个人主页地址'));
    $form->addInput($bilibili);
    $email = new \Typecho\Widget\Helper\Form\Element\Text('email', NULL, NULL, _t('Email'), _t('填写你的Email地址'));
    $form->addInput($email);
    $friendEmails = new \Typecho\Widget\Helper\Form\Element\Textarea('friendEmails', NULL, NULL, _t('好友邮箱认证'), _t('一行一个邮箱，用于评论认证等级'));
    $form->addInput($friendEmails);
}

/**
 * 关闭评论反垃圾保护
 * 评论层级突破999
 * 关闭检查评论来源URL与文章链接是否一致判断
 * 最新评论显示在前
 */
function themeInit($archive)
{
    Helper::options()->commentsAntiSpam = false; 
    Helper::options()->commentsMaxNestingLevels = 999;
    Helper::options()->commentsOrder = 'DESC';
    Helper::options()->commentsCheckReferer = false;
}
/**
 * 自定义字段
 */
function themeFields($layout) {
    $summary= new Typecho_Widget_Helper_Form_Element_Textarea('summary', NULL, NULL, _t('文章摘要'), _t('自定义摘要'));
    $layout->addItem($summary);
}

/* 文章字数统计 */
function ArticleWordCount($content) {
    $content = strip_tags($content);
    return mb_strlen($content, 'utf-8');
}

/* 文章阅读时间 */
function getReadingTime($content) {
    $wordCount = ArticleWordCount($content);
    $averageReadingSpeed = 200; // 平均阅读速度，单位：字/分钟
    $readingTime = ceil($wordCount / $averageReadingSpeed);
    return $readingTime;
}

/**
* Gravatar镜像
*/
try {
    $options = Typecho_Widget::widget('Widget_Options');
    $gravatarPrefix = empty($options->cnavatar) ? 'https://cravatar.cn/avatar/' : $options->cnavatar;
    define('__TYPECHO_GRAVATAR_PREFIX__', $gravatarPrefix);
} catch (Exception $e) {
    error_log('Error in Gravatar settings: ' . $e->getMessage());
    if (!defined('__TYPECHO_GRAVATAR_PREFIX__')) {
        define('__TYPECHO_GRAVATAR_PREFIX__', 'https://cravatar.cn/avatar/');
    }
}

/**
* 页面加载时间
*/
function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
    timer_start();

function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
    echo $r;
    }
    return $r;
}

/* 十二生肖 **/
function get_zodiac_icon($year) {
    $zodiacs = [
    'Rat' => '🐭', 
    'Ox' => '🐮', 
    'Tiger' => '🐯', 
    'Rabbit' => '🐰',
    'Dragon' => '🐉',
    'Snake' => '🐍', 
    'Horse' => '🐴', 
    'Goat' => '🐐',
    'Monkey' => '🐒', 
    'Rooster' => '🐔', 
    'Dog' => '🐶', 
    'Pig' => '🐷'
];
// 生肖以 1900 年为基准（1900 年为鼠年）
    $index = ($year - 1900) % 12;
    if ($index < 0) $index += 12;
    $keys = array_values(array_keys($zodiacs));
    $key = $keys[$index];
    // 返回一个小的 span，类名与原 svg 保持一致以便样式控制
    return '<span class="icon chinese-zodiac">' . $zodiacs[$key] . '</span>';
}

/**    
 * 评论者认证等级 + 身份    
 *    
 * @author Chrison    
 * @access public    
 * @param str $email 评论者邮址    
 * @return result     
 */     
function commentApprove($widget, $email = NULL)      
{   
    $result = array(
        "state" => -1,//状态
        "isAuthor" => 0,//是否是博主
        "userLevel" => '',//用户身份或等级名称
        "userDesc" => '',//用户title描述
        "bgColor" => '',//用户身份或等级背景色
        "commentNum" => 0//评论数量
    );
    if (empty($email)) return $result;       
    $result['state'] = 1;
    $master = array();
    try {
        $options = Typecho_Widget::widget('Widget_Options');
        if (!empty($options->friendEmails)) {
            $master = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $options->friendEmails)));
        }
    } catch (Exception $e) {
        $master = array();
    }
    if ($widget->authorId == $widget->ownerId) {      
        $result['isAuthor'] = 1;//」
        $result['userLevel'] = '博主';
        $result['userDesc'] = '本站站长';
        $result['bgColor'] = '#e44113';
        $result['commentNum'] = 999;
    } else if (!empty($master) && in_array($email, $master)) {      
        $result['userLevel'] = '基友';
        $result['userDesc'] = '好基友';
        $result['bgColor'] = '#65C186';
        $result['commentNum'] = 888;
    } else {
        try {
            //数据库获取
            $db = Typecho_Db::get();
            //获取评论条数
            $commentNumSql = $db->fetchAll($db->select(array('COUNT(cid)'=>'commentNum'))
                ->from('table.comments')
                ->where('mail = ?', $email));
            $commentNum = $commentNumSql[0]['commentNum'];    
            //获取友情链接
            $linkSql = $db->fetchAll($db->select()->from('table.links')
                ->where('user = ?',$email));       
            //等级判定
            if($commentNum==1){
                $result['userLevel'] = '初见';
                $result['bgColor'] = '#999999';
                $userDesc = '人生一大步！';
            } else {
                if ($commentNum<10 && $commentNum>1) {
                    $result['userLevel'] = '初识';
                    $result['bgColor'] = '#999999';
                }elseif ($commentNum<20 && $commentNum>=10) {
                    $result['userLevel'] = '相识';
                    $result['bgColor'] = '#dc8fe2';
                }elseif ($commentNum<40 && $commentNum>=20) {
                    $result['userLevel'] = '熟识';
                    $result['bgColor'] = '#1ba68f';
                }elseif ($commentNum<80 && $commentNum>=40) {
                    $result['userLevel'] = '好友';
                    $result['bgColor'] = '#265ca2';
                }elseif ($commentNum<160 && $commentNum>=80) {
                    $result['userLevel'] = '知己';
                    $result['bgColor'] = '#a112c1';
                }elseif ($commentNum>=160) {
                    $result['userLevel'] = '挚友';
                    $result['bgColor'] = '#e6d40b';
                }
                 $userDesc = '您在本站有'.$commentNum.'条留言！'; 
            }
            if($linkSql){
                $result['userLevel'] = '博友';
                $result['bgColor'] = '#21b9bb';
                $userDesc = '🔗'.$linkSql[0]['description'].'&#10;✌️'.$userDesc;
            }
            
            $result['userDesc'] = $userDesc;
            $result['commentNum'] = $commentNum;
        } catch (Exception $e) {
            error_log('Error in commentApprove function: ' . $e->getMessage());
            // 设置默认值
            $result['userLevel'] = '「访客」';
            $result['bgColor'] = '#999999';
            $result['userDesc'] = '欢迎留言';
            $result['commentNum'] = 0;
        }
    } 
    return $result;
}

/**
 * 生成页面图标的函数
 */
function pageIcon($slug, $title) {
    $icon = '';
    if ($slug == 'memos') {
        $icon = '<svg class="icon" viewBox="0 0 512 512"><path d="M352.9 21.2L308 66.1 445.9 204 490.8 159.1C504.4 145.6 512 127.2 512 108s-7.6-37.6-21.2-51.1L455.1 21.2C441.6 7.6 423.2 0 404 0s-37.6 7.6-51.1 21.2zM274.1 100L58.9 315.1c-10.7 10.7-18.5 24.1-22.6 38.7L.9 481.6c-2.3 8.3 0 17.3 6.2 23.4s15.1 8.5 23.4 6.2l127.8-35.5c14.6-4.1 27.9-11.8 38.7-22.6L412 237.9 274.1 100z"/></svg>';
    } elseif ($slug == 'links') {
        $icon = '<svg viewBox="0 0 576 512" class="icon"><path d="M419.5 96c-16.6 0-32.7 4.5-46.8 12.7-15.8-16-34.2-29.4-54.5-39.5 28.2-24 64.1-37.2 101.3-37.2 86.4 0 156.5 70 156.5 156.5 0 41.5-16.5 81.3-45.8 110.6l-71.1 71.1c-29.3 29.3-69.1 45.8-110.6 45.8-86.4 0-156.5-70-156.5-156.5 0-1.5 0-3 .1-4.5 .5-17.7 15.2-31.6 32.9-31.1s31.6 15.2 31.1 32.9c0 .9 0 1.8 0 2.6 0 51.1 41.4 92.5 92.5 92.5 24.5 0 48-9.7 65.4-27.1l71.1-71.1c17.3-17.3 27.1-40.9 27.1-65.4 0-51.1-41.4-92.5-92.5-92.5zM275.2 173.3c-1.9-.8-3.8-1.9-5.5-3.1-12.6-6.5-27-10.2-42.1-10.2-24.5 0-48 9.7-65.4 27.1L91.1 258.2c-17.3 17.3-27.1 40.9-27.1 65.4 0 51.1 41.4 92.5 92.5 92.5 16.5 0 32.6-4.4 46.7-12.6 15.8 16 34.2 29.4 54.6 39.5-28.2 23.9-64 37.2-101.3 37.2-86.4 0-156.5-70-156.5-156.5 0-41.5 16.5-81.3 45.8-110.6l71.1-71.1c29.3-29.3 69.1-45.8 110.6-45.8 86.6 0 156.5 70.6 156.5 156.9 0 1.3 0 2.6 0 3.9-.4 17.7-15.1 31.6-32.8 31.2s-31.6-15.1-31.2-32.8c0-.8 0-1.5 0-2.3 0-33.7-18-63.3-44.8-79.6z"/></svg>';
    } elseif ($slug == 'tags') {
        $icon = '<svg viewBox="0 0 640 512" class="icon"><path d="M497.941 225.941 286.059 14.059A48 48 0 00252.118.0H48C21.49.0.0 21.49.0 48v204.118a48 48 0 0014.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882.0l204.118-204.118c18.745-18.745 18.745-49.137.0-67.882zM112 160c-26.51.0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882.0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397.0h48.721a48 48 0 0133.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137.0 67.882z" /></svg>';
    } elseif ($slug == 'categories') {
        $icon = '<svg viewBox="0 0 512 512" class="icon"><path d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255.0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255.0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255.0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256.0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255.0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255.0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255.0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256.0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255.0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255.0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255.0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255.0-24 10.745-24 24zm386.667-56H488c13.255.0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255.0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255.0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255.0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255.0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255.0-24 10.745-24 24z" /></svg>';
    } elseif ($slug == 'comments') {
        $icon = '<svg viewBox="0 0 512 512" class="icon"><path d="M512 240c0 132.5-114.6 240-256 240-37.1 0-72.3-7.4-104.1-20.7L33.5 510.1c-9.4 4-20.2 1.7-27.1-5.8S-2 485.8 2.8 476.8l48.8-92.2C19.2 344.3 0 294.3 0 240 0 107.5 114.6 0 256 0S512 107.5 512 240z"/></svg>';
    } elseif ($slug == 'gbook') {
        $icon = '<svg class="icon" viewBox="0 0 448 512"><path d="M64 480c-35.3 0-64-28.7-64-64L0 96C0 60.7 28.7 32 64 32l320 0c35.3 0 64 28.7 64 64l0 213.5c0 17-6.7 33.3-18.7 45.3L322.7 461.3c-12 12-28.3 18.7-45.3 18.7L64 480zM389.5 304L296 304c-13.3 0-24 10.7-24 24l0 93.5 117.5-117.5z"/></svg>';
    } elseif ($slug == 'archives') {
        $icon = '<svg viewBox="0 0 512 512" class="icon"><path d="M32 448c0 17.7 14.3 32 32 32h384c17.7.0 32-14.3 32-32V160H32v288zm160-212c0-6.6 5.4-12 12-12h104c6.6.0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H204c-6.6.0-12-5.4-12-12v-8zM480 32H32C14.3 32 0 46.3.0 64v48c0 8.8 7.2 16 16 16h480c8.8.0 16-7.2 16-16V64c0-17.7-14.3-32-32-32z" /></svg>';
    } elseif ($slug == 'about') {
        $icon = '<svg viewBox="0 0 496 512" class="icon"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6.0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7.0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4.0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9s28-2.7 40.9-6.9c2.3-.7 4.7-1.1 7.1-1.1 42.9.0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z" /></svg>';
    } 
    return $icon . $title;
}

/**
 * Typecho后台附件增强：图片预览、批量插入、保留官方删除按钮与逻辑
 * @author jkjoy
 * @date 2025-04-25
 */
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('AttachmentHelper', 'addEnhancedFeatures');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('AttachmentHelper', 'addEnhancedFeatures');

class AttachmentHelper {
    public static function addEnhancedFeatures() {
        ?>
        <style>
        #file-list{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:15px;padding:15px;list-style:none;margin:0;}
        #file-list li{position:relative;border:1px solid #e0e0e0;border-radius:4px;padding:10px;background:#fff;transition:all 0.3s ease;list-style:none;margin:0;}
        #file-list li:hover{box-shadow:0 2px 8px rgba(0,0,0,0.1);}
        #file-list li.loading{opacity:0.7;pointer-events:none;}
        .att-enhanced-thumb{position:relative;width:100%;height:150px;margin-bottom:8px;background:#f5f5f5;overflow:hidden;border-radius:3px;display:flex;align-items:center;justify-content:center;}
        .att-enhanced-thumb img{width:100%;height:100%;object-fit:contain;display:block;}
        .att-enhanced-thumb .file-icon{display:flex;align-items:center;justify-content:center;width:100%;height:100%;font-size:40px;color:#999;}
        .att-enhanced-finfo{padding:5px 0;}
        .att-enhanced-fname{font-size:13px;margin-bottom:5px;word-break:break-all;color:#333;}
        .att-enhanced-fsize{font-size:12px;color:#999;}
        .att-enhanced-factions{display:flex;justify-content:space-between;align-items:center;margin-top:8px;gap:8px;}
        .att-enhanced-factions button{flex:1;padding:4px 8px;border:none;border-radius:3px;background:#e0e0e0;color:#333;cursor:pointer;font-size:12px;transition:all 0.2s ease;}
        .att-enhanced-factions button:hover{background:#d0d0d0;}
        .att-enhanced-factions .btn-insert{background:#467B96;color:white;}
        .att-enhanced-factions .btn-insert:hover{background:#3c6a81;}
        .att-enhanced-checkbox{position:absolute;top:5px;right:5px;z-index:2;width:18px;height:18px;cursor:pointer;}
        .batch-actions{margin:15px;display:flex;gap:10px;align-items:center;}
        .btn-batch{padding:8px 15px;border-radius:4px;border:none;cursor:pointer;transition:all 0.3s ease;font-size:10px;display:inline-flex;align-items:center;justify-content:center;}
        .btn-batch.primary{background:#467B96;color:white;}
        .btn-batch.primary:hover{background:#3c6a81;}
        .btn-batch.secondary{background:#e0e0e0;color:#333;}
        .btn-batch.secondary:hover{background:#d0d0d0;}
        .upload-progress{position:absolute;bottom:0;left:0;width:100%;height:2px;background:#467B96;transition:width 0.3s ease;}
        </style>
        <script>
        $(document).ready(function() {
            // 批量操作UI按钮
            var $batchActions = $('<div class="batch-actions"></div>')
                .append('<button type="button" class="btn-batch primary" id="batch-insert">批量插入</button>')
                .append('<button type="button" class="btn-batch secondary" id="select-all">全选</button>')
                .append('<button type="button" class="btn-batch secondary" id="unselect-all">取消全选</button>');
            $('#file-list').before($batchActions);

            // 插入格式
            Typecho.insertFileToEditor = function(title, url, isImage) {
                var textarea = $('#text'), 
                    sel = textarea.getSelection(),
                    insertContent = isImage ? '![' + title + '](' + url + ')' : 
                                            '[' + title + '](' + url + ')';
                textarea.replaceSelection(insertContent + '\n');
                textarea.focus();
            };
            // 批量插入
            $('#batch-insert').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var content = '';
                $('#file-list li').each(function() {
                    if ($(this).find('.att-enhanced-checkbox').is(':checked')) {
                        var $li = $(this);
                        var title = $li.find('.att-enhanced-fname').text();
                        var url = $li.data('url');
                        var isImage = $li.data('image') == 1;
                        content += isImage ? '![' + title + '](' + url + ')\n' : '[' + title + '](' + url + ')\n';
                    }
                });
                if (content) {
                    var textarea = $('#text');
                    var pos = textarea.getSelection();
                    var newContent = textarea.val();
                    newContent = newContent.substring(0, pos.start) + content + newContent.substring(pos.end);
                    textarea.val(newContent);
                    textarea.focus();
                }
            });
            $('#select-all').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#file-list .att-enhanced-checkbox').prop('checked', true);
                return false;
            });
            $('#unselect-all').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#file-list .att-enhanced-checkbox').prop('checked', false);
                return false;
            });
            // 防止复选框冒泡
            $(document).on('click', '.att-enhanced-checkbox', function(e) {e.stopPropagation();});
            // 增强文件列表样式，但不破坏li原结构和官方按钮
            function enhanceFileList() {
                $('#file-list li').each(function() {
                    var $li = $(this);
                    if ($li.hasClass('att-enhanced')) return;
                    $li.addClass('att-enhanced');
                    // 只增强，不清空li
                    // 增加批量选择框
                    if ($li.find('.att-enhanced-checkbox').length === 0) {
                        $li.prepend('<input type="checkbox" class="att-enhanced-checkbox" />');
                    }
                    // 增加图片预览（如已有则不重复加）
                    if ($li.find('.att-enhanced-thumb').length === 0) {
                        var url = $li.data('url');
                        var isImage = $li.data('image') == 1;
                        var fileName = $li.find('.insert').text();
                        var $thumbContainer = $('<div class="att-enhanced-thumb"></div>');
                        if (isImage) {
                            var $img = $('<img src="' + url + '" alt="' + fileName + '" />');
                            $img.on('error', function() {
                                $(this).replaceWith('<div class="file-icon">🖼️</div>');
                            });
                            $thumbContainer.append($img);
                        } else {
                            $thumbContainer.append('<div class="file-icon">📄</div>');
                        }
                        // 插到插入按钮之前
                        $li.find('.insert').before($thumbContainer);
                    }
                });
            }
            // 插入按钮事件
            $(document).on('click', '.btn-insert', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var $li = $(this).closest('li');
                var title = $li.find('.att-enhanced-fname').text();
                Typecho.insertFileToEditor(title, $li.data('url'), $li.data('image') == 1);
            });
            // 上传完成后增强新项
            var originalUploadComplete = Typecho.uploadComplete;
            Typecho.uploadComplete = function(attachment) {
                setTimeout(function() {
                    enhanceFileList();
                }, 200);
                if (typeof originalUploadComplete === 'function') {
                    originalUploadComplete(attachment);
                }
            };
            // 首次增强
            enhanceFileList();
        });
        </script>
        <?php
    }
}
