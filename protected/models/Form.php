<?php
class Form
{
    private $page = '';
    //private $form = '';
    private $href = '';
    private $action = '';
    private $inputs = array();
    public function setHref($href)
    {
        $this->href = $href;
    }
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
    public function PickUp()
    {
        $result = false;
        $simpleHtml = new SimpleHTMLDOM;
        $page = $simpleHtml->file_get_html($this->href);
        $this->page = $page;
        $forms = $page->find('form');
        foreach ($forms as $working_form)
        {
            $form = new Form;
            $action = $form->DefinitionAction($working_form, $this->href);
            if($action !== false)
            {
                $form->setAction($action);
            }
            $inputs = $form->DefinitionInputs($working_form);
            if($inputs !== false)
            {
                $form->setInputs($inputs);
            }
            if($form->CheckSuitability())
            {
                $result[] = $form;
            }
        }
        return $result;
    }
    public function DefinitionAction($form, $href = null)
    {
        $result = false;
        if($form->action == '')
        {
            if($href !== null)
            {
                $result = $href;
            }
        }
        else
        {
            $result = $form->action;
        }
        return $result;
    }
    public function DefinitionInputs($form)
    {
        $result = false;
        $input = new Input;
        $input->setForm($form);
        $inputs = $input->PickUp();
        if($inputs !== false)
        {
            $result = $inputs;
        }
        return $result;
    }
    public function CheckSuitability()
    {
        $result = false;
        if($this->action != '')
        {
            $result = true;
        }
        $this->page = '';
        return $result;
    }
}
?>
