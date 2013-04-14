<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   Mage
 * @package    Mage_Questions
 * @copyright  Copyright (c) 2004-2007 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Questions base helper
 *
 * @category   Mage
 * @package    Mage_Questions
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Autoquote_Helper_Data extends Mage_Core_Helper_Abstract
{

    const XML_PATH_ENABLED     = 'autoquote/settings/enabled';
	const XML_PATH_COUNTRY     = 'autoquote/origin/country_id';
	const XML_PATH_REGION      = 'autoquote/origin/region_id';
	const XML_PATH_POSTCODE    = 'autoquote/origin/postcode';
	const XML_PATH_CITY        = 'autoquote/origin/city';
	const XML_PATH_MEATHOD     = 'autoquote/settings/method';
	
	public function isEnabled()
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLED );
    }
	
    public function isCountry_id()
    {
        return Mage::getStoreConfig( self::XML_PATH_COUNTRY );
    }
	
	public function isRegion_id()
    {
        return Mage::getStoreConfig( self::XML_PATH_REGION );
    }
	
	public function isPostcode()
    {
        return Mage::getStoreConfig( self::XML_PATH_POSTCODE );
    }
	
	public function isCity()
    {
        return Mage::getStoreConfig( self::XML_PATH_CITY );
    }
	
	public function isMethod()
    {
        return Mage::getStoreConfig( self::XML_PATH_MEATHOD );
    }
}

