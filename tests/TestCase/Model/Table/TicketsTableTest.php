<?php
namespace SupportTicket\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use SupportTicket\Model\Table\TicketsTable;

/**
 * SupportTicket\Model\Table\TicketsTable Test Case
 */
class TicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \SupportTicket\Model\Table\TicketsTable
     */
    public $Tickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.support_ticket.tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tickets') ? [] : ['className' => 'SupportTicket\Model\Table\TicketsTable'];
        $this->Tickets = TableRegistry::get('Tickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tickets);

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
