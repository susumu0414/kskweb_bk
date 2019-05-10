<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MkPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MkPagesTable Test Case
 */
class MkPagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MkPagesTable
     */
    public $MkPages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MkPages',
        'app.Pages',
        'app.Categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MkPages') ? [] : ['className' => MkPagesTable::class];
        $this->MkPages = TableRegistry::getTableLocator()->get('MkPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MkPages);

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
