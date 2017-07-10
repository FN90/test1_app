
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php print base_url() . 'index.php/dashboard'; ?>" class="site_title"><i
                        class="fa fa-university"></i> <span>TEST</span></a>
        </div>

        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php print $assets_url; ?>images/users/<?php print $this->session->userdata('user_photo'); ?>"
                     alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span><?php print lang('hello');?></span>
                <h2>
                    <?php print $this->session->userdata('username'); ?>
                </h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">

                    <li><a href="<?php print base_url() . 'management/boat/index'; ?>"><i class="fa fa-dashboard"></i>
                             <?php print lang('boats'); ?> </a>

                     <li><a href="<?php print base_url() . 'management/student/index'; ?>"><i class="fa fa-graduation-cap"></i>
                            <?php print lang('students'); ?> </a>
                    </li>

                     
                    </li>
                    <li><a href="<?php print base_url() . 'management/book/index'; ?>"><i class="fa fa-book"></i>
                             <?php print lang('books'); ?> </a>
                    </li>

                    
                </ul>
            </div>

        </div>

    </div>
</div>
