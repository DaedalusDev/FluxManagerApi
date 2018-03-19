<?php

namespace ApiBundle\Entity;

use ApiBundle\Mixin\BlameableEntity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * MappingNodeCible
 *
 * @ORM\Table(name="mapping_node_cible",
 *     uniqueConstraints={
 *        @ORM\UniqueConstraint(name="node_cible",
 *            columns={"mapping_node_id", "cible"})
 *    })
 * @ORM\Entity
 *
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class MappingNodeCible
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
     * @var MappingNode
     *
     * @ORM\ManyToOne(targetEntity="MappingNode", inversedBy="cibles")
     */
    private $mappingNode;

    /**
     * @var string
     *
     * @ORM\Column(name="cible", type="string", length=255)
     *
     * @Gedmo\Versioned
     */
    private $cible;

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
     * Set cible
     *
     * @param string $cible
     *
     * @return MappingNodeCible
     */
    public function setCible($cible)
    {
        $this->cible = $cible;

        return $this;
    }

    /**
     * Get cible
     *
     * @return string
     */
    public function getCible()
    {
        return $this->cible;
    }

    /**
     * Set node
     *
     * @param MappingNode $mappingNode
     *
     * @return MappingNodeCible
     */
    public function setMappingNode(MappingNode $mappingNode)
    {
        $this->mappingNode = $mappingNode;

        return $this;
    }

    /**
     * Get node
     *
     * @return MappingNode
     */
    public function getMappingNode()
    {
        return $this->mappingNode;
    }
}
