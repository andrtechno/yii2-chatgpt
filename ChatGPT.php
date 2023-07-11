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
    public $org;
    private $ai;

    public function init()
    {
        $this->ai = new OpenAi($this->apikey);
        if ($this->org) {
            $this->ai->setORG($this->org);
        }
    }

    public function __call($name, $params)
    {
        return Json::decode(call_user_func_array([$this->ai, $name], $params), false);
    }
}
