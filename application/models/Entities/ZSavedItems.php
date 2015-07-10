<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZSavedItems
 *
 * @Table(name="z_saved_items")
 * @Entity
 */
class ZSavedItems
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
     * @var ZZangus
     *
     * @ManyToOne(targetEntity="ZZangus")
     * @JoinColumns({
     *   @JoinColumn(name="zangu_id", referencedColumnName="id")
     * })
     */
    private $zangu;

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
     * Set zangu
     *
     * @param ZZangus $zangu
     */
    public function setZangu(\ZZangus $zangu)
    {
        $this->zangu = $zangu;
    }

    /**
     * Get zangu
     *
     * @return ZZangus 
     */
    public function getZangu()
    {
        return $this->zangu;
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