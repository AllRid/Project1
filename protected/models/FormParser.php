<?php
class FormParser
{
    private $href = '';
    private $page = '';
    public function setHref($href)
    {
        $this->href = $href;
    }
    public function PickUpForms()
    {
        $result = false;
        $simpleHtml = new SimpleHTMLDOM;
        $page = $simpleHtml->file_get_html($this->href);
        $this->page = $page;
        $forms = $page->find('form');
        foreach ($forms as $working_form)
        {
            $form = new Form;
            $action = $this->DefinitionAction($working_form);
            if($action !== false)
            {
                $form->setAction($action);
            }
            $inputs = $this->DefinitionInputs($working_form);
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
    public function DefinitionAction($form)
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
    public function DefinitionInputs($form)
    {
        $result = false;
        $input = new InputParser;
        $input->setForm($form);
        $inputs = $input->PickUpInputs();
        if($inputs !== false)
        {
            $result = $inputs;
        }
        return $result;
    }
}
?>

