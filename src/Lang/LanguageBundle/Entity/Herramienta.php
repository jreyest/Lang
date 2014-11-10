<?php
use Lang\LanguageBundle\Form\HerramientaType;

namespace Lang\LanguageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Herramienta
 */
class Herramienta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $freeOrPaid;

    /**
     * @var \DateTime
     */
    private $fechaCrea;

    /**
     * @var \DateTime
     */
    private $fechaAct;

    /**
     * @var stringnombre
     */
    private $nombre;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $titDest;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $descripLarga;

    /**
     * @var string
     */
    private $keywordsEs;

    /**
     * @var integer
     */
    private $web2OrSoft;

    /**
     * @var integer
     */
    private $tamano;

    /**
     * @var string
     */
    private $getIt;

    /**
     * @var string
     */
    private $urlAuthor;

    /**
     * @var string
     */
    private $reqMinEs;

    /**
     * @var string
     */
    private $seoUrl;

    /**
     * @var string
     */
    private $paises;

    /**
     * @var integer
     */
    private $edRaiting;

    /**
     * @var string
     */
    private $foto1;

    /**
     * @var string
     */
    private $foto2;

    /**
     * @var string
     */
    private $foto3;
   
     /**
     * @var image1
     */
    public $image1;
     /**
     * @var image1
     */
    public $image2;
     /**
     * @var \Lang\LanguageBundle\Entity\Herratipo
     */
    private $herratipo;
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
     * Set freeOrPaid
     *
     * @param integer $freeOrPaid
     * @return Herramienta
     */
    public function setFreeOrPaid($freeOrPaid)
    {
        $this->freeOrPaid = $freeOrPaid;

        return $this;
    }

    /**
     * Get freeOrPaid
     *
     * @return integer 
     */
    public function getFreeOrPaid()
    {
        return $this->freeOrPaid;      
    }
    public static function getFreeOrPaids()
    {
        return array('1' => 'Gratuito', '2' => 'Gratuito/pagado ', '3' => 'Pagado');        
    }
    public static function getFreeOrPaidValues()
    {
        return array_keys(self::getFreeOrPaids());
    }

    /**
     * Set fechaCrea
     *
     * @param \DateTime $fechaCrea
     * @return Herramienta
     */
    public function setFechaCrea($setFechaCrea)
    {
        $this->fechaCrea = $setFechaCrea;

        return $this;
    }
    public function setFechaCreaValue()
    {
        if(!$this->getFechaCrea()) {
            $this->fechaCrea = new \DateTime();
        }
    }

    /**
     * Get fechaCrea
     *
     * @return \DateTime 
     */
    public function getFechaCrea()
    {
        return $this->fechaCrea;
    }

    /**
     * Set fechaAct
     *
     * @param \DateTime $fechaAct
     * @return Herramienta
     */
    public function setFechaAct($fechaAct)
    {
        $this->fechaAct = $fechaAct;

        return $this;
    }

    /**
     * Get fechaAct
     *
     * @return \DateTime 
     */
    public function getFechaAct()
    {
        return $this->fechaAct;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Herramienta
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Herramienta
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set titDest
     *
     * @param string $titDest
     * @return Herramienta
     */
    public function setTitDest($titDest)
    {
        $this->titDest = $titDest;

        return $this;
    }

    /**
     * Get titDest
     *
     * @return string 
     */
    public function getTitDest()
    {
        return $this->titDest;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Herramienta
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set descripLarga
     *
     * @param string $descripLarga
     * @return Herramienta
     */
    public function setDescripLarga($descripLarga)
    {
        $this->descripLarga = $descripLarga;

        return $this;
    }

    /**
     * Get descripLarga
     *
     * @return string 
     */
    public function getDescripLarga()
    {
        return $this->descripLarga;
    }

    /**
     * Set keywordsEs
     *
     * @param string $keywordsEs
     * @return Herramienta
     */
    public function setKeywordsEs($keywordsEs)
    {
        $this->keywordsEs = $keywordsEs;

        return $this;
    }

    /**
     * Get keywordsEs
     *
     * @return string 
     */
    public function getKeywordsEs()
    {
        return $this->keywordsEs;
    }

    /**
     * Set web2OrSoft
     *
     * @param integer $web2OrSoft
     * @return Herramienta
     */
    public function setWeb2OrSoft($web2OrSoft)
    {
        $this->web2OrSoft = $web2OrSoft;

        return $this;
    }

    /**
     * Get web2OrSoft
     *
     * @return integer 
     */
    public function getWeb2OrSoft()
    {
        return $this->web2OrSoft;
    }
    public static function getWeb2OrSofts()
    {
        return array('1' => 'Web ', '2' => 'Software ', '3' => 'Apps de móviles ');        
    }
    public static function getWeb2OrSoftValues()
    {
        return array_keys(self::getWeb2OrSofts());
    }

    /**
     * Set tamano
     *
     * @param integer $tamano
     * @return Herramienta
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;

        return $this;
    }

    /**
     * Get tamano
     *
     * @return integer 
     */
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * Set getIt
     *
     * @param string $getIt
     * @return Herramienta
     */
    public function setGetIt($getIt)
    {
        $this->getIt = $getIt;

        return $this;
    }

    /**
     * Get getIt
     *
     * @return string 
     */
    public function getGetIt()
    {
        return $this->getIt;
    }

    /**
     * Set urlAuthor
     *
     * @param string $urlAuthor
     * @return Herramienta
     */
    public function setUrlAuthor($urlAuthor)
    {
        $this->urlAuthor = $urlAuthor;

        return $this;
    }

    /**
     * Get urlAuthor
     *
     * @return string 
     */
    public function getUrlAuthor()
    {
        return $this->urlAuthor;
    }

    /**
     * Set reqMinEs
     *
     * @param string $reqMinEs
     * @return Herramienta
     */
    public function setReqMinEs($reqMinEs)
    {
        $this->reqMinEs = $reqMinEs;

        return $this;
    }

    /**
     * Get reqMinEs
     *
     * @return string 
     */
    public function getReqMinEs()
    {
        return $this->reqMinEs;
    }

    /**
     * Set seoUrl
     *
     * @param string $seoUrl
     * @return Herramienta
     */
    public function setSeoUrl($seoUrl)
    {
        $this->seoUrl = $seoUrl;

        return $this;
    }

    /**
     * Get seoUrl
     *
     * @return string 
     */
    public function getSeoUrl()
    {
        return $this->seoUrl;
    }

    /**
     * Set paises
     *
     * @param string $paises
     * @return Herramienta
     */
    public function setPaises($paises)
    {
        $this->paises = $paises;

        return $this;
    }

    /**
     * Get paises
     *
     * @return string 
     */
    public function getPaises()
    {
        return $this->paises;
    }

    /**
     * Set edRaiting
     *
     * @param integer $edRaiting
     * @return Herramienta
     */
    public function setEdRaiting($edRaiting)
    {
        $this->edRaiting = $edRaiting;

        return $this;
    }

    /**
     * Get edRaiting
     *
     * @return integer 
     */
    public function getEdRaiting()
    {
        return $this->edRaiting;
    }

    /**
     * Set foto1
     *
     * @param string $foto1
     * @return Herramienta
     */
    public function setFoto1($foto1)
    {
        $this->foto1 = $foto1;

        return $this;
    }

    /**
     * Get foto1
     *
     * @return string 
     */
    public function getFoto1()
    {
        return $this->foto1;
    }

    /**
     * Set foto2
     *
     * @param string $foto2
     * @return Herramienta
     */
    public function setFoto2($foto2)
    {
        $this->foto2 = $foto2;

        return $this;
    }

    /**
     * Get foto2
     *
     * @return string 
     */
    public function getFoto2()
    {
        return $this->foto2;
    }

    /**
     * Set foto3
     *
     * @param string $foto3
     * @return Herramienta
     */
    public function setFoto3($foto3)
    {
        $this->foto3 = $foto3;

        return $this;
    }

    /**
     * Get foto3
     *
     * @return string 
     */
    public function getFoto3()
    {
        return $this->foto3;
    }
    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images';
    }
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    public function getWebPath()
    {
        return null === $this->foto1 ? null : $this->getUploadDir().'/'.$this->foto1;
    }
    public function getAbsolutePath()
    {
        return null === $this->foto1 ? null : $this->getUploadRootDir().'/'.$this->foto1;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->image1) {
             $this->foto1 = $this->seoUrl.'-1.'.$this->image1->guessExtension();
         }
        if (null !== $this->image2) {
             $this->foto2 = $this->seoUrl.'-2.'.$this->image2->guessExtension();
         }
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->image1 || null === $this->image2 ) {
            return;
        }
 
        // If there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        if (null !== $this->image1){
            $this->image1->move($this->getUploadRootDir(), $this->foto1);
            unset($this->image1);               
        }
        if (null !== $this->image2){
        $this->image2->move($this->getUploadRootDir(), $this->foto2);
         unset($this->image2); 
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if(image1_exists($image1)) {
            if ($image1 = $this->getAbsolutePath()) {
                unlink($image1);
            }
        }    
    }
  
    /**
     * @var \Lang\LanguageBundle\Entity\Herratipo
     */
    private $Herratipo;


    /**
     * Set Herratipo
     *
     * @param \Lang\LanguageBundle\Entity\Herratipo $herratipo
     * @return Herramienta
     */
    public function setHerratipo(\Lang\LanguageBundle\Entity\Herratipo $herratipo = null)
    {
        $this->Herratipo = $herratipo;

        return $this;
    }

    /**
     * Get Herratipo
     *
     * @return \Lang\LanguageBundle\Entity\Herratipo 
     */
    public function getHerratipo()
    {
        return $this->Herratipo;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $oss;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->oss = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add oss
     *
     * @param \Lang\LanguageBundle\Entity\OS $oss
     * @return Herramienta
     */
    public function addOs(\Lang\LanguageBundle\Entity\OS $os)
    {
        $os->addHerramienta($this);
        $this->oss[] = $os;
    }

    /**
     * Remove oss
     *
     * @param \Lang\LanguageBundle\Entity\OS $oss
     */
    public function removeOss(\Lang\LanguageBundle\Entity\OS $oss)
    {
        $this->oss->removeElement($oss);
    }

    /**
     * Get oss
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOss()
    {
        return $this->oss;
    }
        /**
     * Set Herratipo
     *
     * @param \Lang\LanguageBundle\Entity\OS $oss
     * @return Herramienta
     */
    public function setOss(\Lang\LanguageBundle\Entity\OS $oss = null)
    {
        $this->Oss = $oss;

        return $this;
    }

    /**
     * Add oss
     *
     * @param \Lang\LanguageBundle\Entity\OS $oss
     * @return Herramienta
     */
    public function addOss(\Lang\LanguageBundle\Entity\OS $oss)
    {
        $this->oss[] = $oss;

        return $this;
    }
}
