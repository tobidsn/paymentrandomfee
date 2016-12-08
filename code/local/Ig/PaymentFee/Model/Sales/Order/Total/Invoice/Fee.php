<?php

/**
* 
*/

class Ig_PaymentFee_Model_Sales_Order_Total_Invoice_Fee extends Mage_Sales_Model_Order_Invoice_Total_Abstract {
    /**
     * Collect invoice total
     *
     * @param Mage_Sales_Model_Order_Invoice $invoice
     * @return Ig_PaymentFee_Model_Sales_Order_Total_Invoice_Fee
     */
    public function collect(Mage_Sales_Model_Order_Invoice $invoice) {
        $order = $invoice->getOrder();
        $feeAmountLeft     = $order->getFeeAmount() - $order->getFeeAmountInvoiced();
        $baseFeeAmountLeft = $order->getBaseFeeAmount() - $order->getBaseFeeAmountInvoiced();
        if (abs($baseFeeAmountLeft) < $invoice->getBaseGrandTotal()) {
            $operator = Mage::helper('payment_fee')->getFeeOperator();
            if ($operator == 0) {
                $invoice->setGrandTotal($invoice->getGrandTotal() + $feeAmountLeft);
                $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $baseFeeAmountLeft);
            } else {
                $invoice->setGrandTotal($invoice->getGrandTotal() - $feeAmountLeft);
                $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() - $baseFeeAmountLeft);
            }
        } else {
            $feeAmountLeft     = $invoice->getGrandTotal() * -1;
            $baseFeeAmountLeft = $invoice->getBaseGrandTotal() * -1;
            $invoice->setGrandTotal(0);
            $invoice->setBaseGrandTotal(0);
        }
        $invoice->setFeeAmount($feeAmountLeft);
        $invoice->setBaseFeeAmount($baseFeeAmountLeft);
        return $this;
    }
}
?>