<?php
/**
 * Forum components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class dmForumCategoryComponents extends myFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    
    $this->dmForumCategoryPager = $this->getPager($query);
  }


}
