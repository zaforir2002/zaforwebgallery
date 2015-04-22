

<?php 
    $this->Html->css(array('Gallery.style'),array('block' => 'css')); 
    
    $published_album = 0;
    $draft_album = 0;
    
    foreach ($galleries as $gallery) {
        if($gallery['Album']['status'] == 'published'){
            $published_album = $published_album + 1;
        }
        if($gallery['Album']['status'] == 'draft'){
            $draft_album = $draft_album + 1;
        }
    }
    
    $total_album = $published_album + $draft_album;
?>

<?php if (empty($galleries) && AuthComponent::user('type') == 'Artist') { ?>
    <div class="container-empty">
        <div class="img"><i class="fa fa-picture-o"></i></div>
        <h2>You don't have any albums yet.</h2>
        <br/>

        <?php 
            if(AuthComponent::user()){
                echo $this->Gallery->link(
                                        AuthComponent::user('username'), 
                                        AuthComponent::user('id'),
                                        array(
                                            'class' => 'btn btn-primary', 
                                            'style' => 'margin-top: 10px'
                                        )
                );
            } 
        ?>
    </div>
<?php }?>
<?php if($published_album > 0) { ?>
    <div class="row">
        <div class="col-md-10">
            <h2><?php echo 'Published albums' ?></h2>
        </div>
        <div class="col-md-2">
            <?php
                if(AuthComponent::user('type') == 'Artist') { 
                    if(AuthComponent::user()){
                        echo $this->Gallery->link(
                                                AuthComponent::user('username'), 
                                                AuthComponent::user('id'),
                                                array(
                                                    'class' => 'btn btn-primary pull-right', 
                                                    'style' => 'margin-top: 10px'
                                                )
                        );
                    }
                } 
            ?>
        </div>
    </div>

    <hr/>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php 
                    foreach ($galleries as $gallery) { 
                        if($gallery['Album']['status'] == 'published'){
                ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail <?php echo $search_status ?>">
                            <a
                                href="<?php echo $this->Html->url(
                                    array(
                                        'controller' => 'albums',
                                        'action' => 'view',
                                        'plugin' => 'gallery',
                                        $gallery['Album']['id']
                                    )
                                ) ?>">
                                <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>
                                <img src="<?php echo str_replace('\\','/',$picture_url); ?>" alt="...">
                            </a>                                
                            <div>
                                <div>
                                    <h4>
                                        <?php echo $gallery['Album']['title'] ?>                                        
                                        <button class="btn btn-success pull-right btn-sm" data-toggle="collapse" data-target="#<?php echo $gallery['Album']['id']?>">
                                            <i class="fa fa-info-circle"></i>
                                        </button>
                                    </h4>
                                </div>                                
                                <div class="caption collapse" id="<?php echo $gallery['Album']['id']?>">
                                    <h5><i
                                            class="fa fa-calendar"></i> <?php echo $this->Time->format(
                                            $gallery['Album']['created'],
                                            '%B %e, %Y %H:%M %p'
                                        ) ?>
                                    </h5>
                                    <h5><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Picture']) ?></h5>

                                    <?php if(!empty($gallery['Album']['event_id'])) : ?>
                                    
                                        <h5>
                                            <i class="fa fa-envelope-o"></i> 
                                            <?php echo $gallery['GalleryEvent']['title'] ?>
                                        </h5>
                                        <h5>
                                            <i class="fa fa-calendar"></i> 
                                            <?php echo $this->Time->format(
                                                                        $gallery['GalleryEvent']['event_start_date'],
                                                                         '%e/%m/%y %H:%M %p') ?>
                                        </h5>
                                        <h5>
                                            <i class="fa fa-calendar"></i> 
                                            <?php echo $this->Time->format(
                                                                        $gallery['GalleryEvent']['event_end_date'],
                                                                         '%e/%m/%y %H:%M %p') ?>
                                        </h5>
                                    
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php   } } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if($draft_album > 0) { ?>
    <div class="row">
        <div class="col-md-10">
            <h2><?php echo 'Draft albums' ?></h2>
        </div>
        <div class="col-md-2">
            <?php 
                if($published_album == 0 && AuthComponent::user('type') == 'Artist') {
                    if(AuthComponent::user()){
                        echo $this->Gallery->link(
                                                AuthComponent::user('username'), 
                                                AuthComponent::user('id'),
                                                array(
                                                    'class' => 'btn btn-primary pull-right', 
                                                    'style' => 'margin-top: 10px'
                                                )
                        );
                    }
                } 
            ?>
        </div>
    </div>

    <hr/>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php 
                    foreach ($galleries as $gallery) { 
                        if($gallery['Album']['status'] == 'draft'){
                ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail <?php echo $search_status ?>">
                            <a
                                href="<?php echo $this->Html->url(
                                    array(
                                        'controller' => 'albums',
                                        'action' => 'view',
                                        'plugin' => 'gallery',
                                        $gallery['Album']['id']
                                    )
                                ) ?>">
                                <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>
                                <img src="<?php echo str_replace('\\','/',$picture_url); ?>" alt="...">
                            </a>
                            <div>
                                <div>
                                    <h4>
                                        <i class="fa fa-pagelines"></i>
                                        <?php echo $gallery['Album']['title'] ?>                                        
                                        <button class="btn btn-success pull-right btn-sm" data-toggle="collapse" data-target="#<?php echo $gallery['Album']['id']?>">
                                            <i class="fa fa-info-circle"></i>
                                        </button>
                                    </h4>
                                </div>                                
                                <div class="caption collapse" id="<?php echo $gallery['Album']['id']?>">
                                    <h5><i
                                            class="fa fa-calendar"></i> <?php echo $this->Time->format(
                                            $gallery['Album']['created'],
                                            '%B %e, %Y %H:%M %p'
                                        ) ?>
                                    </h5>
                                    <h5><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Picture']) ?></h5>

                                    <?php if(!empty($gallery['Album']['event_id'])) : ?>
                                    
                                        <h5>
                                            <i class="fa fa-envelope-o"></i> 
                                            <?php echo $gallery['GalleryEvent']['title'] ?>
                                        </h5>
                                        <h5>
                                            <i class="fa fa-calendar"></i> 
                                            <?php echo $this->Time->format(
                                                                        $gallery['GalleryEvent']['event_start_date'],
                                                                         '%e/%m/%y %H:%M %p') ?>
                                        </h5>
                                        <h5>
                                            <i class="fa fa-calendar"></i> 
                                            <?php echo $this->Time->format(
                                                                        $gallery['GalleryEvent']['event_end_date'],
                                                                         '%e/%m/%y %H:%M %p') ?>
                                        </h5>
                                    
                                    <?php endif; ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                <?php   } } ?>
            </div>
        </div>
    </div>
<?php } ?>