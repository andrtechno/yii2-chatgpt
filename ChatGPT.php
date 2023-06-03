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

    public function __call($name, $params)
    {
        return Json::decode(call_user_func_array([new OpenAi($this->apikey), $name], $params),false);
    }
}
