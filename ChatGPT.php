<?php

namespace panix\ext\chatgpt;

use Yii;
use yii\base\Component;
use Orhanerday\OpenAi\OpenAi;
use yii\helpers\Json;

class ChatGPT extends Component
{

    /**
     * @var string api key
     */
    public $apikey;
    private $ai;

    public function init()
    {
        $this->ai = new OpenAi($this->apikey);
        //$this->ai->setORG('');
    }

    public function __call($name, $params)
    {
        return Json::decode(call_user_func_array([$this->ai, $name], $params), false);
    }
}
