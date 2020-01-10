#Installation

## Magento2 Product Carousel module installation is very easy, please follow the steps for installation-

1. Unzip the respective extension zip and create Webkul(vendor) and ProductCarousel(module) name folder inside your magento/app/code/ directory and then move all module's files into magento root directory app/code/Webkul/ProductCarousel/ folder.

or

## Install with Composer as you go
Specify the version of the module you need, and go.
    
    composer require webkul/magento2_product_carousel_widget

Run Following Command via terminal
-----------------------------------
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy

2. Flush the cache and reindex all.

now module is properly installed

#User Guide

For Magento2 Product Carousel's working process follow user guide - https://webkul.com/blog/magento2-product-carousel-widget/

#Support

Find us our support policy - https://store.webkul.com/support.html/
