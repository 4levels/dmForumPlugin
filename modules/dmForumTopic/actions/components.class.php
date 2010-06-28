<?php
/**
 * Topic components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class dmForumTopicComponents extends myFrontModuleComponents
{

  public function executeListByForum()
  {
    $query = $this->getListQuery();

    $this->dmForumTopicPager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    
    $this->dmForumTopic = $this->getRecord($query);
  }

  public function executeForm()
  {
    $this->form = $this->forms['DmForumTopic'];
  }


}
