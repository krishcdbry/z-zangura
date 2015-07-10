<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZShopReviewsLikes
 *
 * @Table(name="z_shop_reviews_likes")
 * @Entity
 */
class ZShopReviewsLikes
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
     * @var ZShopReviews
     *
     * @ManyToOne(targetEntity="ZShopReviews")
     * @JoinColumns({
     *   @JoinColumn(name="review_id", referencedColumnName="id")
     * })
     */
    private $review;

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
     * Set review
     *
     * @param ZShopReviews $review
     */
    public function setReview(\ZShopReviews $review)
    {
        $this->review = $review;
    }

    /**
     * Get review
     *
     * @return ZShopReviews 
     */
    public function getReview()
    {
        return $this->review;
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
}