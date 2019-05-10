<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MkPage Entity
 *
 * @property int $id
 * @property string $page_id
 * @property int $category_id
 * @property string|null $page_nm
 * @property string|null $url
 * @property string $file_nm
 * @property int|null $sort
 * @property string|null $del_flg
 *
 * @property \App\Model\Entity\Page $page
 * @property \App\Model\Entity\Category $category
 */
class MkPage extends Entity
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
        'page_id' => true,
        'category_id' => true,
        'page_nm' => true,
        'url' => true,
        'file_nm' => true,
        'sort' => true,
        'del_flg' => true,
        'page' => true,
        'category' => true
    ];
}
