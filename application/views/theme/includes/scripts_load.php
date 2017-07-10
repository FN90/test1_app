<!-- CKEditor -->
<script src="<?php print $assets_url; ?>js/ckeditor/ckeditor.js"></script>
<!-- jQuery -->
<script src="<?php print $assets_url; ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php print $assets_url; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php print $assets_url; ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php print $assets_url; ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php print $assets_url; ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php print $assets_url; ?>vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php print $assets_url; ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php print $assets_url; ?>vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php print $assets_url; ?>vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php print $assets_url; ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?php print $assets_url; ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php print $assets_url; ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php print $assets_url; ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php print $assets_url; ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php print $assets_url; ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php print $assets_url; ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php print $assets_url; ?>vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php print $assets_url; ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php print $assets_url; ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php print $assets_url; ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php print $assets_url; ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<?php
if($this->session->userdata('admin_language')=='spanich')
{
    print '<script src="'.base_url().'assets/vendors/validator/validator-spanich.js"></script>';
}
else
{
    print '<script src="'.base_url().'assets/vendors/validator/validator.js"></script>';
}
?>

<!-- Datatables -->
<script src="<?php print $assets_url; ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php print $assets_url; ?>vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php print $assets_url; ?>vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Switchery -->
<script src="<?php print $assets_url; ?>vendors/switchery/dist/switchery.min.js"></script>
<!-- PNotify -->
<script src="<?php print $assets_url; ?>vendors/pnotify/dist/pnotify.js"></script>
<script src="<?php print $assets_url; ?>vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?php print $assets_url; ?>vendors/pnotify/dist/pnotify.nonblock.js"></script>

<!-- FastClick -->
<script src="<?php print $assets_url; ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php print $assets_url; ?>vendors/nprogress/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?php print $assets_url; ?>vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
  <!-- jquery.inputmask -->
<script src="<?php print $assets_url; ?>/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>


<!-- Custom Theme Scripts -->
<script src="<?php print $assets_url; ?>js/custom.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var lang = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json";
    <?php
    if($this->session->userdata('admin_language')=='spanich')
    {
        print 'lang = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json";';
    }
    else
    {
        print 'lang = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json";';
    }
    ?>
    // datatable
  	if ($("#my_table").length) 
    {
    	$('#my_table').DataTable({
     		"iDisplayLength":50,
        "language": {
            "url": lang
        }
     	});
    }


     
	if ( $( "#email_text" ).length ) {
		CKEDITOR.replace( 'email_text' );
	}

  if ( $( "#courriel" ).length ) {
    CKEDITOR.replace( 'courriel' );
  }

      $(".select2_single").select2({
          placeholder: "Sélect...",
          allowClear: true
      });
      $(".select2_multiple").select2({
          placeholder: "Sélect...",
          allowClear: true
      });
  });  

</script>


<!-- Highcharts -->
<script src="<?php print $assets_url; ?>js/highcharts/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="<?php print $assets_url; ?>js/highcharts/exporting.js"></script>
<!-- /Select2 -->
<script src="<?php print base_url(); ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>




 <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
