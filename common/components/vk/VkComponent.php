<?php

namespace common\components\vk;

use common\components\telegram\TelegramComponent;
use common\forms\TelegramMessageForm;
use common\models\telegram\TelegramChanel;
use common\models\vk\GroupVk;
use common\models\vk\PostVk;
use common\services\vk\VkService;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * Class VkComponent
 * @package common\components\vk
 *
 * @property $id - версия API vk
 * @property $access_token - токен безопасности
 * @property $service_key
 * @property $secure_key
 * @property $api_version - версия API vk
 */
class VkComponent extends Component
{
    /** @var integer $id */
    private $id;

    /** @var string $service_key */
    private $service_key;

    /** @var string $secure_key */
    private $secure_key;

    /** @var string $access_token */
    private $access_token;

    /** @var double $api_version */
    private $api_version;

    /** @var string $url */
    private $url = 'https://api.vk.com/method/';

    /**
     * VkComponent constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->id = $_ENV['YII_PRODUCT_SETTINGS']['vk']['id'];
        $this->access_token = $_ENV['YII_PRODUCT_SETTINGS']['vk']['access_token'];
        $this->service_key = $_ENV['YII_PRODUCT_SETTINGS']['vk']['service_key'];
        $this->secure_key = $_ENV['YII_PRODUCT_SETTINGS']['vk']['secure_key'];
        $this->api_version = $_ENV['YII_PRODUCT_SETTINGS']['vk']['version'];

        parent::__construct($config);
    }

    /**
     * @param $type
     * @param $method
     * @param null $params
     * @return bool
     */
    public function method($type, $method, $params = null)
    {
        /** @var Client $client */
        $client = new Client();

        $response = $client->createRequest()
            ->setMethod($type)
            ->setUrl($this->url . $method)
            ->setData(array_merge([
                'access_token' => $this->access_token,
                'v' => $this->api_version
            ], $params))
            ->send();

        if ($response->isOk) {
            return $response;
        }

        return false;
    }

    /**
     * Обработка данных
     * @param $data
     */
    public function prepareData($data)
    {
        /** @var TelegramComponent $telegram */
        $telegram = \Yii::$app->telegram;

        /** @var array $data */
        $data = json_decode($data->getContent(), true);

        $service = new VkService();
        $telegramChanel = TelegramChanel::findOne(['title' => 'ParsingTakeVkBot']);
        $group = GroupVk::findOne(['owner_id' => -$data['response']['groups'][0]['id']]);

        foreach ($data['response']['items'] as $message) {
            if (PostVk::findOne(['post_id' => $message['id']]) || !$group) {
                continue;
            }

            $service->create($message, $group);

            $telegramForm = new TelegramMessageForm();
            $telegramForm->message = $message['text'];

            if ($telegramForm->validate()) {
                $telegram->sendMessage($telegramChanel, $telegramForm);
            }
        }
    }
}
