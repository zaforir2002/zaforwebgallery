<?php $this->Html->css(array(
    'Gallery.style'
),
    array('block' => 'css')) ?>

<div class="row">
    <div class="col-md-10">
        <h2><?php echo $page_title ?></h2>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-md-12">
        <div class="row">

            <?php if (empty($galleries)) { ?>
                <div class="container-empty">
                    <div class="img"><i class="fa fa-picture-o"></i></div>
                    <h2>You don't have <?php echo $search_status ?> albums yet.</h2>
                    <br/>
                    <?php //echo $this->Gallery->new_gallery_button(
                          //      array('class' => 'btn btn-primary', 'style' => 'margin-top: 10px')
                          //      );
                          echo $this->Gallery->link(null, null,
                                array('class' => 'btn btn-primary pull-centre', 'style' => 'margin-top: 10px')
                                ); 
                    ?>
                </div>
            <?php } else { ?>
                <?php foreach ($galleries as $gallery) { ?>
                    <a
                        href="<?php echo $this->Html->url(
                            array(
                                'controller' => 'albums',
                                'action' => 'view',
                                'plugin' => 'gallery',
                                $gallery['Album']['id']
                            )
                        ) ?>">
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail <?php echo $search_status ?>">
                                <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>
                                <img src="<?php echo $picture_url ?>" alt="...">

                                <div class="caption">
                                    <h4>
                                        <?php if ($gallery['Album']['status'] == 'draft') { ?>
                                            <i class="fa fa-pagelines"></i>
                                        <?php } else { ?>
                                        <?php } ?>
                                        <?php echo $gallery['Album']['title'] ?>
                                    </h4>
                                    <h5><i class="fa fa-smile-o"></i> <?php echo $gallery['User']['full_name'] ?></h5>
                                    <h5><i
                                            class="fa fa-calendar"></i> <?php echo $this->Time->format(
                                            $gallery['Album']['created'],
                                            '%B %e, %Y %H:%M %p'
                                        ) ?>
                                    </h5>
                                    <h5><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Picture']) ?></h5>

                                </div>
                            </div>
                            </a>

                            <?php   
                            ?>
                        
                            <?php 
                                if($gallery['Album']['event_id'] == $event_id){
                                    echo 'Added to the ' . $event_title ;
                                }else{
                                    echo $this->Form->create(null, array(
                                        'url' => '/gallery/gallery/view/' . 
                                                    $gallery['Album']['id'] . '/' . 
                                                    $event_id . '/' .
                                                    $event_title)
                                        ); 
                                    echo $this->Form->end(__('Add to the ' . $event_title)); 
                                }
                            ?>                                
                        </div>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
</div>
