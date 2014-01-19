<?php
class Form
{
    private $href = '';
    public function getHref()
    {
        return $this->href;
    }
    public function setHref($href)
    {
        $this->href = $href;
    }
    public function PickUp()
    {
        
    }
//    public function SearchForm($href = false)
//    {
//        if($href)
//        {
//            $simpleHtml = new SimpleHTMLDOM;
//            $html = $simpleHtml->file_get_html($href);
//            $forms = $html->find('form');
//            foreach ($forms as $form)
//            {
//                echo $form->action.'<br>';
//            }
//        }
//    }
}
?>
