<?php

namespace App\Controllers;

use App\Models\ModeleClient;
use App\Models\ModeleCategorie;
use App\Models\ModeleMarque;
use App\Models\Modele_commande;
use App\Models\ModeleLigne;

helper(['url', 'assets', 'form']);

class AdministrateurEmploye extends BaseController
{
    public function afficher_les_clients()
    {
        $modelCli = new ModeleClient();
        $data['clients'] = $modelCli->retourner_clients();
        $modelCat = new ModeleCategorie();
        $data['categories'] = $modelCat->retourner_categories();
        return view('templates/header', $data) .
            view('AdministrateurEmploye/afficher_les_clients') .
            view('templates/footer');
    }

    public function historique_des_commandes($noclient = null)
    {
        // if ($noclient == null) {
        //     return redirect()->to('AdministrateurEmploye/afficher_les_clients');
        // }
        $modelCli = new ModeleClient();
        $data['client'] = $modelCli->retourner_client_par_no($noclient);
        $modelComm = new Modele_commande();
        $data['commandes'] = $modelComm->retourner_commandes_client($noclient);
        $modelCat = new ModeleCategorie();
        $data['categories'] = $modelCat->retourner_categories();
        return view('templates/header', $data) .
            view('AdministrateurEmploye/historique_des_commandes') .
            view('templates/footer');
    }

    public function details_commande($noCommande = false)
    {
        if (empty($noCommande)) {
            return redirect()->to('AdministrateurEmploye/historique_des_commandes');
        }
        $modelComm = new Modele_commande();
        $data['commande'] = $modelComm->retourner_commande($noCommande);
        $modelLig = new ModeleLigne();
        $data['lignes'] = $modelLig->retourner_lignes($noCommande);
        $modelCat = new ModeleCategorie();
        $data['categories'] = $modelCat->retourner_categories();
        return view('templates/header', $data) .
            view('AdministrateurEmploye/details_commande') .
            view('templates/footer');
    }

    public function commande_non_traitees()
    {
        $modelCat = new ModeleCategorie();
        $data['categories'] = $modelCat->retourner_categories();
        $modelComm = new Modele_commande();
        $data['commande'] = $modelComm->retourner_commande_non_traitees();
        return view('templates/header', $data) .
            view('AdministrateurEmploye/commande_non_traitees') .
            view('templates/footer');
    }

    public function commande_traitees($noCommande)
    {
        helper('date');
        $modelLigne = new ModeleLigne();
        $modelComm = new Modele_commande();
        $modelClient = new ModeleClient();
        $modelComm->update($noCommande,array('DATETRAITEMENT' => @date('Y-m-d H:i:s')));
        $data['produits'] = $modelLigne->retourner_lignes($noCommande);
        $data['commande'] = $modelComm->retourner_commande($noCommande);
        $data['client'] = $modelClient->retourner_client_par_no($data['commande']['NOCLIENT']);
        $data['titre'] = 'Votre commande vient d\'être expédiée';
        $message = view('AdministrateurEmploye/commandes_traitees',$data);
        $email = \Config\Services::email();
        $email->setFrom('chopesgames.110@gmail.com', 'ChopesGames');
        $email->setTo($data['client']['EMAIL']);
        $email->setSubject('Facture ChopesGame');
        $email->setMessage($message);
        $email->send();
        return redirect()->to('Visiteur/accueil');
    }
}