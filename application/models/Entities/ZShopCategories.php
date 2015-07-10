<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZShopCategories
 *
 * @Table(name="z_shop_categories")
 * @Entity
 */
class ZShopCategories
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
     * @var ZCategories
     *
     * @ManyToOne(targetEntity="ZCategories")
     * @JoinColumns({
     *   @JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

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
     * Set category
     *
     * @param ZCategories $category
     */
    public function setCategory(\ZCategories $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return ZCategories 
     */
    public function getCategory()
    {
        return $this->category;
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