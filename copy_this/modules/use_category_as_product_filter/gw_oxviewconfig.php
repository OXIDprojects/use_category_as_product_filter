<?php
class gw_oxviewconfig extends gw_oxviewconfig_parent
{
	
	/**
	 * set_filter_category function.
	 * 
	 * @access public
	 * @param mixed $cat_id
	 * @return void
	 */
	public function set_filter_category($cat_id) {
		if ($cat_id != 'delete') {
			$category = oxNew('oxcategory');
			$category->load($cat_id);
//			print_r($category);
			oxRegistry::get("oxUtilsCount")->resetCatArticleCount( );
			if($category->oxcategories__oxactive) {
				oxSession::setVar('gw_filter_category', $cat_id );
			}
		} else {
			oxRegistry::get("oxUtilsCount")->resetCatArticleCount( );
			oxSession::deleteVariable('gw_filter_category');
			return $cat_id;
		}
		
		return $this->get_filter_category();
	}

	public function get_filter_category() {
		return oxSession::getVar('gw_filter_category');
	}
}


?>