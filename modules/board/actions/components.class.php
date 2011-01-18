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

  public function executeUserInfo() {
      $userId = $this->getPage()->get('record_id');
      $this->user = Doctrine::getTable('DmUser')->find($userId);
  }


}
