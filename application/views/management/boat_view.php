<?php
$url = base_url()."management/boat";
?>
<div class="x_panel">
    <div class="x_title">
        <!-- Main title here -->
        <h2><?php print lang('boat_info'); ?></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
       <?php
            print $row ? "<b>".lang('name').": ".$row->name:"";
            print "<br>";
            print $row ? $row->price:"";
            print "<br>";
            print $row->color;
            print "<br>";
        ?>
            <div class="ln_solid"></div>
            <a href="<?php print $url.'/index/'; ?>"  class="btn btn-info btn-sm"><?php print lang('return'); ?></a>
            <a href="<?php print $url.'/edit/'.$row->id; ?>"  class="btn btn-success btn-sm"><?php print lang('edit'); ?></a>

      </div>
    </div>
</div>