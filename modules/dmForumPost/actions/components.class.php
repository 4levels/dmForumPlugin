<?php
/**
 * Post components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class dmForumPostComponents extends myFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    
    $this->dmForumPostPager = $this->getPager($query);
  }

  public function executeListByTopic()
  {
    $query = $this->getListQuery();
    
    $this->dmForumPostPager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    
    $this->dmForumPost = $this->getRecord($query);
  }

  public function executeForm()
  {
    $this->form = $this->forms['DmForumPost'];
    $this->form->setObject(new DmForumPost());
  }


}
