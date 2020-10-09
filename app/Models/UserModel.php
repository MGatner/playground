<?php namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
	// Permits
	protected $mode        = 00640;
	protected $pivotKey    = 'user_id';
	protected $groupsPivot = 'auth_groups_users';

	/**
	 * Returns groups for a single user.
	 *
	 * @see https://github.com/lonnieezell/myth-auth/blob/develop/src/Authorization/GroupModel.php
	 *
	 * @param mixed $userId = null
	 *
	 * @return array  Array of objects (usually Group Entities)
	 */
	public function groups($userId = null): array
	{
		return $this->builder()
			->select('auth_groups.id')
			->join($this->groupsPivot, "{$this->groupsPivot}.{$this->pivotKey} = {$this->table}.{$this->primaryKey}", 'left')
			->join('auth_groups', "{$this->groupsPivot}.group_id = auth_groups.id", 'left')
			->where("{$this->groupsPivot}.{$this->pivotKey}", $userId)
			->get()->getResultObject();
	}
}
