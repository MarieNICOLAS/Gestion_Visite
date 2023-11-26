<?php
    function formulaire($userRole)
    {
        $form = '';
        $formContents = [
            'nom' => 'Nom',
            'prenom' => 'Prénom',
            'adresse' => 'Adresse',
            'telephone' => 'Téléphone',
            'login' => 'Email',
            'motDePasse' => 'Mot de passe'
        ];
        
        foreach ($formContents as $nomChamp => $label) {
            $form .= "<label for=\"$nomChamp\">$label : </label>";
            $form .= "<input type=\"text\" name=\"$nomChamp\" id=\"$nomChamp\"><br>";
        }
    
        if ($userRole === 'visiteur') {
            $formContentsSpecifiques = [
                'codePostal' => 'Code Postal',
                'ville' => 'Ville',
                'dateEmbauche' => 'Date d embauche'
            ];
            foreach ($formContentsSpecifiques as $nomChamp => $label) {
                $form .= "<label for=\"$nomChamp\">$label : </label>";
                $form .= "<input type=\"text\" name=\"$nomChamp\" id=\"$nomChamp\"><br>";
            }
        } elseif ($userRole === 'medecin') {
            $formContentsSpecifiques = [
                'specialiteComplementaire' => 'Spécialité Complémentaire',
                'departement' => 'Département'
            ];
            foreach ($formContentsSpecifiques as $nomChamp => $label) {
                $form .= "<label for=\"$nomChamp\">$label : </label>";
                $form .= "<input type=\"text\" name=\"$nomChamp\" id=\"$nomChamp\"><br>";
            }
        }
    
        return $form;
    }
    

    
?>