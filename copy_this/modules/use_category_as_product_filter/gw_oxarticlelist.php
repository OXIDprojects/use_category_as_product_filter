<?php
class gw_oxarticlelist extends gw_oxarticlelist_parent
{
	
    /**
     * _getCategorySelect function.
     * 
     * @access protected
     * @param mixed $sFields
     * @param mixed $sCatId
     * @param mixed $aSessionFilter
     * @return void
     */
    protected function _getCategorySelect( $sFields, $sCatId, $aSessionFilter )
    {
    	if ( !oxSession::getVar( 'gw_filter_category' ) ) {
	    	return parent::_getCategorySelect( $sFields, $sCatId, $aSessionFilter );
    	} else {
	        $sArticleTable = getViewName( 'oxarticles' );
	        $sO2CView      = getViewName( 'oxobject2category' );
	
	        // ----------------------------------
	        // sorting
	        $sSorting = '';
	        if ( $this->_sCustomSorting ) {
	            $sSorting = " {$this->_sCustomSorting} , ";
	        }
	
	        // ----------------------------------
	        // filtering ?
	        $sFilterSql = '';
	        $iLang = oxRegistry::getLang()->getBaseLanguage();
	        if ( $aSessionFilter && isset( $aSessionFilter[$sCatId][$iLang] ) ) {
	            $sFilterSql = $this->_getFilterSql($sCatId, $aSessionFilter[$sCatId][$iLang]);
	        }
	
	        $oDb = oxDb::getDb();
	
	        $sSelect = "SELECT $sFields FROM $sO2CView as oc left join $sArticleTable
	                    ON $sArticleTable.oxid = oc.oxobjectid
	                    WHERE ".$this->getBaseObject()->getSqlActiveSnippet()." and $sArticleTable.oxparentid = ''
	                    and oc.oxcatnid = ".$oDb->quote($sCatId)." and ".$oDb->quote(oxSession::getVar( 'gw_filter_category' ))." IN (SELECT oxcatnid FROM $sO2CView WHERE oxobjectid = $sArticleTable.OXID".")".
	                    " $sFilterSql ORDER BY $sSorting oc.oxpos, oc.oxobjectid ";
	
	        return $sSelect;
    	}
    }
	// !TODO implement getArticlelist os that only catgeory filtered articles are displayed
}


?>