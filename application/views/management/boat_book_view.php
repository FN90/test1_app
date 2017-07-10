<?php
$url = base_url()."management/boat";
?>
<div class="x_panel">
    <div class="x_title">
        <!-- Main title here -->
        <h2><?php print lang('boat_book_assignement'); ?></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <!-- Main content here -->
        <?php
            print $row ? $row->name:"";
            print "<br>";
            print $row ? $row->price:"";
            print "<br>";
            print $row->color;
            print "<br>";
        ?>

        <div class="ln_solid"></div>
        <span class="section"><?php print lang('assigned_books'); ?></span>

         <table id="" class="table table-hover">
              <thead>
                <tr>
                  <th width="5%"></th>
                  <th><?php print lang('name'); ?></th>
                  <th><?php print lang('url_on_amazon'); ?></th>
                </tr>
              </thead>


              <tbody>
                <?php
                    $rows = $boat_books;
                    if($rows)
                    {
                        foreach ($rows as $row) 
                        {
                            print "<tr>";
                            print '<td><a  href="#" data-target="#delete_modal" data-toggle="modal" class="delete_action btn btn-danger btn-xs" data-id="'.$row->id.'"><i class="fa fa-trash-o"></i></a></td>';
                            print "<td>$row->name</td>";
                            print "<td>$row->url_on_amazon</td>";
                            print "</tr>";
                        }
                    }
                    else
                    {
                        print "<tr>";
                        print "<td align='center' colspan='4'>";
                        print lang('no_data_found');
                        print "</td>";
                        print "</tr>";
                    }
                
                ?>
              </tbody>
            </table>


        <div class="ln_solid"></div>
        <span class="section"><?php print lang('assign_books_boat'); ?></span>
        
         <table id="my_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th><?php print lang('name'); ?></th>
                  <th><?php print lang('url_on_amazon'); ?></th>
                  <th><?php print lang('assigned'); ?></th>
                  <th width="30%"><?php print lang('assignement'); ?></th>
                </tr>
              </thead>

               
              <tbody>
                <?php
                    $rows = $books;
                    if($rows)
                    {
                        foreach ($rows as $row) 
                        {
                            print "<tr>";
                            print "<td>$row->name</td>";
                            print "<td>$row->url_on_amazon</td>";
                             print $row->assigned ? "<td>".lang('yes')."<br>$row->boat</td>":"<td>".lang('no')."</td>";
                            print "<td>";
                            if($row->assigned)
                            {
                                print '<a  href="#" data-target="#assign_modal" data-toggle="modal" class="assign_action btn btn-success btn-xs" data-id="'.$row->id.'"><i class="fa fa-plus-circle"></i> '.lang("reassign").' </a>';
                            }
                            else
                            {
                                print '<a  href="#" data-target="#assign_modal" data-toggle="modal" class="assign_action btn btn-info btn-xs" data-id="'.$row->id.'"><i class="fa fa-plus-circle"></i> '.lang("assign").' </a>';
                            }
                            print "</td>";
                            print "</tr>";
                        }
                    }
                    else
                    {
                        print "<tr>";
                        print "<td align='center' colspan='4'>";
                        print lang('no_data_found');
                        print "</td>";
                        print "</tr>";
                    }
                ?>
              </tbody>
            </table>
    </div>
</div>

<!-- /modals -->
<!-- jQuery -->
<script src="<?php print base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
//triggered when modal is about to be shown

$(function () {
    $(".delete_action").click(function () {
        var my_id_value = $(this).data('id');
        $(".delete_modal_body #hiddenValue").val(my_id_value);
    })
});

$(function () {
    $(".assign_action").click(function () {
        var my_id_value = $(this).data('id');
        $(".assign_modal_body #hiddenValue").val(my_id_value);
    })
});
</script>
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="my_modalLabel">
    <div class="modal-dialog modal-sm" role="dialog">
        <div class="modal-content">
            <form method='POST' action="<?php print $url.'/post_delete_book_assgnement'; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php print lang('delete'); ?></h4>
                </div>
                <div class="delete_modal_body modal-body">
                    <?php print lang('delete_confirm_message'); ?>
                    <input type="hidden" name="id" id="hiddenValue" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php print lang('cancel'); ?></button>
                    <input type="submit" class="btn btn-danger" value="<?php print lang('delete'); ?>" >
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Assign modal -->
<div class="modal fade" id="assign_modal" tabindex="-1" role="dialog" aria-labelledby="my_modalLabel">
    <div class="modal-dialog modal-sm" role="dialog">
        <div class="modal-content">
            <form method='POST' action="<?php print $url.'/post_assign_book'; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php print lang('assignement'); ?></h4>
                </div>
                <div class="assign_modal_body modal-body">
                    <?php print lang('assign_confirm_message'); ?>
                    <input type="hidden" name="id" id="hiddenValue" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php print lang('cancel'); ?></button>
                    <input type="submit" class="btn btn-info" value="<?php print lang('assign'); ?>" >
                </div>
            </form>
        </div>
    </div>
</div>