<?php // Vars: $dmForumCategoryPager
use_helper('Date');

echo $dmForumCategoryPager->renderNavigationTop();

echo _open('table.dm_forum');

foreach ($dmForumCategoryPager as $dmForumCategory)
{
  echo _open('thead');
  echo _open('tr');
    echo _tag('th.title', $dmForumCategory);
    echo _tag('th.count', __('Topics'));
    echo _tag('th.count', __('Posts'));
    echo _tag('th.last', __('Last updated'));
  echo _close('tr');
  echo _close('thead');

  if ($dmForumCategory->Forums->count()) {
    echo _open('tbody');
    foreach ($dmForumCategory->Forums as $board) {
      echo _open('tr.element');
       echo _tag('td.title', _link($board) . $board->description);
       echo _tag('td.count', str_pad($board->getNbTopics(), 1, '0'));
       echo _tag('td.count', $board->getNbPosts());
       echo _tag('td.last', $board->getNbPosts() ? time_ago_in_words($board->getLastUpdatedPost()->updated_at) . _tag('br') . __('by') . ' ' . $board->getLastUpdatedPost()->User->username : null);
      echo _close('tr');
    }
    echo _close('tbody');
  }
}

echo _close('table');


echo $dmForumCategoryPager->renderNavigationBottom();