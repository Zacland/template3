<?php

namespace sdFW;

class Template extends \TemplatePHPBB {

    /**
     * Constructeur
     * @param string $psTemplatePath
     * @param string $psCachePath
     */
    public function __construct($psTemplatePath = 'template', $psCachePath = '../cache/template'){

        $sLang = NULL;

        // Création automatique du répertoire de cache s'il n'existe pas
        if(!is_dir($psCachePath)){
            mkdir($psCachePath, 0755, true);
        }

        parent::__construct($psTemplatePath, $psCachePath, $sLang, true);

        $aTextsI18n = i18n::getTexts();
        $this->set_language_var($aTextsI18n);	// Le strict mode de PHP sur certains serveurs oblige à stocker de résultat de "i18n::getTexts();" dans une variable intermédiaire, because le paramètre attendu est une variable passée par référence
    }


    /**
     * Affiche le template
     * @param string $psHandle
     * @return bool
     */
    public function pparse($psHandle){

        return parent::display($psHandle);
    }


    /**
     * Retourne le contenu du template
     * @param string $psHandle
     * @return bool|string
     */
    public function pparse_in_var($psHandle){

        return parent::assign_display($psHandle);
    }


    /**
     * Ajoute un nouveau bloc
     * @param string $sBlockname
     * @param array  $aVars
     * @return bool
     */
    public function assign_block_vars($sBlockname, $aVars = array()){

        return parent::assign_block_vars($sBlockname, $aVars);
    }

    /**
     * @param $sBlockname
     * @param $aVars
     * @return bool
     */
    public function append_block_vars($sBlockname, $aVars){

        return parent::alter_block_array($sBlockname, $aVars, true, 'change');
    }

    /* fin de classe */
}