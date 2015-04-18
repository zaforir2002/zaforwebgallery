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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>zWebGallery: <?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css(array('Gallery.themes/' . Configure::read('GalleryOptions.App.theme') . '.min'));
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">                
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"
                       href="<?php echo $this->Html->url(
                           array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery')
                       ) ?>">zWeb Gallery</a>
				</div>
				<div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <?php echo $this->Html->link(
                                'Events',
                                array('controller' => 'galleryevents', 'action' => 'index')
                            ) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                'News',
                                array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery')
                            ) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                'Blogs',
                                array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery')
                            ) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                'About us',
                                array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery')
                            ) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                'Contact us',
                                array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery')
                            ) ?>
                        </li>
                    </ul>
                    <div class="loginoption">
                        <p id="cake-powered">
                            <?php 
                                if(AuthComponent::user()){
                                    echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 'logout')) .
                                        '<br/>Welcome ' . $this->HTML->link(AuthComponent::user('full_name'), array('controller' => 'users', 'action' => 'view', AuthComponent::user('id'))) ;
                                }
                                else {
                                    echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 'login'))
                                        .' or '.$this->HTML->link('Register', array('controller' => 'users', 'action' => 'add')) ;
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<br/>
		<div id="footer">            
                <p id="cake-powered">
                    <?php echo "powered by " . $this->Html->image('zWeb.png'); ?>
                </p>
		</div>
	</div>
</body>
</html>
