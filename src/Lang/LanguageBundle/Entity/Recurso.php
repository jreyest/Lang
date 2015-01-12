<?php
use Lang\LanguageBundle\Form\RecursoType;

namespace Lang\LanguageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Lang\LanguageBundle\Entity\Idiorec;

/**
 * Recurso
 */
class Recurso
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
     * @var string
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
     * @var image2
     */
    public $image2;
     /**
     * @var image3
     */
    public $image3;
     /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $oss;
     /**
     * @var \Doctrine\Common\Collections\Collection
     */    
    protected $idiomas;
     /**
     * @var \Doctrine\Common\Collections\Collection
     */  
    protected $idiorecs;    
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
     * @return Recurso
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
     * @return Recurso
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
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->fechaAct = new \DateTime();
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
     * @return Recurso
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
   //  getWebPath es para mostrar imagenes en la zona de administración
   //  public function getWebPath()
   // {
   //     return null === $this->foto1 ? null : $this->getUploadDir().'/'.$this->foto1;
   // }
    public function getAbsolutePath()
    {
        return null === $this->foto1 ? null : $this->getUploadRootDir().'/'.$this->foto1;
    }
    public function getAbsolutePath2()
    {
        return null === $this->foto2 ? null : $this->getUploadRootDir().'/'.$this->foto2;
    }
    public function getAbsolutePath3()
    {
        return null === $this->foto3 ? null : $this->getUploadRootDir().'/'.$this->foto3;
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
        if (null !== $this->image3) {
             $this->foto3 = $this->seoUrl.'-3.'.$this->image3->guessExtension();
         }
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->image1 || null === $this->image2 || null === $this->image3 ) {
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
        if (null !== $this->image3){
        $this->image3->move($this->getUploadRootDir(), $this->foto3);
         unset($this->image3); 
        }        
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if(file_exists($image1)) {
            if ($image1  === $this->getAbsolutePath()) {
                unlink($image1);
            }
        } 
        if(file_exists($image2)) {
            if ($image2  === $this->getAbsolutePath2()) {
                unlink($image2);
            }
        }  
        if(file_exists($image3)) {
            if ($image3 === $this->getAbsolutePath3()) {
                unlink($image3);
            }
        }  
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->oss = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idiorecs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idiomas = new \Doctrine\Common\Collections\ArrayCollection();
        }

    /**
     * Add os
     *
     * @param \Lang\LanguageBundle\Entity\OS $os
     * @return Recurso
     */
    public function addOs(\Lang\LanguageBundle\Entity\OS $os)
    {
        $os->addRecurso($this);
        $this->oss[] = $os;
    }

    /**
     * Remove os
     *
     * @param \Lang\LanguageBundle\Entity\OS $os
     */
    public function removeOs(\Lang\LanguageBundle\Entity\OS $oss)
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
    public function setIdiorecs($idiorecs)
    {
        $this->idiorecs = $idiorecs;
    }
    /**
     * Get idiorecs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdiorecs()
    {
        return $this->idiorecs;
    }
    public function getIdioma()
    {
        $idiomas = new ArrayCollection();
        
        foreach($this->idiorecs as $p)
        {
            $idiomas[] = $p->getIdioma();
        }
        return $idiomas;
    }
    public function setIdioma($idiomas)
    {
        foreach($idiomas as $p)
        {
            $idiorecs = new Idiorec();
            $idiorecs->setRecurso($this);
            $idiorecs->setIdioma($p);
            $this->addIdiorecs($idiorecs);
        }
    }
    public function getRecurso()
    {
        return $this;
    }
    public function addIdiorecs($idiorec)
    {
        $this->idiorecs[] = $idiorec;
    }
    
    public function removeIdiorecs($idiorec)
    {
        return $this->idiorecs->removeElement($idiorec);
    }
}