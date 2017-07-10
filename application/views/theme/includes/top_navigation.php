<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>

            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">


                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="<?php print $assets_url; ?>images/users/<?php print $this->session->userdata('user_photo'); ?>"
                             alt="">
                        <?php print $this->session->userdata('username'); ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <!--
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                          <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                      -->
                        <li><a href="<?php print base_url(); ?>index.php/login/logout"><i
                                        class="fa fa-sign-out pull-right"></i> <?php print lang('logout');?></a></li>
                    </ul>
                </li>

                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php print base_url(); ?>assets/images/flags/<?php print $this->session->userdata('admin_language'); ?>.png" alt=""><?php print lang( $this->session->userdata('admin_language')); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-left">
                    <?php 

                    if($this->session->userdata('admin_language')=='french')
                    {
                        print '<li><a style="background: #eff1f4;"> <img src="'.base_url().'assets/images/flags/french.png"> '.lang('french').'</a></li>';
                    }
                    else
                    {
                        print '<li><a href="'.base_url().'switch_language/index/french"><img src="'.base_url().'assets/images/flags/french.png">  '.lang('french').'</a></li>';
                    }

                    if($this->session->userdata('admin_language')=='spanich')
                    {
                        print '<li><a style="background: #eff1f4;"> <img src="'.base_url().'assets/images/flags/spanich.png"> '.lang('spanich').'</a></li>';
                    }
                    else
                    {
                        print '<li><a href="'.base_url().'switch_language/index/spanich"> <img src="'.base_url().'assets/images/flags/spanich.png"> '.lang('spanich').'</a></li>';
                    }
                    ?>
                  </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->