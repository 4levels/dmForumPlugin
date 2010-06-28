<?php // Vars: $dmForumPostPager
use_helper('Date');

echo $dmForumPostPager->renderNavigationTop();

$topic = $dm_page->getRecord();

echo _open('table.dm_forum');

  echo _open('thead');
  echo _open('tr');
  echo _tag('th.title', array('colspan' => 2), _link('dmForumCategory/list') . ' > ' . _link($topic->Forum) . ' > ' . $topic);
  echo _close('tr');
  echo _close('thead');

  if ($dmForumPostPager->count()) {
    echo _open('tbody');
    foreach ($dmForumPostPager as $post)
    {
      echo _open('tr');
      echo _tag('td.user', array('rowspan' => 2),  $post->CreatedBy->username);
      echo _tag('td.content', markdown($post->content));
      echo _close('tr');
      echo _open('tr.summary');
      echo _tag('td', format_date($post->created_at));
      echo _close('tr');
    }
    echo _close('tbody');
  }

echo _close('table');

echo $dmForumPostPager->renderNavigationBottom();

