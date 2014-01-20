<?php
class Form
{
    private $action = '';
    private $inputs = array();
    public function getAction()
    {
        return $this->action;
    }
    public function setAction($action)
    {
        $this->action = $action;
    }
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    }
    public function CheckSuitability()
    {
        $result = false;
        if($this->action != '')
        {
            $result = true;
        }
        return $result;
    }
}
?>
