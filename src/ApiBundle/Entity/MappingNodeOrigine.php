<?php

namespace ApiBundle\Entity;

use ApiBundle\Mixin\BlameableEntity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * MappingNodeOrigine
 *
 * @ORM\Table(name="mapping_node_origine",
 *     uniqueConstraints={
 *        @ORM\UniqueConstraint(name="node_origine",
 *            columns={"mapping_node_id", "origine"})
 *    })
 * @ORM\Entity
 *
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class MappingNodeOrigine
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
     * @ORM\ManyToOne(targetEntity="MappingNode", inversedBy="origines")
     */
    private $mappingNode;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=255)
     *
     * @Gedmo\Versioned
     */
    private $origine;

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
     * Set origine
     *
     * @param string $origine
     *
     * @return MappingNodeOrigine
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set node
     *
     * @param MappingNode $mappingNode
     *
     * @return MappingNodeOrigine
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
