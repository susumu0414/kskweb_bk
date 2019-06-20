<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MtbOrderStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MtbOrderStatusTable Test Case
 */
class MtbOrderStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MtbOrderStatusTable
     */
    public $MtbOrderStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MtbOrderStatus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MtbOrderStatus') ? [] : ['className' => MtbOrderStatusTable::class];
        $this->MtbOrderStatus = TableRegistry::getTableLocator()->get('MtbOrderStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MtbOrderStatus);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
