<?php

namespace TmobLabs\Tappz\Controller\Api;
use Magento\Framework\App\Action\Action ;
use Magento\Framework\App\Action\Context as Context;
use Magento\Framework\Controller\Result\JsonFactory as JSON;
use TmobLabs\Tappz\API\CategoryRepositoryInterface  ;


class Category extends Action
{
    protected $jsonResult;
    private $categoryRepository;
    public function __construct(Context $context,  JSON $json,CategoryRepositoryInterface $categoryRepository   )
    {
      parent::__construct($context);
      $this->jsonResult= $json->create();
      $this->categoryRepository= $categoryRepository;
    }
    public function execute()
    {    
        $params =  ($this->getRequest()->getParams());
        $categoryId = key($params);
        $result = $this->categoryRepository->getByCategoryById($categoryId);     
        $this->jsonResult->setData($result);
        return $this->jsonResult;
   
    }    
}