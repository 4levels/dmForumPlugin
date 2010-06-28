<?php // Vars: $dmForumTopicPager
use_helper('Date');
echo $dmForumTopicPager->renderNavigationTop();

$forum = $dm_page->getRecord();

echo _open('table.dm_forum');

  echo _open('thead');
  echo _open('tr');
  echo _tag('th.title', _link('dmForumCategory/list') . ' > ' . $forum);
  echo _tag('th.count', __('Replies'));
  echo _tag('th.count', __('Views'));
  echo _tag('th.last', __('Last post'));
  echo _close('tr');
  echo _close('thead');

  if ($dmForumTopicPager->count()) {
    echo _open('tbody');
    foreach ($dmForumTopicPager as $topic)
    {
      echo _open('tr');
      echo _tag('td.title', _link($topic) . __('by') . ' ' . $topic->CreatedBy->username);
      echo _tag('td.count', -1 + $topic->getNbReplies());
      echo _tag('td.count', $topic->getNbViews());
      echo _tag('td.last', time_ago_in_words($topic->getLastPost()->updated_at) . _tag('br') . __('by') . ' ' . $topic->getLastPost()->UpdatedBy->username);
      echo _close('tr');
    }
    echo _close('tbody');
  }

echo _close('table');

echo $dmForumTopicPager->renderNavigationBottom();