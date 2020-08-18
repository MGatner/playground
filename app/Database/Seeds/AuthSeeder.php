<?php namespace App\Database\Seeds;

use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Authorization\PermissionModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class AuthSeeder extends \CodeIgniter\Database\Seeder
{
	public function run()
	{
		// Initialize the classes
		$groups        = new GroupModel();
		$permissions   = new PermissionModel();
		$users         = new UserModel();
		$authorization = service('authorization');

		/*** GROUPS ***/
		// Test for and create the necessary groups

		$rows = [
			['name' => 'Administrators', 'description' => 'Users with full access to the application'],
			['name' => 'Editors',        'description' => 'Users who can access the CMS to update content'],
		];
		foreach ($rows as $row)
		{
			$group = $groups->where('name', $row['name'])->first();
			
			if (empty($group))
			{
				$groups->insert($row);
			}
		}

		/*** PERMISSIONS ***/
		// Test for and create the necessary permissions

		$rows = [
			['name' => 'manageAny',     'description' => 'General access to the admin dashboard'],
			['name' => 'manageContent', 'description' => 'Access to the CMS'],
		];
		foreach ($rows as $row)
		{
			$permission = $permissions->where('name', $row['name'])->first();
			
			if (empty($permission))
			{
				$permissions->insert($row);
			}
		}

		/*** GROUPS_PERMISSIONS ***/
		// Authorize groups for access to various sections

		// General dashboard access
		$names = ['Administrators', 'Editors'];
		foreach ($names as $name)
		{
			$authorization->removePermissionFromGroup('manageAny', $name);
			$authorization->addPermissionToGroup('manageAny', $name);
		}

		// CMS access
		$names = ['Administrators', 'Editors'];
		foreach ($names as $name)
		{
			$authorization->removePermissionFromGroup('manageContent', $name);
			$authorization->addPermissionToGroup('manageContent', $name);
		}		

		/*** USERS ***/
		$rows = [
			[
				'email'     => 'admin@igniter.be',
				'username'  => 'admin',
				'password'  => 'password123',
				'active'    => 1,
			],
			[
				'email'     => 'editor@igniter.be',
				'username'  => 'editor',
				'password'  => 'password456',
				'active'    => 1,
			],
			[
				'email'     => 'user@igniter.be',
				'username'  => 'user',
				'password'  => 'password789',
				'active'    => 1,
			],
			[
				'email'     => 'inactive@igniter.be',
				'username'  => 'inactive',
				'password'  => 'password0AB',
				'active'    => 0,
			],
        ];

		foreach ($rows as $row)
		{
			$user = $users->where('email', $row['email'])->first();

			if (empty($user))
			{
				// Use the User entity to handle correct password hashing
				$users->insert(new User($row));
			}
		}

		/*** GROUPS_USERS ***/
		$authorization->removeUserFromGroup(1, 1);
		$authorization->addUserToGroup(1, 1);

		$authorization->removeUserFromGroup(2, 2);
		$authorization->addUserToGroup(2, 2);
	}
}