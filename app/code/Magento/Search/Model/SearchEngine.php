<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Search\Model;

use Magento\Framework\Search\AdapterInterface;
use Magento\Framework\Search\RequestInterface;
use Magento\Framework\Search\SearchEngineInterface;

/**
 * Search Engine
 */
class SearchEngine implements SearchEngineInterface
{
    /**
     * @var AdapterInterface
     */
    private $adapter = null;

    /**
     * Adapter factory
     *
     * @var AdapterFactory
     */
    private $adapterFactory;

    /**
     * @param AdapterFactory $adapterFactory
     */
    public function __construct(AdapterFactory $adapterFactory)
    {
        $this->adapterFactory = $adapterFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function search(RequestInterface $request)
    {
        return $this->getAdapter()->query($request);
    }

    /**
     * Get adapter
     *
     * @return AdapterInterface
     */
    protected function getAdapter()
    {
        return ($this->adapter === null) ? $this->adapterFactory->create() : $this->adapter;
    }
}
