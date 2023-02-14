<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeleCategorie extends Model
{

    protected $table = 'categorie';
    protected $allowedFields = ['NOCATEGORIE ', 'LIBELLE'];
    protected $primaryKey = 'NOCATEGORIE';

    public function retourner_categories($pNoCategorie = false)
    {
        if ($pNoCategorie === false) {
            return $this->orderBy('LIBELLE', 'asc')
            ->findAll();
        }

        return $this->where(['NOCATEGORIE' => $pNoCategorie])
        ->first();
    }

    public function inserer_une_categorie($pDonneesAInserer)
    {
        return $this->insert($pDonneesAInserer);
    }
}
