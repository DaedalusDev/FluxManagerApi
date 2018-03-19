<?php

namespace ApiBundle\Entity;

use ApiBundle\Mixin\BlameableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * MappingNode
 *
 * @ORM\Table(name="mapping_node")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\MappingNodeRepository")
 *
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class MappingNode
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Gedmo\Versioned
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="MappingNodeAttribute", mappedBy="mappingNode", cascade={"ALL"}, indexBy="attribute")
     */
    private $attributes;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="MappingNodeOrigine", mappedBy="mappingNode", cascade={"ALL"}, indexBy="origine")
     */
    private $origines;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="MappingNodeCible", mappedBy="mappingNode", cascade={"ALL"}, indexBy="cible")
     */
    private $cibles;

    /**
     * @var MappingNode
     *
     * @ORM\ManyToOne(targetEntity="MappingNode", inversedBy="childNodes")
     * @ORM\JoinColumn(name="parent_node_id", referencedColumnName="id", nullable=true)
     */
    private $parentNode;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="MappingNode", mappedBy="parentNode")
     */
    private $childNodes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attributes = new ArrayCollection();
        $this->origines = new ArrayCollection();
        $this->cibles = new ArrayCollection();
        $this->childNodes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MappingNode
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add attribute
     *
     * @param MappingNodeAttribute $attribute
     *
     * @return MappingNode
     */
    public function addAttribute(MappingNodeAttribute $attribute)
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * Remove attribute
     *
     * @param MappingNodeAttribute $attribute
     */
    public function removeAttribute(MappingNodeAttribute $attribute)
    {
        $this->attributes->removeElement($attribute);
    }

    /**
     * Get attributes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set parentNode
     *
     * @param MappingNode $parentNode
     *
     * @return MappingNode
     */
    public function setParentNode(MappingNode $parentNode = null)
    {
        $this->parentNode = $parentNode;

        return $this;
    }

    /**
     * Get parentNode
     *
     * @return MappingNode
     */
    public function getParentNode()
    {
        return $this->parentNode;
    }

    /**
     * Add childNode
     *
     * @param MappingNode $childNode
     *
     * @return MappingNode
     */
    public function addChildNode(MappingNode $childNode)
    {
        $this->childNodes[] = $childNode;

        return $this;
    }

    /**
     * Remove childNode
     *
     * @param MappingNode $childNode
     */
    public function removeChildNode(MappingNode $childNode)
    {
        $this->childNodes->removeElement($childNode);
    }

    /**
     * Get childNodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildNodes()
    {
        return $this->childNodes;
    }


    /**
     * Add origine
     *
     * @param MappingNodeOrigine $origine
     *
     * @return MappingNode
     */
    public function addOrigine(MappingNodeOrigine $origine)
    {
        $this->origines[] = $origine;

        return $this;
    }

    /**
     * Remove origine
     *
     * @param MappingNodeOrigine $origine
     */
    public function removeOrigine(MappingNodeOrigine $origine)
    {
        $this->origines->removeElement($origine);
    }

    /**
     * Get origines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrigines()
    {
        return $this->origines;
    }

    /**
     * Add cible
     *
     * @param MappingNodeCible $cible
     *
     * @return MappingNode
     */
    public function addCible(MappingNodeCible $cible)
    {
        $this->cibles[] = $cible;

        return $this;
    }

    /**
     * Remove cible
     *
     * @param MappingNodeCible $cible
     */
    public function removeCible(MappingNodeCible $cible)
    {
        $this->cibles->removeElement($cible);
    }

    /**
     * Get cibles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCibles()
    {
        return $this->cibles;
    }

}
