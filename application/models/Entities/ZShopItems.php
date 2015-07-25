<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZShopItems
 *
 * @Table(name="z_shop_items")
 * @Entity
 */
class ZShopItems
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
     * @var string $isActive
     *
     * @Column(name="is_active", type="string", nullable=false)
     */
    private $isActive;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string $description
     *
     * @Column(name="description", type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @var string $price
     *
     * @Column(name="price", type="string", length=255, nullable=false)
     */
    private $price;

    /**
     * @var integer $discount
     *
     * @Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

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
     * @var ZShops
     *
     * @ManyToOne(targetEntity="ZShops")
     * @JoinColumns({
     *   @JoinColumn(name="shop_id", referencedColumnName="id")
     * })
     */
    private $shop;

    /**
     * @var ZVendor
     *
     * @ManyToOne(targetEntity="ZVendor")
     * @JoinColumns({
     *   @JoinColumn(name="vendor_id", referencedColumnName="id")
     * })
     */
    private $vendor;

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
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isActive
     *
     * @param string $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return string 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Get discount
     *
     * @return integer 
     */
    public function getDiscount()
    {
        return $this->discount;
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

    /**
     * Set vendor
     *
     * @param ZVendor $vendor
     */
    public function setVendor(\ZVendor $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Get vendor
     *
     * @return ZVendor 
     */
    public function getVendor()
    {
        return $this->vendor;
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
}