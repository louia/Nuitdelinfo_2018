<?php
/**
 * Classe de gestion d'une page Web permettant de s'affranchir de l'écriture de la structure de base du code HTML
 */
class WebPage {
    /**
     * Texte compris entre <head> et </head>
     * @var string
     */
    private $head  = null ;
    /**
     * Texte compris entre <title> et </title>
     * @var string
     */
    private $title = null ;
    /**
     * Texte compris entre <body> et </body>
     * @var string
     */
    private $body  = null ;

    /**
     * Couleur background top chrome mobile 
     * ADD by louis 
     * @var string
     */
    private $color  = null ;

     /**
     * Couleur background top chrome mobile 
     * ADD by louis 
     * @var string
     */
    private $icon  = null ;

    /**
     * Constructeur
     * @param string $title Titre de la page
     */
    public function __construct(string $title=null, string $color=null, string $icon=null) {
        if (!is_null($title)) {
            $this->setTitle($title) ;
        }
        if(!is_null($color)){
            $this->setColor($color);
        }
        if(!is_null($icon)){
            $this->setIcon($icon);
        }
    }

    /**
     * Protéger les caractères spéciaux pouvant dégrader la page Web
     * @param string $string La chaîne à protéger
     *
     * @return string La chaîne protégée
     */
    public function escapeString(string $string) {
        return htmlentities($string, ENT_QUOTES|ENT_HTML5, "utf-8") ;
    }

    /**
     * Affecter le titre de la page
     * @param string $title Le titre
     */
    public function setTitle(string $title) {
        $this->title = $title ;
    }
        /**
     * Affecter la couleur de la page
     * @param string $color La couleur
     */
    public function setColor(string $color) {
        $this->color = $color ;
    }

    /**
     * Affecter la couleur de la page
     * @param string $color La couleur
     */
    public function setIcon(string $icon) {
        $this->icon = $icon ;
    }

    /**
     * Ajouter un contenu dans head
     * @param string $content Le contenu à ajouter
     *
     * @return void
     */
    public function appendToHead(string $content) {
        $this->head .= $content ;
    }

    /**
     * Ajouter un contenu CSS dans head
     * @param string $css Le contenu CSS à ajouter
     *
     * @return void
     */
    public function appendCss(string $css) {
        $this->appendToHead(<<<HTML
    <style type='text/css'>
    {$css}
    </style>

HTML
) ;
    }

    /**
     * Ajouter l'URL d'un script CSS dans head
     * @param string $url L'URL du script CSS
     *
     * @return void
     */
    public function appendCssUrl(string $url) {
        $this->appendToHead(<<<HTML
    <link rel="stylesheet" type="text/css" href="{$url}">

HTML
) ;
    }

    public function appendJs(string $js) {
        $this->appendToHead(<<<HTML
    <script type='text/javascript'>
    {$js}
    </script>

HTML
) ;
    }

    /**
     * Ajouter l'URL d'un script JavaScript dans head
     * @param string $url L'URL du script JavaScript
     *
     * @return void
     */
    public function appendJsUrl(string $url) {
        $this->appendToHead(<<<HTML
        <script src="{$url}"></script>

HTML
) ;
    }

    /**
     * Ajouter un contenu dans body
     * @param string $content Le contenu à ajouter
     *
     * @return void
     */
    public function appendContent(string $content) {
        $this->body .= $content ;
    }

    /**
     * Produire la page Web complète
     * @throws Exception si title n'est pas défini
     *
     * @return string
     */
    public function toHTML() {
        if (is_null($this->title)) {
            throw new Exception(__CLASS__ . ": title not set") ;
        }

        $lastmod = strftime("Dernière modification de cette page le %d/%m/%Y à %Hh%M", getlastmod()) ;
        return <<<HTML
<!doctype html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="{$this->color}">
        <link rel="icon" type="image/png" href="{$this->icon}" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>{$this->title}</title>
    {$this->head}
    </head>
    <body>
        <div id='page'>
    
    {$this->body}



        </div>
    </body>
</html>
HTML;
    }



}
