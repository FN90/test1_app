<?php
$url = base_url()."management/boat";
?>
<div class="x_panel">
    <div class="x_title">
        <!-- Main title here -->
        <h2><?php print lang('boat_student_assignement'); ?></h2>
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
            print $row ? "<b>".lang('name').": </b>".$row->name:"";
            print "<br>";
            print $row ? "<b>".lang('price').": </b>".$row->price:"";
            print "<br>";
            print "<b>".lang('color').": </b>".$row->color;
            print "<br><hr>";

            $max_student = 8;
            $max_student_has_skipair = 4;
            $nbr_student = $boat_students ? count($boat_students):0;
            $left_places = $max_student - $nbr_student;
            $percentage = 100 - ($left_places/$max_student) * 100;
            print lang('student_nbr').": ".$nbr_student;
            print " (".lang('avalibale_places').":  $left_places )";
            print '<div class="progress" style="width: 50%">
                    <div class="progress-bar progress-bar-info" data-transitiongoal="'.$percentage.'"></div>
                  </div>';
            // count student that has skipair
            $nbr_student_has_skipair = 0;
            if($boat_students)
            {
                foreach ($boat_students as $row) 
                {
                    if($row->has_skipair)
                        $nbr_student_has_skipair++;
                }
            }
            $left_places_has_skipair = $max_student_has_skipair - $nbr_student_has_skipair;
            $percentage_has_skipair = 100 - ($left_places_has_skipair/$max_student_has_skipair) * 100;
           
            print lang('student_has_skipair_nbr').": ".$nbr_student_has_skipair;
            print " (".lang('avalibale_places').":  $left_places_has_skipair )";
             print '<div class="progress" style="width: 50%">
                    <div class="progress-bar progress-bar-success" data-transitiongoal="'.$percentage_has_skipair.'"></div>
                  </div>';

            print "<br><br>";
            // show warnings
            if($left_places==0)
            {
                print '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <b>'.lang('warning').':</b> '.lang('cannot_add_student').'
                      </div>';
            }
            else if($left_places_has_skipair==0)
            {
                print '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <b>'.lang('warning').':</b> '.lang('cannot_add_student_has_skipair').'
                      </div>';
            }
        ?>

        <div class="ln_solid"></div>
        <span class="section"><?php print lang('assigned_students'); ?></span>

         <table id="" class="table table-hover">
              <thead>
                <tr>
                  <th width="5%"></th>
                  <th><?php print lang('first_name'); ?></th>
                  <th><?php print lang('last_name'); ?></th>
                  <th><?php print lang('has_skipair'); ?></th>
                </tr>
              </thead>


              <tbody>
                <?php
                    $rows = $boat_students;
                    if($rows)
                    {
                        foreach ($rows as $row) 
                        {
                            print "<tr>";
                            print '<td><a  href="#" data-target="#delete_modal" data-toggle="modal" class="delete_action btn btn-danger btn-xs" data-id="'.$row->id.'"><i class="fa fa-trash-o"></i></a></td>';
                            print "<td>$row->first_name</td>";
                            print "<td>$row->last_name</td>";
                            print $row->has_skipair ? "<td>".lang('yes')."</td>":"<td>".lang('no')."</td>";
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
        <span class="section"><?php print lang('add_student_boat'); ?></span>
        <?php

        if($left_places!=0)
        {
        ?>
         <table id="my_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th><?php print lang('first_name'); ?></th>
                  <th><?php print lang('last_name'); ?></th>
                  <th><?php print lang('has_skipair'); ?></th>
                  <th><?php print lang('assigned'); ?></th>
                  <th width="30%"><?php print lang('assignement'); ?></th>
                </tr>
              </thead>

               
                  <tbody>
                    <?php
                        $rows = $students;
                        if($rows)
                        {
                            foreach ($rows as $row) 
                            {
                                if($left_places_has_skipair==0)
                                {
                                    if(!$row->has_skipair)
                                    {
                                        print "<tr>";
                                        print "<td>$row->first_name</td>";
                                        print "<td>$row->last_name</td>";
                                        print $row->has_skipair ? "<td>".lang('yes')."</td>":"<td>".lang('no')."</td>";
                                         print $row->assigned ? "<td>".lang('yes')."<br>$row->boat</td>":"<td>".lang('no')."</td>";
                                        print "<td>";
                                        if($row->assigned)
                                        {
                                            print '<a  href="#" data-target="#my_modal" data-toggle="modal" class="delete_action btn btn-success btn-xs" data-id="'.$row->id.'"><i class="fa fa-plus-circle"></i> '.lang("reassign").' </a>';
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
                                    print "<td>$row->first_name</td>";
                                    print "<td>$row->last_name</td>";
                                    print $row->has_skipair ? "<td>".lang('yes')."</td>":"<td>".lang('no')."</td>";
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
            <?php
            }
            else
            {
                print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <b>'.lang('warning').':</b> '.lang('cannot_add_student').'
                      </div>';
            }
            ?>
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
            <form method='POST' action="<?php print $url.'/post_delete_student_assgnement'; ?>">
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
            <form method='POST' action="<?php print $url.'/post_assign_student'; ?>">
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