<?php
/**
 * Topic components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class topicComponents extends myFrontModuleComponents
{

  public function executeListByForum()
  {
    $query = $this->getListQuery()->orderBy('updated_at DESC');
    
    $this->topicPager = $this->getPager($query);
    
    $topic = $this->getRecord($query);
    $this->forum = $topic->getForum();

    $this->nbModerators = $this->forum->Moderators->count();

    $moderators = array();
    foreach ($this->forum->Moderators as $moderator) {
        $moderators[] = $this->getHelper()->link($moderator->User)->set('.username');
    }

    $this->moderators = implode(',', $moderators);
    
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    
    $this->topic = $this->getRecord($query);
  }

  public function executeForm()
  {
      $this->form = $this->forms['DmForumTopic'];
  }


}
