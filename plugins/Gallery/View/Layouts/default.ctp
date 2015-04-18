<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>zWeb Gallery: <?php echo $title_for_layout; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"/>
    <link rel="shortcut icon" href="favicon.ico"/>

    <?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
        <?php echo $this->Html->css(
            array(
                'Gallery.themes/' . Configure::read('GalleryOptions.App.theme') . '.min'
            )
        ); ?>
    <?php } ?>

    <?php echo $this->Html->script('Gallery.lib/modernizr') ?>
    <?php echo $this->fetch('css'); ?>
</head>
<body class="<?php echo $this->params->params['controller'] . '_' . $this->params->params['action'] ?>"
      data-base-url="<?php echo $this->params->webroot ?>"
      data-plugin-base-url="<?php echo $this->Html->url(
          array('plugin' => 'gallery', 'controller' => 'gallery', 'action' => 'index')
      ) ?>">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>


<?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<?php } ?>

<?php echo $this->fetch('js'); ?>

<?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
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
                                '/galleryevents/index'
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
                                    echo $this->HTML->link('Logout', '/users/logout')  .
                                        '<br/>Welcome ' . $this->HTML->link(AuthComponent::user('full_name'), 
                                            '/users/view/' . AuthComponent::user('id')) ;
                                }
                                else {
                                    echo $this->HTML->link('Login', '/users/login')
                                        .' or '.$this->HTML->link('Register', '/users/add') ;
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
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
<?php } else { ?>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
<?php } ?>

</body>
</html>
