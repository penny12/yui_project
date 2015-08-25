<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 */
class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
	return $validator
	    ->notEmpty('username', 'A username is required')
	    ->notEmpty('password', 'A password is required')
	    ->add('inList', [
			     'rule'=>['inList', ['admin', 'author']],
			     'message'=>'Please enter a valid role'
			     ]);
    }
}