<?php

/**
 * 
 * “ 我是站在大佬的肩膀上进行魔改 -老狮 ” <br /> “ 环境要求：PHP 5.4 ~ 7.2 ”
 * 
 * @package JOE魔改版
 * @author 老狮
 * @link //pi.mrcongliu.com
 *
 **/

?>

<?php $this->need('public/prevent.php'); ?>
<?php $this->need('public/defend.php'); ?>

<!-- 
    *
    * 写字楼里写字间，写字间里程序员；
    * 程序人员写程序，又拿程序换酒钱。
    * 酒醒只在网上坐，酒醉还来网下眠；
    * 酒醉酒醒日复日，网上网下年复年。
    * 但愿老死电脑间，不愿鞠躬老板前；
    * 奔驰宝马贵者趣，公交自行程序员。
    * 别人笑我忒疯癫，我笑自己命太贱；
    * 不见满街漂亮妹，哪个归得程序员？
    *
 -->

<!DOCTYPE html>
<html lang="en" data-color-mode="<?php if($_COOKIE['night']=='1')echo 'dark';else echo 'light'; ?>">

<head>
    <?php $this->need('public/head.php'); ?>
</head>

<body>
    <?php $this->options->JCustomBodyStart() ?>

    <section id="joe">

        <!-- 头部 -->
        <?php $this->need('public/header.php'); ?>        

        <!-- 主体 -->
        <section class="container j-index">
            <section   class="j-adaption" >
             
                <section  class="main <?php $this->options->JListType() ?>">

                    <?php if ($this->is('index')) : ?>
                        <?php $this->need('component/index.banner.php'); ?>
                        <?php $this->need('component/index.hot.php'); ?>
                        <?php $this->need('component/index.ad.php'); ?>
                        <?php $this->need('component/index.title.php'); ?>
                    <?php else : ?>
                        <?php $this->need('component/search.title.php'); ?>
                    <?php endif; ?>

                    <section class="j-index-article article">                          
                        <!-- 置顶文章 -->                        
                        <?php if ($this->is('index')) : ?>
                            <?php $this->need('component/index.sticky.php'); ?>
                        <?php endif; ?>
                        <!-- 列表 -->
                        <?php $this->need('component/index.list.php'); ?>
                    </section>
               
                </section>
                <?php $this->need('public/pagination.php'); ?>
               
            </section>
           
            <?php if ($this->options->JIndexAsideStatus === 'on') : ?>
                <?php $this->need('public/aside.php'); ?>
            <?php endif; ?>
        </section>

        <!-- 弹幕 -->
        <?php if ($this->options->JBarragerStatus === 'on') : ?>
            <ul class="j-barrager-list">
                <?php $this->widget('Widget_Comments_Recent@index', 'ignoreAuthor=true')->to($comments); ?>
                <?php while ($comments->next()) : ?>
                    <li>
                        <span class="j-barrager-list-avatar" data-src="<?php ParseAvatar($comments->mail); ?>"></span>
                        <span class="j-barrager-list-content"><?php $comments->excerpt(); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <!-- 尾部 -->
        <?php $this->need('public/footer.php'); ?>
    </section>

    <!-- 配置文件 -->
    <?php $this->need('public/config.php'); ?>

</body>

</html>