<?php

class Spinner {
    
    protected $vars    = array();
    protected $regex   = '~\{(((?>[^{}]+)|(?R))*)\}~s';
    protected $_ldelim = '{';
    protected $_rdelim = '}';
   
    public function __construct($config = array())
    {
        if ( ! empty($config))
        {
            $this->initialize($config);
        }
    }
   
    public function initialize($config)
    {
        foreach ($config as $name => $value)
        {
            if (isset($this->{'_'.$name}))
            {
                $this->{'_'.$name} = $value;
            }
        }
    }
   
    public function set($name, $value = NULL)
    {
        if (is_array($name))
        {
            foreach ($name as $key => $value)
            {
                $this->vars[$this->_to_var($key)] = (string) $value;
            }
        }
        else
        {
            $this->vars[$this->_to_var($name)] = (string) $value;
        }
    }
   
    public function get($name = NULL)
    {
        if (is_null($name))
        {
            return $this->vars;
        }
       
        $name = $this->_to_var($name);
       
        if (isset($this->vars[$name]))
        {
            return $this->vars[$name];
        }
    }
   
    public function spin($output, $vars = array())
    {
        // local variables
        $_vars = array();
       
        // rebuild its keys as variable
        foreach ($vars as $name => $value)
        {
            $_vars[$this->_to_var($name)] = (string) $value;
        }
       
        // we don't need it anymore
        unset($vars);
       
        // now override global variables with local
        $_vars = array_merge($this->vars, $_vars);
       
        // start variable processing
        $output = str_replace(array_keys($_vars), $_vars, $output);
       
        return $this->_spin($output);
    }
   
    protected function _spin($output)
    {
        return preg_replace_callback($this->regex, array($this, '_spin_callback'), $output);
    }
   
    protected function _spin_callback($match)
    {
        if (preg_match($this->regex, $match[1]))
        {
            $match[1] = $this->_spin($match[1]);
        }
       
        $words = explode('|', $match[1]);
        return $words[array_rand($words)];
    }
   
    protected function _to_var($name)
    {
        return $this->_ldelim.$name.$this->_rdelim;
    }
   
}

/* End spinner.php */