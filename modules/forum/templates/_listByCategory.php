<?php // Vars: $forumPager

use_helper('Date');

$root_dir = $sf_request->getRelativeUrlRoot();

echo $forumPager->renderNavigationTop(); ?>

<div class="forabg">
<div class="inner"><span class="corners-top"><span></span></span>
  <ul class="topiclist">
    <li class="header">
      <dl class="icon">
        <dt><?php echo _link($dm_page) ?></dt>
        <dd class="topics"><?php echo __('Topics') ?></dd>
        <dd class="posts"><?php echo __('Posts') ?></dd>
        <dd class="lastpost"><span><?php echo __('Last post') ?></span></dd>
      </dl>
    </li>
  </ul>
  <ul class="topiclist forums">
    <?php foreach ($forumPager as $forum): ?>
    <li class="row">
      <dl class="icon" style="background-image: url(<?php echo '/' . sfConfig::get('sf_upload_dir_name') . '/' . $forum->Image ?>); background-repeat: no-repeat;">
        <dt title="<?php echo $forum ?>">
        <!-- IF S_ENABLE_FEEDS and forumrow.S_FEED_ENABLED <a class="feed-icon-forum" title="{L_FEED} - {forumrow.FORUM_NAME}" href="{U_FEED}?f={forumrow.FORUM_ID}"><img src="{T_THEME_PATH}/images/feed.gif" alt="{L_FEED} - {forumrow.FORUM_NAME}" /></a> -->

          <!--<span class="forum-image">{forumrow.FORUM_IMAGE}</span> -->
          <?php echo _link($forum)->set('.forumtitle') ?><br />
          <?php echo $forum->description ?>
          <!-- <br /><strong>{forumrow.L_MODERATOR_STR}:</strong> {forumrow.MODERATORS} -->
          <!-- IF forumrow.SUBFORUMS and forumrow.S_LIST_SUBFORUMS <br /><strong><?php echo __('Subforums') ?>:</strong> {forumrow.SUBFORUMS} ENDIF -->
        </dt>
        <!-- <dd class="redirect"><span>{L_REDIRECTS}: {forumrow.CLICKS}</span></dd> -->
        <dd class="topics"><?php echo $forum->nbTopics ?> <dfn><?php echo __('Topics') ?></dfn></dd>
        <dd class="posts"><?php echo $forum->nbPosts ?> <dfn><?php echo __('Posts') ?></dfn></dd>
        <dd class="lastpost"><span>
            <?php if ($forum->nbUnapprovedTopics): ?>
                <img src="<?php echo $root_dir ?>/dmForumPlugin/images/icons/icon_topic_unapproved.gif" alt="<?php echo __('At least one topic is not approved in this forum') ?>" />
            <?php endif; ?>
            <?php if ($forum->nbPosts): ?>
                <?php echo _link($forum->lastPost->Topic) ?><br />
                <?php echo __('by') ?> <?php echo _link($forum->lastPost->UpdatedBy->id ? $forum->lastPost->UpdatedBy : $forum->lastPost->CreatedBy) ?><br />
                <?php echo format_datetime($forum->lastPost->created_at, 'p') . ' ' . format_datetime($forum->lastPost->created_at, 'T') ?>
                <dfn><?php echo __('Last post') ?></dfn>
            <?php else: ?>
                <?php echo __('No posts') ?><br />&nbsp;
            <?php endif; ?>
          </span>
        </dd>
      </dl>
    </li>
    <?php endforeach; ?>

  </ul>

  <span class="corners-bottom"><span></span></span></div>
</div>

<?php echo $forumPager->renderNavigationBottom();