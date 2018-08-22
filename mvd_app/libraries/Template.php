<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	  /** @var array $_js */
    private $_js = [];

    /** @var array $_css */
    private $_css = [];

  

    /** @var  $_ci */
    private $CI;
    
    /**
     * Class constructor
     */
    function __construct()
    {
        $this->CI =& get_instance();
    }
	var $template_data = array();
		
	function set($name, $value) {
		$this->template_data[$name] = $value;
	}
	
	function load($template = '', $view = '' , $view_data = array(), $return = FALSE) {               
		$this->_extract();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
		return $this->CI->load->view($template, $this->template_data, $return);
	}
		
	function load_partial($template = '', $view = '' , $view_data = array(), $return = FALSE) {
		$this->set('contents', $this->template_data['controller']->load->view($view, $view_data, TRUE));
		return $this->template_data['controller']->load->view($template, $this->template_data, $return);
	}  

	/**
     * Created js additional
     * @param        $script
     * @param string $type
     * @param bool   $defer
     * @return bool
     */
    function js_add($script, $type = 'import', $defer = false)
    {
        $success = true;
        $js = null;

        $this->CI->load->helper('url');

        switch($type) {
            case 'import':
                $filepath = base_url() . $script;
                $js = '<script type="text/javascript" src="' . $filepath . '"';
                if($defer) {
                    $js .= ' defer="defer"';
                }
                $js .= "></script>";
                break;
            case 'link':
                $js = '<script type="text/javascript" src="' . $script . '"';
                if($defer) {
                    $js .= ' defer="defer"';
                }
                $js .= "></script>";
                break;

            case 'embed':
                $js = '<script type="text/javascript"';
                if($defer) {
                    $js .= ' defer="defer"';
                }
                $js .= ">";
                $js .= $script;
                $js .= '</script>';
                break;

            default:
                $success = false;
                break;
        }

        // Add to js array if it doesn't already exist
        if($js != null && ! in_array($js, $this->_js)) {
            $this->_js[] = $js;

        }

        return $success;
    }
    
    
    /**
     * Created js additional
     * @param        $style
     * @param string $type
     * @param bool   $media
     * @return bool
     */
    function css_add($style, $type = 'link', $media = false)
    {
        $success = true;
        $css = null;

        $this->CI->load->helper('url');
        $filepath = base_url() . $style;

        switch($type) {
            case 'link':

                $css = '<link type="text/css" rel="stylesheet" href="' . $filepath . '"';
                if($media) {
                    $css .= ' media="' . $media . '"';
                }
                $css .= ' />';
                break;

            case 'import':
                $css = '<style type="text/css" rel="stylesheet" href="'.$style.'"></style>';
                break;

            case 'embed':
                $css = '<style type="text/css">';
                $css .= $style;
                $css .= '</style>';
                break;

            default:
                $success = false;
                break;
        }

        // Add to js array if it doesn't already exist
        if($css != null && ! in_array($css, $this->_css)) {
            $this->_css[] = $css;

        }

        return $success;
    }

    /**
     * Extract Css to rendered
     */
    function _extract()
    {
        $_css = "";
        if($this->_css) {
            foreach($this->_css as $css) {
                $_css .= $css;
            }
        }
        
        $_js = "";
        if($this->_js) {
            foreach($this->_js as $js) {
                $_js .= $js;
            }
        }
        
        $this->set('css', $_css);         
        $this->set('js', $_js); 
    }
    
}


/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */