<?php
namespace App\CustomClass;

class PanelText
{
    private $title; 
    private $normal;
    private $link;

    public function __construct( $title, $normal, $link )
    {
        $this->title = $title;
        $this->normal = $normal;
        $this->link = $link;
    }

    public function printDocumentTitle( $string )
    {
        return $string . ' ' . $this->normal;
    }

    public function printTitle()
    {
        return $this->title;
    }

    public function printNormalText()
    {
        return $this->normal;
    }

    public function printLink()
    {
        return $this->link;
    }
}
