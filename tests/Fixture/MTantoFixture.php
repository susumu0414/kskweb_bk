<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MTantoFixture
 *
 */
class MTantoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'm_tanto';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'tan_cd' => ['type' => 'string', 'fixed' => true, 'length' => 6, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        'tan_nm' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'user_pass' => ['type' => 'string', 'length' => 16, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'auth_kbn' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'del_flg' => ['type' => 'smallinteger', 'length' => 5, 'default' => '0', 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'cre_id' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'cre_time' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'upd_id' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'upd_time' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['tan_cd'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'tan_cd' => '72f6de0d-2267-41a8-b7ef-344ab8ad2571',
                'tan_nm' => 'Lorem ipsum dolor sit amet',
                'user_pass' => 'Lorem ipsum do',
                'auth_kbn' => 1,
                'del_flg' => 1,
                'cre_id' => 'Lorem ipsum dolor sit amet',
                'cre_time' => 1552985291,
                'upd_id' => 'Lorem ipsum dolor sit amet',
                'upd_time' => 1552985291
            ],
        ];
        parent::init();
    }
}
