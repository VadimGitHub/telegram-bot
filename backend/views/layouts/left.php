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
                        'label' => 'RBAC',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Роли', 'icon' => 'fas fa-user', 'url' => ['/role'],],
                        ],
                    ],
                ],
            ]
        ) ?>
    </section>
</aside>
