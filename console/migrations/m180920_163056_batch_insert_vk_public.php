<?php

use yii\db\Migration;

/**
 * Class m180920_163056_batch_insert_vk_public
 */
class m180920_163056_batch_insert_vk_public extends Migration
{
    /** @var array  */
    public $publicVK = [
        ['Позор', 'styd.pozor', -71729358, false, 'группа']
    ];

    /** @var array  */
    public $chatTelegam = [
        ['ParsingTakeVkBot', -1001382905743]
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("TRUNCATE TABLE public.group_vk RESTART IDENTITY CASCADE");
        $this->execute("TRUNCATE TABLE public.telegram_chanel RESTART IDENTITY CASCADE");

        $this->batchInsert('group_vk', ['title', 'screen_name', 'owner_id', 'is_closed', 'type'], $this->publicVK);
        $this->batchInsert('telegram_chanel', ['title', 'chat_id'], $this->chatTelegam);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('group_vk', ['title' => 'Позор']);
        $this->delete('telegram_chanel', ['title' => 'ParsingTakeVkBot']);
    }
}
