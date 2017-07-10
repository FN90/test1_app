<?php
$callapsed = $row ? '':'collapse';
$url = base_url()."management/book";
?>
<div class="x_panel collapsed">
    <div class="x_title">
        <!-- Main title here -->
        <a href="#" class="collapse-link"><h2><?php print $this->lang->line('add_book'); ?></h2></a>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content <?php print $callapsed; ?>">
        <!-- Main content here -->
        <?php
            // choose action for the form : insert, update
            if($row)
                $action = $url."/update";
            else
                $action = $url."/insert";
        ?>
        <form class="form-horizontal form-label-left" novalidate method="POST" action="<?php print $action; ?> ">
        <!-- HIDDEN ID USED FOR EDIT -->
        <input type='hidden' name='id' value="<?php print $row ? $row->id:''; ?>">
          
          </p>
          <span class="section"><?php print lang('book_info'); ?></span>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php print $this->lang->line('name'); ?> <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text" value="<?php print $row ? $row->name:''; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url_on_amazon"><?php print $this->lang->line('url_on_amazon'); ?> <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="url_on_amazon" required="required" class="form-control col-md-7 col-xs-12" value="<?php print $row ? $row->url_on_amazon:''; ?>">
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button id="send" type="submit" class="btn btn-success btn-sm"><?php print lang('submit'); ?></button>
                <a href="<?php print $url; ?>"  class="btn btn-info btn-sm"><?php print lang('cancel'); ?></a>
            </div>
          </div>
        </form>
    </div>
</div>