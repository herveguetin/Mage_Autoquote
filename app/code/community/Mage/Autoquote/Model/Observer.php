<?php
class Mage_Autoquote_Model_Observer
{
    /**
    * 
    * @param   Varien_Event_Observer $observer
    * @return  Xyz_Catalog_Model_Price_Observer
    */
    public function add_default_shipping($observer)
    {
    	
        if (Mage::getStoreConfig('autoquote/settings/enabled'))
        {
            $country = Mage::getStoreConfig('autoquote/origin/country_id');
            $postcode = Mage::getStoreConfig('autoquote/origin/postcode');
            $city = Mage::getStoreConfig('autoquote/origin/city');
            $regionId = Mage::getStoreConfig('autoquote/origin/region_id');
            $region = '';
            $code = Mage::getStoreConfig('autoquote/settings/method');
    
                try {
                    if (!empty($code)) {
                        $shippingAddress = Mage::getSingleton('checkout/session')->getQuote()->getShippingAddress();
                        $groups = $shippingAddress->getGroupedAllShippingRates();
                                       
                        if(!$shippingAddress->getShippingMethod())
                        {
                        	$shippingAddress
                            ->setCountryId($country)
                            ->setCity($city)
                            ->setPostcode($postcode)
                            ->setRegionId($regionId)
                            ->setRegion($region)
                            ->setShippingMethod($code)
                            ->setCollectShippingRates(true);
                            Mage::getSingleton('checkout/session')->getQuote()->save();
							Mage::getSingleton('checkout/session')->getQuote()->getPayment()->setMethod('');
                            Mage::getSingleton('checkout/session')->getQuote()->save();
                        }
                    } else {
                        Mage::getSingleton('checkout/session')->getQuote()->getShippingAddress()
                            ->setCountryId($country)
                            ->setCity($city)
                            ->setPostcode($postcode)
                            ->setRegionId($regionId)
                            ->setRegion($region)
                            ->setCollectShippingRates(true);
                            Mage::getSingleton('checkout/session')->getQuote()->save();
                    }
    
                    Mage::getSingleton('checkout/session')->resetCheckout();
            
                }
                catch (Mage_Core_Exception $e) {
                    Mage::getSingleton('checkout/session')->addError($e->getMessage());
                }
                catch (Exception $e) {
                    Mage::getSingleton('checkout/session')->addException(
                        $e,
                        Mage::helper('checkout')->__('Load customer quote error')
                    );
                }
    
          return $this;
        }
    } 
	public function getQuote()
    {
        if (empty($this->_quote)) {
            $this->_quote = Mage::getSingleton('checkout/session')->getQuote();
        }
        return $this->_quote;
    }
}
?>
