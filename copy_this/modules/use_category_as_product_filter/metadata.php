<?php
/**
 *    This file is part of OXID eShop Community Edition.
 *
 *    OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   main
 * @copyright (C) OXID eSales AG 2003-2012
 * @version OXID eShop CE
 * @version   SVN: $Id: metadata.php 25466 2010-02-01 14:12:07Z alfonsas $
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'use_category_as_product_filter',
    'title'        => 'Category filter',
    'description'  => 'Enables the function to filter articles in category lists by defining a filter category',
    'thumbnail'    => 'picture.png',
    'version'      => '1.0',
    'author'       => 'creative feat - Gregor Wendland',
    'extend'       => array(
        'oxarticlelist' => 'use_category_as_product_filter/gw_oxarticlelist',
        'oxcategory' => 'use_category_as_product_filter/gw_oxcategory',
        'oxviewconfig' => 'use_category_as_product_filter/gw_oxviewconfig',
        'oxutilscount' => 'use_category_as_product_filter/gw_oxutilscount'
    ),
    'blocks' => array(
    	array('template' => 'category_main.tpl', 'block' => 'admin_category_main_form', 'file' => 'admin_category_main_form.tpl')
    ),
);