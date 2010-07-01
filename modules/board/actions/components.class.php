<?php
/**
 * Board components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class boardComponents extends myFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    
    $this->boardPager = $this->getPager($query);
  }


}
