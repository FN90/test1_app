<?php
$callapsed = $row ? '':'collapse';
$url = base_url()."management/student";
?>
<div class="x_panel collapsed">
    <div class="x_title">
        <!-- Main title here -->
        <a href="#" class="collapse-link"><h2><?php print $this->lang->line('add_student'); ?></h2></a>
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
                $action = base_url()."management/student/update";
            else
                $action = base_url()."management/student/insert";
        ?>
        <form class="form-horizontal form-label-left" novalidate method="POST" action="<?php print $action; ?> ">
        <!-- HIDDEN ID USED FOR EDIT -->
        <input type='hidden' name='id' value="<?php print $row ? $row->id:''; ?>">
          
          </p>
          <span class="section"><?php print lang('student_info'); ?></span>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name"><?php print $this->lang->line('first_name'); ?> <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="first_name" placeholder="e.g Jon" required="required" type="text" value="<?php print $row ? $row->first_name:''; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name"><?php print $this->lang->line('last_name'); ?> <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="email" name="last_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php print $row ? $row->last_name:''; ?>">
            </div>
          </div>

            <div class="item form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="has_skipair"><?php print $this->lang->line('has_skipair'); ?> <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="has_skipair" type="checkbox" class="js-switch" <?php if($row) print $row->has_skipair ? 'checked':''; ?> />
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
