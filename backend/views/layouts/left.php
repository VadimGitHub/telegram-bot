<?php
/**
 * @var $directoryAsset
 */
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'home', 'url' => ['/']],
                    ['label' => 'Пользователи', 'icon' => 'fas fa-users', 'url' => ['/user']],
                    [
                        'label' => 'Telegram',
                        'icon' => 'fab fa-telegram',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Каналы', 'icon' => 'far fa-star', 'url' => ['/telegram'],],
                        ],
                    ],
                    [
                        'label' => 'RBAC',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Роли', 'icon' => 'far fa-user-circle', 'url' => ['/role'],],
                        ],
                    ],
                ],
            ]
        ) ?>
    </section>
</aside>
