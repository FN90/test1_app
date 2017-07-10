<?php
$callapsed = $row ? '':'collapse';
$url = base_url()."management/boat";
?>
<div class="x_panel collapsed">
    <div class="x_title">
        <!-- Main title here -->
        <a href="#" class="collapse-link"><h2><?php print $this->lang->line('add_boat'); ?></h2></a>
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
          <span class="section"><?php print lang('boat_info'); ?></span>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php print $this->lang->line('name'); ?> <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?php print $row ? $row->name:''; ?>">
            </div>
          </div>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3"><?php print lang('price'); ?> <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" data-inputmask="'mask': '999.999'" name="price" required="required" value="100.000">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
              </div>
            </div>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="color">
                  <option value="BLUE"><?php print lang('blue'); ?></option>
                  <option value="NAVY_BLUE"><?php print lang('navy_blue'); ?></option>
                  <option value="GREEN"><?php print lang('green'); ?></option>
                  <option value="RED"><?php print lang('red'); ?></option>
                  <option value="PURPLE"><?php print lang('purple'); ?></option>
                </select>
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