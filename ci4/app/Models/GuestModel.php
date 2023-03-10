<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table = 'searceo_guestlist';
	
	protected $allowedFields = ['name', 'email', 'comment'];
	
	public function getGuest($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['email' => $slug])->first();
    }
}
