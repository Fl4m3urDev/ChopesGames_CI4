<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeleAbonne extends Model
{
    protected $table = 'abonne';
    protected $allowedFields = ['NOABONNE','email'];
    protected $primaryKey = 'NOABONNE';

    public function verification_mail($email)
    {
        if ($this->where(['EMAIL' => $email])) {
            return null;
        } else {
            $this->insert($email);
        }
    }
    public function inserer_mail($email)
    {
        return $this->set('email', $email)
            ->insert();
    }

    public function recuperer_mail() {
        return $this->findColumn('email');
    }
}