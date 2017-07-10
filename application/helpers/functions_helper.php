<?php

// get lang attribute from key
function lang($key=NULL)
{
    $CI=&get_instance();
    if($key)
        return $CI->lang->line($key);
}

// redirect easily
function my_redirect($folder, $controller, $method="index")
{
    redirect(base_url().$folder."/".$controller."/".$method);
}