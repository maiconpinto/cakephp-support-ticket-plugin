<?php
namespace SupportTicket\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @method \SupportTicket\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \SupportTicket\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \SupportTicket\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \SupportTicket\Model\Entity\Ticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \SupportTicket\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \SupportTicket\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \SupportTicket\Model\Entity\Ticket findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TicketsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tickets');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('priority')
            ->requirePresence('priority', 'create')
            ->notEmpty('priority');

        $validator
            ->date('deadline')
            ->allowEmpty('deadline');

        $validator
            ->decimal('cost')
            ->allowEmpty('cost');

        return $validator;
    }
    
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if (!is_array($data['deadline'])) {
            list($d, $m, $y) = explode('/', $data['deadline']);
            $data['deadline'] = ['year' => $y, 'month' => $m, 'day' => $d];
        }
    }
}
