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
            flush();
            $resourсe = new Resource;
            //$resourсe->setHref('http://okru.ru');
            $resourсe->setHref('http://zymios-spb-test-2.new-tone.ru');
            if($resourсe->CheckHref())
            {
                $hrefs = $resourсe->getAllHref();
                if($hrefs !== false)
                {
                    foreach ($hrefs as $href)
                    {
                        $form = new Form;
                        $form->setHref($href);
                        $forms = $form->PickUp();
                    }
                }
            }
            MyDebug::pre($forms);
            die;
            $this->render('index');
	}
}
?>