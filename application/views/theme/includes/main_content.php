<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
           
			<?php

			if(isset($content))
			  $this->load->view($content);

			if(isset($listing))
			  $this->load->view($listing);

			?>

        </div>
    </div>
</div>



