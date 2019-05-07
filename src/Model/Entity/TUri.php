<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TUri Entity
 *
 * @property int $den_no
 * @property string|null $den_kbn
 * @property int|null $uri_kbn
 * @property string|null $ymd
 * @property string|null $tk_cd
 * @property float|null $tk_eda_cd
 * @property string|null $tokusaki_nm
 * @property string|null $nonyusaki_nm
 * @property string|null $tan_cd
 * @property int|null $delive_bin_kbn
 * @property float|null $unchin
 * @property float|null $uri_kingaku
 * @property float|null $zeigaku
 * @property float|null $total_gaku
 * @property string|null $kazei_kbn
 * @property string|null $xxbiko
 * @property string|null $yamaha_kanrensaki
 * @property string|null $yamaha_toku_cd
 * @property string|null $yamaha_nonyusaki_cd
 * @property int|null $cyokuso
 * @property int|null $unchin_shiharai_kbn
 * @property int|null $work_no
 * @property int|null $seikyu_flg
 * @property int|null $getsuji_flg
 * @property string|null $sys_tmd
 * @property string|null $syusei_ymd
 * @property float|null $arari
 * @property int|null $nohinsyo_hakko
 * @property int|null $unchin_kotei
 * @property string|null $biko
 * @property string|null $biko2
 * @property string|null $biko3
 * @property int|null $jyucyu_no
 * @property int $del_flg
 * @property string|null $cre_id
 * @property \Cake\I18n\FrozenTime|null $cre_time
 * @property string|null $upd_id
 * @property \Cake\I18n\FrozenTime|null $upd_time
 * @property int|null $mitsumori_flg
 * @property int|null $web_hacyu_kbn
 * @property int $daibiki_kbn
 * @property int|null $addr_hide_flg
 * @property int|null $delive_cd
 * @property string|null $syukka_no
 * @property string|null $syukka_tan_cd
 * @property int|null $henpin_kind
 * @property string|null $biko4
 * @property string|null $biko5
 *
 * @property \App\Model\Entity\Cre $cre
 * @property \App\Model\Entity\Upd $upd
 */
class TUri extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'den_kbn' => true,
        'uri_kbn' => true,
        'ymd' => true,
        'tk_cd' => true,
        'tk_eda_cd' => true,
        'tokusaki_nm' => true,
        'nonyusaki_nm' => true,
        'tan_cd' => true,
        'delive_bin_kbn' => true,
        'unchin' => true,
        'uri_kingaku' => true,
        'zeigaku' => true,
        'total_gaku' => true,
        'kazei_kbn' => true,
        'xxbiko' => true,
        'yamaha_kanrensaki' => true,
        'yamaha_toku_cd' => true,
        'yamaha_nonyusaki_cd' => true,
        'cyokuso' => true,
        'unchin_shiharai_kbn' => true,
        'work_no' => true,
        'seikyu_flg' => true,
        'getsuji_flg' => true,
        'sys_tmd' => true,
        'syusei_ymd' => true,
        'arari' => true,
        'nohinsyo_hakko' => true,
        'unchin_kotei' => true,
        'biko' => true,
        'biko2' => true,
        'biko3' => true,
        'jyucyu_no' => true,
        'del_flg' => true,
        'cre_id' => true,
        'cre_time' => true,
        'upd_id' => true,
        'upd_time' => true,
        'mitsumori_flg' => true,
        'web_hacyu_kbn' => true,
        'daibiki_kbn' => true,
        'addr_hide_flg' => true,
        'delive_cd' => true,
        'syukka_no' => true,
        'syukka_tan_cd' => true,
        'henpin_kind' => true,
        'biko4' => true,
        'biko5' => true,
        'cre' => true,
        'upd' => true
    ];
}
