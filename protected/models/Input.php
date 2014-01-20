<?php
class Input
{
    
    private $name = '';
    private $value = '';
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setValue($value)
    {
        $this->value = $value;
    }
    public function CheckSuitability()
    {
        $result = false;
        if($this->name != '')
        {
            $result = true;
        }
        return $result;
    }
}
?>
