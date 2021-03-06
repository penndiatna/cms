<?php
/**
 * Licensed under The GPL-3.0 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since    2.0.0
 * @author   Christopher Castro <chris@quickapps.es>
 * @link     http://www.quickappscms.org
 * @license  http://opensource.org/licenses/gpl-3.0.html GPL-3.0 License
 */

$layoutOptions = [];
$skin = theme()->settings['skin'];

if (theme()->settings['fixed_layout']) {
    $layoutOptions[] = 'fixed';
}
if (theme()->settings['boxed_layout']) {
    $layoutOptions[] = 'layout-boxed';
}
if (theme()->settings['collapsed_sidebar']) {
    $layoutOptions[] = 'sidebar-collapse';
}
?>
<!DOCTYPE html>
<html lang="<?php echo language('code'); ?>">
    <head>
        <?php
            echo $this->Html->head([
                'bootstrap' => 'js',
                'append' => [
                    $this->Html->css('/bootstrap/css/bootstrap.min.css'),
                    $this->Html->css('font-awesome.min.css'),
                    $this->Html->css('AdminLTE.min.css'),
                    $this->Html->css("skins/skin-{$skin}.min.css"),
                    $this->Html->css('backend.css'),
                    $this->Html->script('app.min.js'),
                    $this->Html->script('jquery.slimscroll.min.js'),
                ],
            ]);
        ?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    </head>

    <body class="skin-<?php echo $skin; ?> <?php echo implode(' ', $layoutOptions); ?>">
        <div class="wrapper">
            <header class="main-header">
                <!-- LOGO -->
                <?php echo $this->Html->link('QuickApps<b>CMS</b>', '/admin', ['class' => 'logo', 'escape' => false]); ?>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only"><?php echo __d('backend_theme', 'Toggle navigation'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Visit website -->
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-globe"></i>', '/', ['title' => __d('backend_theme', 'Visit Website'), 'escape' => false]); ?>
                            </li>

                            <!-- User Profile -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $this->Html->image(user()->avatar(['s' => 20]), ['class' => 'user-image', 'alt' => __d('backend_theme', 'User Avatar')]); ?>
                                    <span class="hidden-xs"><?php echo user()->name; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php echo $this->Html->image(user()->avatar(['s' => 50]), ['class' => 'img-circle', 'alt' => __d('backend_theme', 'User Avatar')]); ?>
                                        <p>
                                            @<?php echo user()->username; ?>
                                            <small>&lt;<?php echo user()->email; ?>&gt;</small>
                                        </p>
                                    </li>

                                    <!-- Menu Body -->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <?php echo $this->Html->link(__d('backend_theme', 'Profile'), ['plugin' => 'User', 'controller' => 'gateway', 'action' => 'me', 'prefix' => false], ['class' => 'btn btn-default btn-flat']); ?>
                                        </div>
                                        <div class="pull-right">
                                            <?php echo $this->Html->link(__d('backend_theme', 'Sign out'), '/logout', ['class' => 'btn btn-default btn-flat']); ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <section class="sidebar">
                    <?php echo $this->Form->create(null, ['class' => 'sidebar-form', 'type' => 'get', 'url' => '/admin/node/manage/index']); ?>
                        <div class="input-group">
                            <?php
                                echo $this->Form->input('filter', [
                                    'label' => false,
                                    'required',
                                    'placeholder' => __d('backend_theme', 'Search Content...'),
                                ]);
                            ?>
                            <span class="input-group-btn">
                                <button class="btn btn-flat" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    <?php echo $this->Form->end(); ?>

                    <?php echo $this->region('main-menu')->render(); ?>
                </section>
            </aside>

            <!-- =============================================== -->

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 class="page-header"><?php echo $this->fetch('title'); ?></h1>
                    <?php echo $this->Breadcrumb->renderIfNotEmpty(); ?>
                    <p><?php echo $this->Flash->render(); ?></p>

                    <!-- Main content -->
                    <section class="content">
                        <?php echo $this->fetch('content'); ?>
                    </section>
                </section>
            </div>

            <footer class="main-footer">
                <p class="text-center"><?php echo __d('backend_theme', 'Powered by <a href="http://www.quickappscms.org/">QuickAppsCMS</a> v{0}. Theme AdminLTE 2.', quickapps('version')); ?></p>
            </footer>
        </div>
    </body>
</html>