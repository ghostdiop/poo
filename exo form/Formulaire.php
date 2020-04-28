<?php
class Personne
{
    private $matricule;
    private $nom;
    private $prenom;
    private $adresse;
    private $service;
    private $sexe;
    private $fonction;
  
    public function __construct($matricule = '',$nom = '',$prenom = '', $adresse = '', $service = '',$fonction = '', $sexe = '')
    {
        $this->matricule     = $matricule;
        $this->nom     = $nom;
        $this->prenom     = $prenom;
        $this->adresse = $adresse;
        $this->service     = $service;
        $this->sexe    = $sexe;
        $this->fonction    = $fonction;
    }
 
     public function toHTML()
     {
         $html = sprintf('<strong>Matricule :</strong><em>%s</em><br />', 
                    htmlspecialchars($this->matricule))
              . sprintf('<strong>Nom :</strong><em>%s</em><br />', 
                 htmlspecialchars($this->nom))
              .  sprintf('<strong>Prenom :</strong><em>%s</em><br />', 
                 htmlspecialchars($this->prenom))
              . sprintf('<strong>Adresse :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->adresse))
              . sprintf('<strong>Service :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->service))
              . sprintf('<strong>Sexe :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->sexe))
              . sprintf('<strong>Fonction :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->fonction));

         return $html;
      }
 
     public function formulaire()
     {
         $html = sprintf('<label>Matricule:<input type="text" name="matricule" value="%s"/></label><br />', 
                 htmlspecialchars($this->matricule))
               . sprintf('<label>Nom:<input type="text" name="nom" value="%s"/></label><br />', 
                 htmlspecialchars($this->nom))
               . sprintf('<label>Prenom:<input type="text" name="prenom" value="%s"/></label><br />', 
                 htmlspecialchars($this->prenom))
               . sprintf('<label>Adresse:<textarea name="adresse" rows="8" cols="45">%s</textarea></label><br />', 
                   htmlspecialchars($this->adresse))
               . sprintf('<label>Service:<input type="text" name="service" value="%s"/></label><br />', 
                   htmlspecialchars($this->service))
               . sprintf('<input type="radio" name="sexe" value="M" id="masculin" %s/> <label for="masculin">M</label><br />',
                   ($this->sexe === 'M' ? 'checked="checked"' : ''))
              .  sprintf('<input type="radio" name="sexe" value="F" id="feminin" %s/> <label for="feminin">F</label><br />',
                  ($this->sexe === 'F' ? 'checked="checked"' : ''))
              .  sprintf('<label>Fonction:<input type="text" name="fonction" value="%s"/></label><br />',
                   htmlspecialchars($this->fonction));
              
        return $html;
     }
 
     public function extraire_form()
     {        
         foreach($_REQUEST as $key => $value)
         {
            $this->{$key} = $value;
         }
     }
     
     public function valider()
     {
         $this->extraire_form();
         
         foreach(get_object_vars($this) as $key => $value)
         {
             switch($key)
             {
                 case 'matricule':
                 case 'nom':
                 case 'prenom':   
                 case 'adresse':
                 case 'service':
                 case 'fonction':
                     if(empty($value))
                     {
                         return false;
                     }
                     break;
                     break;
                     break;
                     break;
                     break;
                     break;
                 case 'sexe':
                     if($value !== 'M' && $value !== 'F')
                     {
                         return false;
                     }
                     break;
             }
         }
         
         return true;
    } 
}

?>