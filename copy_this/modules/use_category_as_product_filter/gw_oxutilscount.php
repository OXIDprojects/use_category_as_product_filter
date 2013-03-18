<?php
class gw_oxutilscount extends gw_oxutilscount_parent
{

    /**
     * Returns category article count
     *
     * @param string $sCatId Category Id
     *
     * @return int
     */
    public function setCatArticleCount( $aCache, $sCatId, $sActIdent )
    {
    	if ( !oxSession::getVar( 'gw_filter_category' ) ) {
	    	return parent::setCatArticleCount( $aCache, $sCatId, $sActIdent );
    	} else {
	        $oArticle = oxNew( 'oxarticle' );
	        $sTable   = $oArticle->getViewName();
	        $sO2CView = getViewName( 'oxobject2category' );
	        $sArticleTable = getViewName( 'oxarticles' );
	        $oDb = oxDb::getDb();
	
	        // we use distinct if article is assigned to category twice
	        $sQ = "SELECT count(*) FROM (
	                   SELECT count(*) FROM $sO2CView LEFT JOIN $sTable ON $sO2CView.oxobjectid=$sTable.oxid
	                       WHERE $sO2CView.oxcatnid = ".$oDb->quote( $sCatId ) ." AND
	                             $sTable.oxparentid='' AND
	                             ".$oArticle->getSqlActiveSnippet() ."
	                             AND ".$oDb->quote(oxSession::getVar( 'gw_filter_category' ))." IN (SELECT oxcatnid FROM $sO2CView WHERE oxobjectid = $sArticleTable.OXID".")

	                       GROUP BY $sTable.oxid
	                   ) AS ox2cat";
	
	        $aCache[$sCatId][$sActIdent] = $oDb->getOne( $sQ );
	
	        $this->_setCatCache( $aCache );
	        return $aCache[$sCatId][$sActIdent];
	    }
    }
}


?>