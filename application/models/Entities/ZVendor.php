<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZVendor
 *
 * @Table(name="z_vendor")
 * @Entity
 */
class ZVendor
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
     * @var string $isVerifiedVendor
     *
     * @Column(name="is_verified_vendor", type="string", nullable=false)
     */
    private $isVerifiedVendor;

    /**
     * @var string $website
     *
     * @Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string $businessName
     *
     * @Column(name="business_name", type="string", length=255, nullable=false)
     */
    private $businessName;

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
     * Set isVerifiedVendor
     *
     * @param string $isVerifiedVendor
     */
    public function setIsVerifiedVendor($isVerifiedVendor)
    {
        $this->isVerifiedVendor = $isVerifiedVendor;
    }

    /**
     * Get isVerifiedVendor
     *
     * @return string 
     */
    public function getIsVerifiedVendor()
    {
        return $this->isVerifiedVendor;
    }

    /**
     * Set website
     *
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set businessName
     *
     * @param string $businessName
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;
    }

    /**
     * Get businessName
     *
     * @return string 
     */
    public function getBusinessName()
    {
        return $this->businessName;
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