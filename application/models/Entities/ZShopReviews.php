<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZShopReviews
 *
 * @Table(name="z_shop_reviews")
 * @Entity
 */
class ZShopReviews
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
     * @var text $review
     *
     * @Column(name="review", type="text", nullable=false)
     */
    private $review;

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
     * Set review
     *
     * @param text $review
     */
    public function setReview($review)
    {
        $this->review = $review;
    }

    /**
     * Get review
     *
     * @return text 
     */
    public function getReview()
    {
        return $this->review;
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