<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZZangus
 *
 * @Table(name="z_zangus")
 * @Entity
 */
class ZZangus
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
     * @var integer $followerCount
     *
     * @Column(name="follower_count", type="integer", nullable=true)
     */
    private $followerCount;

    /**
     * @var integer $followingCount
     *
     * @Column(name="following_count", type="integer", nullable=true)
     */
    private $followingCount;

    /**
     * @var integer $recommendedCount
     *
     * @Column(name="recommended_count", type="integer", nullable=true)
     */
    private $recommendedCount;

    /**
     * @var integer $savedShopsCount
     *
     * @Column(name="saved_shops_count", type="integer", nullable=true)
     */
    private $savedShopsCount;

    /**
     * @var integer $reviewsCount
     *
     * @Column(name="reviews_count", type="integer", nullable=true)
     */
    private $reviewsCount;

    /**
     * @var integer $rating
     *
     * @Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

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
     * @var ZUsers
     *
     * @ManyToOne(targetEntity="ZUsers")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


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
     * Set followerCount
     *
     * @param integer $followerCount
     */
    public function setFollowerCount($followerCount)
    {
        $this->followerCount = $followerCount;
    }

    /**
     * Get followerCount
     *
     * @return integer 
     */
    public function getFollowerCount()
    {
        return $this->followerCount;
    }

    /**
     * Set followingCount
     *
     * @param integer $followingCount
     */
    public function setFollowingCount($followingCount)
    {
        $this->followingCount = $followingCount;
    }

    /**
     * Get followingCount
     *
     * @return integer 
     */
    public function getFollowingCount()
    {
        return $this->followingCount;
    }

    /**
     * Set recommendedCount
     *
     * @param integer $recommendedCount
     */
    public function setRecommendedCount($recommendedCount)
    {
        $this->recommendedCount = $recommendedCount;
    }

    /**
     * Get recommendedCount
     *
     * @return integer 
     */
    public function getRecommendedCount()
    {
        return $this->recommendedCount;
    }

    /**
     * Set savedShopsCount
     *
     * @param integer $savedShopsCount
     */
    public function setSavedShopsCount($savedShopsCount)
    {
        $this->savedShopsCount = $savedShopsCount;
    }

    /**
     * Get savedShopsCount
     *
     * @return integer 
     */
    public function getSavedShopsCount()
    {
        return $this->savedShopsCount;
    }

    /**
     * Set reviewsCount
     *
     * @param integer $reviewsCount
     */
    public function setReviewsCount($reviewsCount)
    {
        $this->reviewsCount = $reviewsCount;
    }

    /**
     * Get reviewsCount
     *
     * @return integer 
     */
    public function getReviewsCount()
    {
        return $this->reviewsCount;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
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
     * Set user
     *
     * @param ZUsers $user
     */
    public function setUser(\ZUsers $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return ZUsers 
     */
    public function getUser()
    {
        return $this->user;
    }
}