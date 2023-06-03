<?php

namespace panix\ext\chatgpt;

use Yii;
use yii\base\Component;
use Orhanerday\OpenAi\OpenAi;
use yii\base\UnknownMethodException;
use yii\helpers\Json;

class ChatGPT extends Component
{

    /**
     * @var string api key
     */
    public $apikey;
    protected $open_ai;

    public function init()
    {
        $this->open_ai = new OpenAi($this->apikey);

    }

    public function __call($name, $params)
    {
        return Json::decode(call_user_func_array([$this->open_ai, $name], $params),false);
    }
}
