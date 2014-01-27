<?php
class ResourceController extends Controller
{
    public $layout = '//layouts/column1';
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('HereGoes'),
                'users' => array('*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
     public function actionHereGoes()
	{
            $href = 'http://okru.ru';
            //$href = 'http://zymios-spb-test-2.new-tone.ru';
            if(link::CheckHref($href))
            {
                $resourсe = new Resource;
                $resourсe->setHref($href);
                $hrefs = $resourсe->getAllHref();
                if($hrefs !== false)
                {
                    foreach ($hrefs as $href)
                    {
                        $page = new Page($href);
                        $forms = $page->getForms();
                    }
                }
            }
            MyDebug::pre($forms);
            die;
            $this->render('index');
	}
}
?>