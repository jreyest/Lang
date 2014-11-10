<?php

namespace Lang\LanguageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Herratipo
 */
class Herratipo
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $tipoNom;
     /**
     * @var string
     */
    private $tipoSeo;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $herramientas;
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set tipoNom
     *
     * @param string $tipoNom
     * @return Herratipo
     */
    public function setTipoNom($tipoNom)
    {
        $this->tipoNom = $tipoNom;

        return $this;
    }

    /**
     * Get tipoNom
     *
     * @return string 
     */
    public function getTipoNom()
    {
        return $this->tipoNom;
    }

    /**
     * Set tipoSeo
     *
     * @param string $tipoSeo
     * @return Herratipo
     */
    public function setTipoSeo($tipoSeo)
    {
        $this->tipoSeo = $tipoSeo;

        return $this;
    }

    /**
     * Get tipoSeo
     *
     * @return string 
     */
    public function getTipoSeo()
    {
        return $this->tipoSeo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->herramientas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add herramientas
     *
     * @param \Lang\LanguageBundle\Entity\Herramienta $herramientas
     * @return Herratipo
     */
    public function addHerramienta(\Lang\LanguageBundle\Entity\Herramienta $herramientas)
    {
        $this->herramientas[] = $herramientas;

        return $this;
    }

    /**
     * Remove herramientas
     *
     * @param \Lang\LanguageBundle\Entity\Herramienta $herramientas
     */
    public function removeHerramienta(\Lang\LanguageBundle\Entity\Herramienta $herramientas)
    {
        $this->herramientas->removeElement($herramientas);
    }

    /**
     * Get herramientas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHerramientas()
    {
        return $this->herramientas;
    }
    public function __toString()
    {
	//if return $this->getName() es true devuelve $this->getName(). Si no, devuelve "".
        //Sirve pa mostrar todos los tipos de herramienta en el formulario de herramientas
        return $this->getTipoNom() ? $this->getTipoNom() : "";
    }
}
