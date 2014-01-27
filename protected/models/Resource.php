<?php
class Resource
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
    public function getAllHref()
    {
        $result = false;
        $result[] = $this->href;
        //поиск всех страниц ресурса
        return $result;
    }
}
?>
