<?php
class Form
{
    private $DOM_form = false;
    public function setDOMForm($DOM_form)
    {
        $this->DOM_form = $DOM_form;
    }
    public function DetermineActionForm($form)
    {
        $result = false;
        if($form->action == '')
        {
            $result = $this->getHref();
        }
        else
        {
            $result = $form->action;
        }
        return $result;
    }
}