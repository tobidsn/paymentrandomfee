<?php
/**
 * Class Ig_PaymentFee_Block_Sales_Order_Fee
 */
class Ig_PaymentFee_Block_Sales_Order_Fee extends Mage_Core_Block_Template {
    /**
     * Initialize fee totals
     *
     * @return Ig_PaymentFee_Block_Sales_Order_Fee
     */
    public function initTotals() {
        if ((float)$this->getOrder()->getBaseFeeAmount()) {
            $source = $this->getSource();
            $value  = $source->getFeeAmount();
            $method = $this->getOrder()->getPayment()->getMethod();
            $title  = Mage::getModel('payment_fee/fee')->getTotalTitle($method);
            $this->getParentBlock()->addTotal(new Varien_Object(array(
                                                                     'code'   => 'fee',
                                                                     'strong' => FALSE,
                                                                     'label'  => $title,
                                                                     'value'  => $value
                                                                )));
        }

        return $this;
    }

    /**
     * Get order store object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder() {
        return $this->getParentBlock()->getOrder();
    }

    /**
     * Get totals source object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getSource() {
        return $this->getParentBlock()->getSource();
    }
}