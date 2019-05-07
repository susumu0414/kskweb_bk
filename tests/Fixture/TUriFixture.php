<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TUriFixture
 *
 */
class TUriFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_uri';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'den_no' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'den_kbn' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'uri_kbn' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'ymd' => ['type' => 'string', 'fixed' => true, 'length' => 8, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'tk_cd' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tk_eda_cd' => ['type' => 'decimal', 'length' => 6, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'tokusaki_nm' => ['type' => 'string', 'length' => 34, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nonyusaki_nm' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tan_cd' => ['type' => 'string', 'fixed' => true, 'length' => 6, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'delive_bin_kbn' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'unchin' => ['type' => 'decimal', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'uri_kingaku' => ['type' => 'decimal', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'zeigaku' => ['type' => 'decimal', 'length' => 8, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'total_gaku' => ['type' => 'decimal', 'length' => 12, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 4, 'unsigned' => null],
        'kazei_kbn' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'xxbiko' => ['type' => 'string', 'length' => 500, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'yamaha_kanrensaki' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'yamaha_toku_cd' => ['type' => 'string', 'length' => 5, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'yamaha_nonyusaki_cd' => ['type' => 'string', 'length' => 5, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'cyokuso' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'unchin_shiharai_kbn' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'work_no' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'seikyu_flg' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'getsuji_flg' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'sys_tmd' => ['type' => 'string', 'fixed' => true, 'length' => 8, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'syusei_ymd' => ['type' => 'string', 'fixed' => true, 'length' => 8, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'arari' => ['type' => 'decimal', 'length' => 12, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 4, 'unsigned' => null],
        'nohinsyo_hakko' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'unchin_kotei' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'biko' => ['type' => 'string', 'length' => 500, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'biko2' => ['type' => 'string', 'length' => 500, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'biko3' => ['type' => 'string', 'length' => 500, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'jyucyu_no' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'del_flg' => ['type' => 'smallinteger', 'length' => 5, 'default' => '0', 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'cre_id' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'cre_time' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'upd_id' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'upd_time' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'mitsumori_flg' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'web_hacyu_kbn' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'daibiki_kbn' => ['type' => 'smallinteger', 'length' => 5, 'default' => '0', 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'addr_hide_flg' => ['type' => 'smallinteger', 'length' => 5, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'delive_cd' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'syukka_no' => ['type' => 'string', 'length' => 24, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'syukka_tan_cd' => ['type' => 'string', 'fixed' => true, 'length' => 6, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'henpin_kind' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'biko4' => ['type' => 'string', 'length' => 500, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'biko5' => ['type' => 'string', 'length' => 500, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'idx_t_uri_3' => ['type' => 'index', 'columns' => ['ymd'], 'length' => []],
            'idx_t_uri_1' => ['type' => 'index', 'columns' => ['tk_cd', 'tk_eda_cd'], 'length' => []],
            'idx_t_uri_2' => ['type' => 'index', 'columns' => ['work_no'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['den_no'], 'length' => []],
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
                'den_no' => 1,
                'den_kbn' => 'Lo',
                'uri_kbn' => 1,
                'ymd' => 'Lorem ',
                'tk_cd' => 'Lorem ip',
                'tk_eda_cd' => 1.5,
                'tokusaki_nm' => 'Lorem ipsum dolor sit amet',
                'nonyusaki_nm' => 'Lorem ipsum dolor sit amet',
                'tan_cd' => 'Lore',
                'delive_bin_kbn' => 1,
                'unchin' => 1.5,
                'uri_kingaku' => 1.5,
                'zeigaku' => 1.5,
                'total_gaku' => 1.5,
                'kazei_kbn' => 'L',
                'xxbiko' => 'Lorem ipsum dolor sit amet',
                'yamaha_kanrensaki' => 'L',
                'yamaha_toku_cd' => 'Lor',
                'yamaha_nonyusaki_cd' => 'Lor',
                'cyokuso' => 1,
                'unchin_shiharai_kbn' => 1,
                'work_no' => 1,
                'seikyu_flg' => 1,
                'getsuji_flg' => 1,
                'sys_tmd' => 'Lorem ',
                'syusei_ymd' => 'Lorem ',
                'arari' => 1.5,
                'nohinsyo_hakko' => 1,
                'unchin_kotei' => 1,
                'biko' => 'Lorem ipsum dolor sit amet',
                'biko2' => 'Lorem ipsum dolor sit amet',
                'biko3' => 'Lorem ipsum dolor sit amet',
                'jyucyu_no' => 1,
                'del_flg' => 1,
                'cre_id' => 'Lorem ipsum dolor sit amet',
                'cre_time' => 1557215059,
                'upd_id' => 'Lorem ipsum dolor sit amet',
                'upd_time' => 1557215059,
                'mitsumori_flg' => 1,
                'web_hacyu_kbn' => 1,
                'daibiki_kbn' => 1,
                'addr_hide_flg' => 1,
                'delive_cd' => 1,
                'syukka_no' => 'Lorem ipsum dolor sit ',
                'syukka_tan_cd' => 'Lore',
                'henpin_kind' => 1,
                'biko4' => 'Lorem ipsum dolor sit amet',
                'biko5' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
