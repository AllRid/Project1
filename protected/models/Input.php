<?php
class Input
{
    private $form = '';
    private $name = '';
    private $value = '';
    public function setForm($form)
    {
        $this->form = $form;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setValue($value)
    {
        $this->value = $value;
    }
    public function PickUp()
    {
        $result = false;
        $inputs = $this->form->find('input');
        foreach ($inputs as $working_input)
        {
            $input = new Input();
            $name = $input->DefinitionName($working_input);
            if($name !== false)
            {
                $input->setName($name);
            }
            $value = $input->DefinitionValue($working_input);
            if($value !== false)
            {
                $input->setValue($value);
            }
            if($input->CheckSuitability())
            {
                $result[] = $input;
            }
        }
        return $result;
    }
    public function DefinitionName($input)
    {
        $result = false;
        if($input->name != '')
        {
            $result = $input->name;
        }
        return $result;
    }
    public function DefinitionValue($input)
    {
        $result = false;
        if($input->value != '')
        {
            $result = $input->value;
        }
        return $result;
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
