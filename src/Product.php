<?php

namespace tubasaygin\products;

/**
 * products module definition class
 */
class Products extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'vendor\modules\products\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->layout = 'main';

        $this->setAliases([
            '@products-assets' => dirname(__DIR__). '/assets'
        ]);
    }
}

