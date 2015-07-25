<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZShopItemPhotos
 *
 * @Table(name="z_shop_item_photos")
 * @Entity
 */
class ZShopItemPhotos
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
     * @var string $title
     *
     * @Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string $path
     *
     * @Column(name="path", type="string", length=1000, nullable=false)
     */
    private $path;

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
     *   @JoinColumn(name="shop_item_id", referencedColumnName="id")
     * })
     */
    private $shopItem;


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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
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
     * Set shopItem
     *
     * @param ZShopItems $shopItem
     */
    public function setShopItem(\ZShopItems $shopItem)
    {
        $this->shopItem = $shopItem;
    }

    /**
     * Get shopItem
     *
     * @return ZShopItems 
     */
    public function getShopItem()
    {
        return $this->shopItem;
    }
}