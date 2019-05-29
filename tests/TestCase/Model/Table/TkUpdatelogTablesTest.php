<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TkUpdatelogTables;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TkUpdatelogTables Test Case
 */
class TkUpdatelogTablesTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TkUpdatelogTables
     */
    public $TkUpdatelogTables;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TkUpdatelogs') ? [] : ['className' => TkUpdatelogTables::class];
        $this->TkUpdatelogTables = TableRegistry::getTableLocator()->get('TkUpdatelogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TkUpdatelogTables);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
