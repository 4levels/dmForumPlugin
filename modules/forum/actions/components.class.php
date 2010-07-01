<?php
/**
 * Forum components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class forumComponents extends myFrontModuleComponents
{

  public function executeListByCategory()
  {
    $query = $this->getListQuery();
    
    $this->forumPager = $this->getPager($query);
  }


}
