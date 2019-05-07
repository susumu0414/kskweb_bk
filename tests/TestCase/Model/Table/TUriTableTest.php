<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TUriTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TUriTable Test Case
 */
class TUriTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TUriTable
     */
    public $TUri;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TUri',
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
        $config = TableRegistry::getTableLocator()->exists('TUri') ? [] : ['className' => TUriTable::class];
        $this->TUri = TableRegistry::getTableLocator()->get('TUri', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TUri);

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
