<?php
/**
 * Board components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class dmForumForumComponents extends myFrontModuleComponents
{

  public function executeListByCategory()
  {
    $query = $this->getListQuery();
    
    $this->dmForumForumPager = $this->getPager($query);
  }


}
