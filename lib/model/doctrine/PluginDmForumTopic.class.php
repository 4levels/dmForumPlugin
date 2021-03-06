<?php

/**
 * PluginDmForumTopic
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginDmForumTopic extends BaseDmForumTopic
{
  public function getLastPost() {
    $result = Doctrine::getTable('DmForumPost')->createQuery('p')
           ->select('p.*, u.username')
           ->leftJoin('p.User u')
           ->where('p.is_active = ?', true)
           ->andWhere('p.topic_id = ?', $this->id)
           ->andWhere('p.is_approved = ?', true)
           ->orderBy('p.created_at')
           ->fetchOne();
    return $result;
  }

  public function getLastUpdatedPost() {
    return Doctrine::getTable('DmForumPost')->createQuery('p')
           ->select('p.*, u.username')
           ->leftJoin('p.User u')
           ->where('p.is_active = ?', true)
           ->andWhere('p.topic_id = ?', $this->id)
           ->andWhere('p.is_approved = ?', true)
           ->orderBy('p.updated_at')
           ->fetchOne();
  }

  public function getNbPosts() {
    return $this->getPostsQuery()->count();
  }

  public function getNbUnapprovedPosts() {
      return $this->getPostsQuery(false);
  }

  public function getPostsQuery($isApproved = true) {
    $query = Doctrine_Core::getTable('DmForumPost')->createQuery('fp');
    $query->where($query->getRootAlias().'.is_active = ?', true)
          ->andWhere('fp.topic_id = ?', $this->id)
          ->andWhere('fp.is_approved = ?', $isApproved);

    return $query;
  }
}