<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\SalesRule\Test\Constraint;

use Magento\SalesRule\Test\Fixture\SalesRuleInjectable;
use Magento\SalesRule\Test\Page\Adminhtml\PromoQuoteIndex;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Assert if sales rule is absent in grid.
 */
class AssertCartPriceRuleIsNotPresentedInGrid extends AbstractConstraint
{
    /**
     * Assert that sales rule is not present in cart price rules grid.
     *
     * @param PromoQuoteIndex $promoQuoteIndex
     * @param SalesRuleInjectable $salesRule
     * @return void
     */
    public function processAssert(PromoQuoteIndex $promoQuoteIndex, SalesRuleInjectable $salesRule)
    {
        \PHPUnit_Framework_Assert::assertFalse(
            $promoQuoteIndex->getPromoQuoteGrid()->isRowVisible(['name' => $salesRule->getName()]),
            'Sales rule \'' . $salesRule->getName() . '\' is present in cart price rules grid.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Sales rule is not present in cart price rules grid.';
    }
}
