<?php
class InputParser
{
    private $form = '';
    public function setForm($form)
    {
        $this->form = $form;
    }
    public function PickUpInputs()
    {
        $result = false;
        $inputs = $this->form->find('input');
        foreach ($inputs as $working_input)
        {
            $input = new Input();
            $name = $this->DefinitionName($working_input);
            if($name !== false)
            {
                $input->setName($name);
            }
            $value = $this->DefinitionValue($working_input);
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
}
?>
