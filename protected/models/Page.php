<?php
class Page
{
    private $DOM_page = false;
    private $href = false;
    public function __construct($href) 
    {
        if(link::CheckHref($href))
        {
            $this->href = $href;
            $simpleHtml = new SimpleHTMLDOM;
            $page = $simpleHtml->file_get_html($href);
            $this->DOM_page = $page;
        }
    }
    private function getDOMPage()
    {
        return $this->DOM_page;
    }
    private function getHref()
    {
        return $this->href;
    }
    public function getForms()
    {
        $result = false;
        $page = $this->getDOMPage();
        if($page !== false)
        {
            $forms = $page->find('form');
            if(count($forms))
            {
                foreach ($forms as $working_form)
                {
                    $form = new Form;

                }
            }
        }
        return $result;
    }
    function DetermineActionForm($form)
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
    function DetermineInputsForm($form)
    {
        $result = false;
        
        return $result;
    }
}
?>
