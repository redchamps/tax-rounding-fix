<?php
namespace RedChamps\TaxRoundingFix\Plugin\Model;

use Magento\Tax\Model\Calculation;
use  Magento\Framework\Pricing\PriceCurrencyInterface;

class TaxCalculation
{
    protected $priceCurrency;

    public function __construct(PriceCurrencyInterface $priceCurrency)
    {
        $this->priceCurrency = $priceCurrency;
    }

    public function aroundRound(Calculation $subject, callable $proceed, $price)
    {
        return $this->priceCurrency->roundPrice($price, 4);
    }
}
