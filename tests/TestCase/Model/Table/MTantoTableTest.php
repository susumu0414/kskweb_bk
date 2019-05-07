<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MTantoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MTantoTable Test Case
 */
class MTantoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MTantoTable
     */
    public $MTanto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MTanto',
        'app.Cres',
        'app.Upds'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MTanto') ? [] : ['className' => MTantoTable::class];
        $this->MTanto = TableRegistry::getTableLocator()->get('MTanto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MTanto);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
