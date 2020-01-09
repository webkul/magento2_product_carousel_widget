<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_ProductCarousel
 * @author    Webkul
 * @copyright Copyright (c) 2010-2017 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
/**
 *  block for ProductCarousel.
 */

namespace Webkul\ProductCarousel\Block\Widget;

use Magento\Catalog\Model\ProductFactory;

/**
 * ProductCarousel  block
 * Class FancyCarousel
 */
class FancyCarousel extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{
    /**
     * Set template
     * @var \Webkul\ProductCarousel\View\frontend\templates\widget
     */
    protected $_template = "widget/fancy-carousel.phtml";
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        ProductFactory $product,
        array $data = []
    ) {
        $this->_productFactory = $product;
        parent::__construct($context, $data);
    }
    /**
     * @return array $imageurl
     */
    public function getImageUrl()
    {
        $array=$this->getexplode();
        $this->i=0;
        foreach ($array as $key) {
            $prod=$this->getProductCollectionById($key);
            if ($prod->getId()) {
                $imageurl[$this->i]['imageurl']=$this->getUrl('pub/media/catalog').'product'.$prod->getImage();
                // if (strpos($imageurl[$this->i]['imageurl'], 'png')!==true) {
                //     $imageurl[$this->i]['imageurl']=$this->
                //     getViewFileUrl('Webkul_ProductCarousel::css/Image/defaultimage.jpg');
                // }
                $imageurl[$this->i]['producturl']=$prod->getProductUrl();
                $imageurl[$this->i]['title']=$prod->getName();
                $imageurl[$this->i]['price']=round($prod->getPrice());
                $this->i++;
            }
        }
        return $imageurl;
    }
    /**
     * @return array explode productid
     */
    public function getexplode()
    {
        $id=$this->getData('productId');
        $array=explode(",", $id);
        return $array;
    }
    /**
     * @return array of product collection
     */
    public function getProductCollectionById($data)
    {
        $prod=$this->_productFactory->create()->load($data);
        return $prod;
    }
    /**
     * @return array $config
     */
    public function getConfigure()
    {
        $boxWidth=$this->getData('boxWidth');
        $count=$this->i ;
        $backgroundcolor=$this->getData('backgroundColor');
        $imageWidth=$this->getData('imageWidth');
        $imageHeight=$this->getData('imageHeight');
        $config['updateHeight']=$imageHeight+20;
        $config['clicktop']=$config['updateHeight']/2;
        $config['boxWidth']=$boxWidth;
        $config['backgroundColor']=$backgroundcolor;
        $config['imageWidth']=$imageWidth;
        $config['imageHeight']=$imageHeight;
        $config['banner']=$this->getData('photo');
        return $config;
    }
}
