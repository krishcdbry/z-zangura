<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZItemSize
 *
 * @Table(name="z_item_size")
 * @Entity
 */
class ZItemSize
{
    /**
     * @var bigint $id
     *
     * @Column(name="id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $size
     *
     * @Column(name="size", type="string", nullable=false)
     */
    private $size;

    /**
     * @var datetime $createdAt
     *
     * @Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var datetime $lastUpdatedAt
     *
     * @Column(name="last_updated_at", type="datetime", nullable=false)
     */
    private $lastUpdatedAt;

    /**
     * @var ZShopItems
     *
     * @ManyToOne(targetEntity="ZShopItems")
     * @JoinColumns({
     *   @JoinColumn(name="item_id", referencedColumnName="id")
     * })
     */
    private $item;


    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set size
     *
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set lastUpdatedAt
     *
     * @param datetime $lastUpdatedAt
     */
    public function setLastUpdatedAt($lastUpdatedAt)
    {
        $this->lastUpdatedAt = $lastUpdatedAt;
    }

    /**
     * Get lastUpdatedAt
     *
     * @return datetime 
     */
    public function getLastUpdatedAt()
    {
        return $this->lastUpdatedAt;
    }

    /**
     * Set item
     *
     * @param ZShopItems $item
     */
    public function setItem(\ZShopItems $item)
    {
        $this->item = $item;
    }

    /**
     * Get item
     *
     * @return ZShopItems 
     */
    public function getItem()
    {
        return $this->item;
    }
}