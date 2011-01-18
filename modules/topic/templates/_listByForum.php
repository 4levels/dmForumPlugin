<?php
// Vars: $topicPager, $forum, $nbModerators, $moderators
use_helper('Date');

$root_dir = $sf_request->getRelativeUrlRoot();

$nbModerators = $forum->Moderators->count();

?>

<!-- FORUM HEADER -->
<h2 class="forumtitle"><?php echo _link($dm_page) ?></h2>

<div>
	<?php if ($forum->show_description): ?>
            <div class="forumdescription"><p><?php echo $forum->description ?></p></div>
        <?php endif; ?>
	<?php if($nbModerators > 0): ?>
            <p>
                <strong>
                    <?php if($nbModerators == 1) {
                        echo __('Moderator');
                    } else {
                        echo __('Moderators');
                    }
                    ?>
                :</strong>
                <?php echo $moderators ?>
            </p>
        <?php endif; ?>
        <p>
            <input class="button1 new-button" type="button" onclick="addTopic(<?php echo $forum->id ?>)" id="add_topic" value="<?php echo __('New Topic') ?>" />
        </p>
        <div id="new_topic_form"></div>
</div>

<!-- TOPICS LIST -->
<?php
echo $topicPager->renderNavigationTop();

$row_class = 'bg1';
$topic_type = '';

?>
<div class="forumbg">
    <div class="inner"><span class="corners-top"><span></span></span>
        <ul class="topiclist">
            <li class="header">
                <dl class="icon">
                    <dt><?php echo __('Topics'); ?></dt>
                    <dd class="posts"><?php echo __('Posts'); ?></dd>
                    <dd class="views"><?php echo __('Views'); ?></dd>
                    <dd class="lastpost"><span><?php echo __('Last Post'); ?></span></dd>
		</dl>
            </li>
	</ul>
	<ul class="topiclist topics">
            <!-- STICKY TOPICS FIRST -->
            <?php
            foreach ($topicPager as $topic):
            if($topic->is_sticked):
            ?>
            <li id="topic-content-<?php echo $topic->id ?>" class="row <?php echo $row_class ?>">
                <dl class="icon">
                    <dt title="<?php echo $topic ?>">
                        <?php echo _link($topic)->set('.topictitle') ?>
                        <?php if (! $topic->is_approved): ?>
                            <a href="#" onclick="approveForumTopic(<?php echo $topic->id ?>, 'ask'); return false;">
                                <img alt="<?php echo __('Unapproved') ?>" src="<?php echo $root_dir?>/dmForumPlugin/images/icons/icon_topic_unapproved.gif" />
                            </a>
                        <?php endif; ?>
                        <br />
			<?php echo __('by') ?>&nbsp;
                        <?php echo _link($topic->User)->set('.username') ?> &raquo;
                        <?php echo format_datetime($topic->created_at, 'p') . ' ' . format_datetime($topic->created_at, 'T') ?>
                    </dt>
                    <dd class="posts"><?php echo $topic->nbPosts ?> <dfn><?php echo __('Replies') ?></dfn></dd>
                    <dd class="views"><?php echo $topic->views ?> <dfn><?php echo __('Views') ?></dfn></dd>
                    <dd class="lastpost">
                        <span>
                            <?php if ($topic->nbPosts): ?>
                                <?php echo __('by') ?> <?php echo _link($topic->LastPost->User)->set('.username') ?>
                                <a href="<?php echo _link($topic)->getHref() ?>">
                                    <img alt="<?php echo __('Read latest post') ?>" src="<?php echo $root_dir?>/dmForumPlugin/images/icons/icon_post_target.gif" />
                                </a>
                                <br /><?php echo format_datetime($topic->LastPost->created_at, 'p') . ' ' . format_datetime($topic->LastPost->created_at, 'T') ?>
                            <?php else:
                                echo __('No posts');
                            endif; ?>
                        </span>
                    </dd>
		</dl>
            </li>
            <?php endif; endforeach; ?>

            <!-- ALL OTHER TOPICS -->
            <?php
            foreach ($topicPager as $topic):
            if(! $topic->is_sticked):
            ?>
            <li id="topic-content-<?php echo $topic->id ?>" class="row <?php echo $row_class ?>">
                <dl class="icon">
                    <dt title="<?php echo $topic ?>">
                        <?php echo _link($topic)->set('.topictitle') ?>
                        <?php if (! $topic->is_approved): ?>
                            <a href="#" onclick="approveForumTopic(<?php echo $topic->id ?>, 'ask'); return false;">
                                <img alt="<?php echo __('Unapproved') ?>" src="<?php echo $root_dir?>/dmForumPlugin/images/icons/icon_topic_unapproved.gif" />
                            </a>
                        <?php endif; ?>
                        <br />
			<?php echo __('by') ?>&nbsp;
                        <?php echo _link($topic->User)->set('.username') ?> &raquo;
                        <?php echo format_datetime($topic->created_at, 'p') . ' ' . format_datetime($topic->created_at, 'T') ?>
                    </dt>
                    <dd class="posts"><?php echo $topic->nbPosts ?> <dfn><?php echo __('Replies') ?></dfn></dd>
                    <dd class="views"><?php echo $topic->views ?> <dfn><?php echo __('Views') ?></dfn></dd>
                    <dd class="lastpost">
                        <span>
                            <dfn><?php echo __('Last post') ?> </dfn>
                            <?php if ($topic->nbUnapprovedPosts): ?>
                                <img alt="<?php echo __('Unapproved') ?>" src="<?php echo $root_dir?>/dmForumPlugin/images/icons/icon_topic_unapproved.gif" />
                            <?php endif; ?>
                            <?php if ($topic->nbPosts): ?>
                                <?php echo __('by') ?> <?php echo _link($topic->LastPost->User)->set('.username') ?>
                                <a href="<?php echo _link($topic)->getHref() ?>">
                                    <img alt="<?php echo __('Read latest post') ?>" src="<?php echo $root_dir?>/dmForumPlugin/images/icons/icon_post_target.gif" />
                                </a>
                                <br /><?php echo format_datetime($topic->LastPost->created_at, 'p') . ' ' . format_datetime($topic->LastPost->created_at, 'T') ?>
                            <?php else:
                                echo __('No posts');
                            endif; ?>
                        </span>
                    </dd>
		</dl>
            </li>
            <?php endif; endforeach; ?>
        </ul>
	<span class="corners-bottom"><span></span></span>
    </div>
</div>

<?php echo $topicPager->renderNavigationBottom(); ?>