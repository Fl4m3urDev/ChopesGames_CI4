<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeleNouvelle extends Model
{
    protected $table = 'nouvelle';
    protected $allowedFields = ['NONOUVELLE', 'OBJET', 'TITRE', 'MESSAGE'];
    protected $primaryKey = 'NONOUVELLE';

    public function retourner_lettre()
    {
        return $this->findAll();
    }

    public function retourner_objet($objet = false)
    {
        return $this->where(['OBJET' => $objet])
        ->first();
    }

    public function retourner_titre($titre = false)
    {
        return $this->where(['TITRE' => $titre])
        ->first();
    }

    public function retourner_message($message = false)
    {
        return $this->where(['MESSAGE' => $message])
        ->first();
    }
}