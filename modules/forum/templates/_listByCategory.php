<?php // Vars: $forumPager

echo $forumPager->renderNavigationTop(); ?>

<?php #foreach ($boardPager as $board) { ?>

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
        <?php foreach ($forumPager as $forum) { ?>
        <li class="row">
          <dl class="icon" style="background-image: url({forumrow.FORUM_FOLDER_IMG_SRC}); background-repeat: no-repeat;">
            <dt title="<?php echo $forum ?>">
            <!-- IF S_ENABLE_FEEDS and forumrow.S_FEED_ENABLED <a class="feed-icon-forum" title="{L_FEED} - {forumrow.FORUM_NAME}" href="{U_FEED}?f={forumrow.FORUM_ID}"><img src="{T_THEME_PATH}/images/feed.gif" alt="{L_FEED} - {forumrow.FORUM_NAME}" /></a> -->

              <!--<span class="forum-image">{forumrow.FORUM_IMAGE}</span> -->
              <?php echo _link($forum)->set('.forumtitle') ?><br />
  					  <?php echo $forum->description ?>
              <!-- <br /><strong>{forumrow.L_MODERATOR_STR}:</strong> {forumrow.MODERATORS} -->
              <!-- IF forumrow.SUBFORUMS and forumrow.S_LIST_SUBFORUMS <br /><strong><?php echo __('Subforums') ?>:</strong> {forumrow.SUBFORUMS} ENDIF -->
            </dt>
            <!-- <dd class="redirect"><span>{L_REDIRECTS}: {forumrow.CLICKS}</span></dd> -->
            <dd class="topics"><?php echo $forum->NbTopics ?> <dfn><?php echo __('Topics') ?></dfn></dd>
            <dd class="posts"><?php echo $forum->NbPosts ?> <dfn><?php echo __('Posts') ?></dfn></dd>
            <dd class="lastpost"><span>
                <?php if ($forum->NbUnapprovedTopics) { ?><img src="/dmForumPlugin/images/icons/icon_topic_unapproved.gif" alt="<?php echo __('At least one topic is not apprived in this forum') ?>" /><?php } ?>
                <?php if ($forum->NbPosts) { ?>
                <!-- IF forumrow.LAST_POST_TIME --><dfn><?php echo __('Last post') ?></dfn> <?php echo __('by') ?> <?php echo _link($forum->LastPost->UpdatedBy->id ? $forum->LastPost->UpdatedBy : $forum->LastPost->CreatedBy) ?>
                <!-- IF not S_IS_BOT --><?php echo _link($forum->LastPost->Topic) ?> <!-- ENDIF --><br /><?php echo format_datetime($forum->LastPost->updated_at) ?>
                <?php } else { ?>
                <?php echo __('No posts') ?><br />&nbsp;
                <?php } ?>
              </span>
            </dd>
          </dl>
        </li>
        <?php } ?>

      </ul>

      <span class="corners-bottom"><span></span></span></div>
  </div>

<?php #} ?>

<?php echo _open('ul.elements');

foreach ($forumPager as $forum)
{
  echo _open('li.element');

    echo _link($forum);

  echo _close('li');
}

echo _close('ul');

echo $forumPager->renderNavigationBottom();