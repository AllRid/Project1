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
    public function PickUp()
    {
        $result = false;
        $simpleHtml = new SimpleHTMLDOM;
        $page = $simpleHtml->file_get_html($this->href);
        $this->page = $page;
        $forms = $page->find('form');
        foreach ($forms as $form)
        {
            $action = $this->DefinitionAction($form);
            if($action !== false)
            {
                $this->action = $action;
            }
            $inputs = $this->DefinitionInputs($form);
            if($inputs !== false)
            {
                $this->inputs = $inputs;
            }
            if($this->CheckSuitability())
            {
                $result[] = $this;
            }
        }
        return $result;
    }
    function DefinitionAction($form)
    {
        $result = false;
        if($form->action == '')
        {
            $result = $this->href;
        }
        else
        {
            $result = $form->action;
        }
        return $result;
    }
    function DefinitionInputs($form)
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
    function CheckSuitability()
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
