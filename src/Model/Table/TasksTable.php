<?php
namespace App\Model\Table;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 */
class TasksTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('tasks');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Projects', [
			'foreignKey' => 'project_id',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->allowEmpty('name')
			->add('finished', 'valid', ['rule' => 'datetime'])
			->allowEmpty('finished')
			->add('project_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('project_id');

		return $validator;
	}

    public function findActive(Query $query) {
        $alias = $this->alias();
        return $query->where(function(QueryExpression $exp) use ($alias) {
           return $exp->isNull($alias . '.finished');
        });
    }

    public function findClosed(Query $query) {
        // TODO Rewrite as a negation of find('active')
        $alias = $this->alias();
        return $query->where(function(QueryExpression $exp) use ($alias) {
            return $exp->isNotNull($alias . '.finished');
        });
    }

}
