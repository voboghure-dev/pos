<?php
session_start();

class CI_Session
{

    var $CI;
    var $DB;
    var $CurTime;

    function CI_Session()
    {
        $this->CI =& get_instance();
        $this->DB = $this->CI->load->database();
        $this->CurTime = time();
        if (isset($_SESSION['flash_time']))
        {
            $this->LastTime = $_SESSION['flash_time'];
        }//if
        else
        {
            $this->LastTime = 0;
        }//else
        $_SESSION['flash_time'] = $this->CurTime;
    }

    function set_userdata($name, $value = NULL)
    {
        if( ! is_array($name))
        {
            if($value === NULL)
            {
                show_error("Second parameter for set_userdata missing.");
            } // if
            else
            {
                if(isset($_SESSION[$name]))
                {
                    unset($_SESSION[$name]);
                } // if
                $_SESSION[$name] = $value;
            } // else
        } // if
        else
        {
            foreach($name as $names => $key)
            {
                if(isset($_SESSION[$names]))
                {
                    unset($_SESSION[$names]);
                }
                $_SESSION[$names] = $key;
            } // forech
        } //  else
    } // set_userdata

    function userdata($item, $string = NULL)
    {
        if( ! $string === NULL)
        {
            if(!isset($_SESSION[$item]))
            {
                return FALSE;
            } // if
            else
            {
                return TRUE;
            } // else
        } // if
        else
        {
            if(!isset($_SESSION[$item]))
            {
                return FALSE;
            } // if
            else
            {
                return $_SESSION[$item];
            } // else
        } // else
    } // userdata

    function unset_userdata($userdata)
    {
        if(!is_array($userdata))
        {
            unset($_SESSION[$userdata]);
        } // if
        else
        {
            foreach($userdata as $item)
            {
                unset($_SESSION[$item]);
            } // foreach
        } // else
    } // unset_userdata

    function sess_destroy()
    {
        session_destroy();
        session_start();
        $_SESSION['flash_time'] = $this->CurTime;
    } // session_destroy

    function set_flashdata($item, $value=NULL)
    {
        if (is_array($item))
        {
            foreach($item as $key=>$val)
            {
                $session = array(
                    'flash_'.$key=>array('
                        data'=>$val,
                        'set'=>$this->CurTime
                    )
                );
                $this->set_userdata($session);

            }//foreach
        }//if
        else
        {
            $session = array(
                'flash_'.$item=>array(
                    'data'=>$value,
                    'set'=>$this->CurTime
                )
            );
            $this->set_userdata($session);
        }//else
    }//set_flashdata

    function flashdata($item)
    {
        $session = $this->userdata('flash_'.$item);
        if ($session['set']>=0)
        {
            return $session['data'];
        }//if ($session['set']>=0)
        else
        {
            return false;
        }//else
    }//flashdata

    function keep_flashdata($item)
    {
        if ($this->flashdata('flash_'.$item, true))
        {
            $_SESSION['flash_'.$item]['set'] = $this->CurTime;
        }//if

    }//keep_flashdata

}

/* End of file Session.php */
/* Location: application/libraries */