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
    $query = $this->getListQuery();
    
    $this->topicPager = $this->getPager($query);
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
