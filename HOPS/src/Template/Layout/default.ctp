<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'TIKO-HOPS – Ryhmä 6: ';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="/js/jquery.min.js" type="application/javascript"></script>
</head>
<body>
    <header>
        <div class="header-title">
            <span><?= $this->fetch('title') ?></span>
        </div>
        <div class="header-help">
                <?php if ($loggedUser !== null): ?>
                <span>
                    <?php
                        {
                            $type = __('Oppilas');
                            if ($loggedUser['access_level_id'] == 2)
                                $type = __('Tuutori');
                            else if ($loggedUser['access_level_id'] == 3)
                                $type = __('Ylituutori');

                            if ($loggedUser['access_level_id'] == 1)
                                echo $this->Html->link($loggedUser['name'] . " ($type)", [
                                    'controller' => 'Students',
                                    'action' => 'view',
                                    $loggedUser['id']
                                ]);
                            else
                                echo $this->Html->link($loggedUser['name'] . " ($type)", [
                                   'controller' => 'Users',
                                    'action' => 'viewTutor',
                                    $loggedUser['id']
                                ]);

                        }
                    ?>
                </span>
                <span><?= $this->Html->link(__('Kirjaudu ulos'), ['controller' => 'Users', 'action' => 'logout']) ?></span>
                <?php else: ?>
                    <span><?= $this->Html->link(__('Kirjaudu sisään'), ['controller' => 'Users', 'action' => 'login']) ?></span>
                <?php endif; ?>

        </div>
    </header>
    <div id="container">

        <div id="content">
            <?= $this->Flash->render() ?>
            <?= $this->Flash->render('auth') ?>

            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>
