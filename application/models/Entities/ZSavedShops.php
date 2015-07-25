<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZSavedShops
 *
 * @Table(name="z_saved_shops")
 * @Entity
 */
class ZSavedShops
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
     * @var ZShops
     *
     * @ManyToOne(targetEntity="ZShops")
     * @JoinColumns({
     *   @JoinColumn(name="shop_id", referencedColumnName="id")
     * })
     */
    private $shop;


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
     * Set shop
     *
     * @param ZShops $shop
     */
    public function setShop(\ZShops $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Get shop
     *
     * @return ZShops 
     */
    public function getShop()
    {
        return $this->shop;
    }
}