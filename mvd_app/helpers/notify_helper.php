<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

/**
 * Alert helper
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */

if(!function_exists('notify'))
{
    function notify($msg,$type = 'info',$judul = '') 
    {
        
        $tpl = array();
        $tpl['type']  = $type;
        $tpl['message'] = $msg;
            
        return $tpl;
    }
}

?>
