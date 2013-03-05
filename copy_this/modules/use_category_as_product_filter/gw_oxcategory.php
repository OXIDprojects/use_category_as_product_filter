<?php
class gw_oxcategory extends gw_oxcategory_parent
{
	public function get_is_filter_parent_category($cms_folder) {
		if($this->_page_list[$cms_folder] === null) {
			// getAllContentIDs
			$sql = "
				SELECT is_filter_parent_category FROM oxcategories WHERE OXID='".mysql_real_escape_string($this->getId())."'
			;";
			$temp = oxDb::getDB(true)->GetOne($sql);
			if($temp) {
				$this->is_filter_parent_category = $temp;
			} else {
				$this->is_filter_parent_category = false;
			}
		}
		return $this->is_filter_parent_category;
	}
}


?>