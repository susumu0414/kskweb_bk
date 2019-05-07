<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TkUpdatelogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TkUpdatelogsTable Test Case
 */
class TkUpdatelogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TkUpdatelogsTable
     */
    public $TkUpdatelogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TkUpdatelogs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TkUpdatelogs') ? [] : ['className' => TkUpdatelogsTable::class];
        $this->TkUpdatelogs = TableRegistry::getTableLocator()->get('TkUpdatelogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TkUpdatelogs);

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
