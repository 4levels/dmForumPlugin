<?php // Vars: $topicPager

echo $topicPager->renderNavigationTop();

echo _open('ul.elements');

foreach ($topicPager as $topic)
{
  echo _open('li.element');

    echo _link($topic);

  echo _close('li');
}

echo _close('ul');

echo $topicPager->renderNavigationBottom();