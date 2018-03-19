<?php

namespace ApiBundle\Entity;

use ApiBundle\Mixin\BlameableEntity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * MappingNodeAttribute
 *
 * @ORM\Table(name="mapping_node_attribute",
 *     uniqueConstraints={
 *        @ORM\UniqueConstraint(name="node_attribute",
 *            columns={"mapping_node_id", "attribute"})
 *    })
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\MappingNodeAttributeRepository")
 *
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class MappingNodeAttribute
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
     * @ORM\ManyToOne(targetEntity="MappingNode", inversedBy="attributes")
     */
    private $mappingNode;

    /**
     * @var string
     *
     * @ORM\Column(name="attribute", type="string", length=255)
     *
     * @Gedmo\Versioned
     */
    private $attribute;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     *
     * @Gedmo\Versioned
     */
    private $value;


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
     * Set attribute
     *
     * @param string $attribute
     *
     * @return MappingNodeAttribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get attribute
     *
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return MappingNodeAttribute
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set node
     *
     * @param MappingNode $mappingNode
     *
     * @return MappingNodeAttribute
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
