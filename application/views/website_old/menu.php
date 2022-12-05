 <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Categories</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                   <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">
                            <?php  $categories = $this->menu->get_categories(); ?>
                            <?php foreach ($categories as $cat): ?>
                            <li>
                                <a class="parent" href="#"><img class="icon-menu" alt="<?=$cat->name;?>" src="<?=base_url();?>uploads/categories_icon/<?=$cat->category_icon;?>"><?=$cat->name;?></a>
                                <?php $sub_category = $this->menu->get_sub_categories_where($cat->id_categories); ?>
                               
                                <div class="vertical-dropdown-menu">
                                    <div class="vertical-groups col-sm-12">
                                     <?php foreach ($sub_category as $sub_cat): ?>
                                        <div class="mega-group col-sm-4">
                                            <h4 class="mega-group-header"><span><?=$sub_cat->name;?></span></h4>
                                            <?php $sub_sub_category = $this->menu->get_sub_sub_categories_where($sub_cat->id_sub_categories); ?>
                                            <?php foreach ($sub_sub_category as $sub_sub_cat): ?>
                                            <ul class="group-link-default">
                                                <li><a href="<?=base_url();?>Products/view/<?=rtrim(base64_encode($sub_sub_cat->id_sub_sub_categories),'=');?>?d=<?=rtrim(base64_encode($sub_sub_cat->id_sub_sub_categories),'=');?>"><?=$sub_sub_cat->name;?></a></li>
                                            </ul>
                                        <?php endforeach; ?>
                                        </div>
                                         <?php endforeach;?>
                                        <div class="mega-custom-html col-sm-12">
                                            <a href="#"><img src="<?=base_url();?>uploads/categories_images/<?=$cat->menu_image;?>" alt="Banner"></a>
                                        </div>
                                    </div>
                                </div>
                           
                            </li>
                            <?php endforeach;?>
                          
                            
                           
                        </ul>
                        <div class="all-category"><span class="open-cate">All Categories</span></div>
                    </div>
                </div>
                </div>
                
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>