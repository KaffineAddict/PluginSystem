<?php
/**
 * PluginSystem Database Model Definition
 *
 * @author  Blake Sutton <sutton.blake@gmail.com>
 * @version	1.0
 * @since   1.0
 */
namespace PluginSystem\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use PluginSystem\Model\Entity\PluginSystemPlugin;

/**
 * PluginSystemPlugins Model
 *
 */
class PluginSystemPluginsTable extends Table
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

        $this->table('plugin_system_plugins');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('uri', 'create')
            ->notEmpty('uri');

        $validator
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        $validator
            ->requirePresence('version', 'create')
            ->notEmpty('version');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
