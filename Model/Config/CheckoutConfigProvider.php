<?php

namespace Shippit\Shipping\Model\Config;

use Magento\Checkout\Model\ConfigProviderInterface;

class CheckoutConfigProvider implements ConfigProviderInterface
{
    protected $helper;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        \Shippit\Shipping\Helper\Checkout $helper
    )
    {
        $this->helper = $helper;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $hideCheckoutOptions = $this->helper->getHideCheckoutOptionsShippingMethods();

        $config = [
            'shippit' => [
                'hide_checkout_options' => [
                    'shipping_methods' => $hideCheckoutOptions,
                ],
            ],
        ];

        return $config;
    }
}
