<?php
class FormPage
{
    private $action = '';
    private $method = '';
    private $id = '';
    private $class = '';
    private $input = array();
    public function getMethod()
    {
        return $this->method;
    }
    public function setMethod($method)
    {
        $this->method = $method;
    }
    public function getInput()
    {
        return $this->input;
    }
    public function setInput(array $input = array())
    {
        $this->input = $input;
    }
    public function getAction()
    {
        return $this->action;
    }
    public function setAction($action)
    {
        $this->action = $action;
    }
     public function getId()
    {
        return $this->id;
    }
    public function setID($id)
    {
        $this->id = $id;
    }
     public function getClass()
    {
        return $this->class;
    }
    public function setClass($class)
    {
        $this->class = $class;
    }
    public function SearchForm($href = false)
    {
        if($href)
        {
            $simpleHtml = new SimpleHTMLDOM;
            $html = $simpleHtml->file_get_html($href);
            $forms = $html->find('form');
            foreach ($forms as $form)
            {
                echo $form->action.'<br>';
            }
        }
    }
}
?>
