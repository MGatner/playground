<?php namespace App\Entities;

use CodeIgniter\Entity;

class BaseEntity extends Entity
{
	use \Tatter\Relations\Traits\EntityTrait;

	protected $primaryKey = 'id';
}
