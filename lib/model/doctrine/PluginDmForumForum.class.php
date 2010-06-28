<?php

/**
 * PluginDmForumForum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginDmForumForum extends BaseDmForumForum
{
  public function getNbPosts() {
    return Doctrine::getTable('DmForumPost')
      ->createQuery('p')
      ->leftJoin('p.Topic t')
      ->where('p.is_active = ?', true)
      ->where('t.is_active = ?', true)
      ->where('t.forum_id = ?', $this->id)
      ->count()
    ;
  }
  public function getNbTopics() {
    return Doctrine::getTable('DmForumTopic')
      ->createQuery('t')
      ->where('t.is_active = ?', true)
      ->where('t.forum_id = ?', $this->id)
      ->count()
    ;
  }
  public function getLastUpdatedPost() {
    return Doctrine::getTable('DmForumPost')
      ->createQuery('p')
      ->select('p.*, u.username')
      ->leftJoin('p.User u')
      ->leftJoin('p.Topic t')
      ->where('p.is_active = ?', true)
      ->where('t.is_active = ?', true)
      ->where('t.forum_id = ?', $this->id)
      ->orderBy('p.updated_at')
      ->fetchOne()
    ;
  }
}