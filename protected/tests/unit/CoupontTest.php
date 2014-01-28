<?php
class CoupontTest extends CDbTestCase
{
        public $fixtures = array(
                'coupont' => 'coupont',
        );

        public static function setUpBeforeClass()
        {
                if(!extension_loaded('pdo') || !extension_loaded('pdo_sqlite'))
                        markTestSkipped('PDO and SQLite extensions are required.');

                $config=array(
                        'basePath'=>dirname(__FILE__),
                        'components'=>array(
                                'db'=>array(
                                        'class'=>'system.db.CDbConnection',
                                        'connectionString'=>'sqlite::memory:',
                                ),
                                'fixture'=>array(
                                        'class'=>'system.test.CDbFixtureManager',
                                ),
                        ),
                );

                Yii::app()->configure($config);

                $c = Yii::app()->getDb()->createCommand();
                $c->createTable('coupon', array(
                        'id' => 'varchar(255) PRIMARY KEY NOT NULL',
                        'description' => 'text',
                ));
        }

        protected function setUp()
        {
                parent::setUp();
                $_GET['existing_code'] = 'discount_for_me';
                $_GET['non_existing_code'] = 'non_existing';
        }

        public static function tearDownAfterClass()
        {
                if(Yii::app()->getDb())
                        Yii::app()->getDb()->active=false;
        }

        public function testCodeAcceptance()
        {
                $cm = new CoupontManager();
                $this->assertTrue($cm->registerCoupon($_GET['existing_code']));
                $this->assertFalse((boolean)Coupon::model()->findByPk($_GET['existing_code']));
        }

        public function testCodeNotFound()
        {
                $countBefore = Coupont::model()->count();

                $cm = new CoupontManager();
                $this->assertFalse($cm->registerCoupon($_GET['non_existing_code']));

                $countAfter = Coupont::model()->count();
                $this->assertEquals($countBefore, $countAfter);
        }
}