<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZShops
 *
 * @Table(name="z_shops")
 * @Entity
 */
class ZShops
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
     * @var string $banner
     *
     * @Column(name="banner", type="string", length=1000, nullable=false)
     */
    private $banner;

    /**
     * @var string $type
     *
     * @Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var text $description
     *
     * @Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer $discount
     *
     * @Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

    /**
     * @var string $offer
     *
     * @Column(name="offer", type="string", length=255, nullable=true)
     */
    private $offer;

    /**
     * @var integer $rating
     *
     * @Column(name="rating", type="integer", nullable=false)
     */
    private $rating;

    /**
     * @var bigint $views
     *
     * @Column(name="views", type="bigint", nullable=false)
     */
    private $views;

    /**
     * @var string $contactNumber
     *
     * @Column(name="contact_number", type="string", length=255, nullable=true)
     */
    private $contactNumber;

    /**
     * @var text $adress
     *
     * @Column(name="adress", type="text", nullable=true)
     */
    private $adress;

    /**
     * @var integer $pincode
     *
     * @Column(name="pincode", type="integer", nullable=true)
     */
    private $pincode;

    /**
     * @var bigint $landmark
     *
     * @Column(name="landmark", type="bigint", nullable=true)
     */
    private $landmark;

    /**
     * @var string $shopStatus
     *
     * @Column(name="shop_status", type="string", nullable=false)
     */
    private $shopStatus;

    /**
     * @var string $website
     *
     * @Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string $isVerified
     *
     * @Column(name="is_verified", type="string", nullable=false)
     */
    private $isVerified;

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
     * @var ZVendor
     *
     * @ManyToOne(targetEntity="ZVendor")
     * @JoinColumns({
     *   @JoinColumn(name="vendor_id", referencedColumnName="id")
     * })
     */
    private $vendor;

    /**
     * @var ZLocation
     *
     * @ManyToOne(targetEntity="ZLocation")
     * @JoinColumns({
     *   @JoinColumn(name="location_id", referencedColumnName="id")
     * })
     */
    private $location;


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
     * Set banner
     *
     * @param string $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get banner
     *
     * @return string 
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
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
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set offer
     *
     * @param string $offer
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get offer
     *
     * @return string 
     */
    public function getOffer()
    {
        return $this->offer;
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
     * Set views
     *
     * @param bigint $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * Get views
     *
     * @return bigint 
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set contactNumber
     *
     * @param string $contactNumber
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
    }

    /**
     * Get contactNumber
     *
     * @return string 
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set adress
     *
     * @param text $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * Get adress
     *
     * @return text 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set pincode
     *
     * @param integer $pincode
     */
    public function setPincode($pincode)
    {
        $this->pincode = $pincode;
    }

    /**
     * Get pincode
     *
     * @return integer 
     */
    public function getPincode()
    {
        return $this->pincode;
    }

    /**
     * Set landmark
     *
     * @param bigint $landmark
     */
    public function setLandmark($landmark)
    {
        $this->landmark = $landmark;
    }

    /**
     * Get landmark
     *
     * @return bigint 
     */
    public function getLandmark()
    {
        return $this->landmark;
    }

    /**
     * Set shopStatus
     *
     * @param string $shopStatus
     */
    public function setShopStatus($shopStatus)
    {
        $this->shopStatus = $shopStatus;
    }

    /**
     * Get shopStatus
     *
     * @return string 
     */
    public function getShopStatus()
    {
        return $this->shopStatus;
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
     * Set isVerified
     *
     * @param string $isVerified
     */
    public function setIsVerified($isVerified)
    {
        $this->isVerified = $isVerified;
    }

    /**
     * Get isVerified
     *
     * @return string 
     */
    public function getIsVerified()
    {
        return $this->isVerified;
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
     * Set location
     *
     * @param ZLocation $location
     */
    public function setLocation(\ZLocation $location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return ZLocation 
     */
    public function getLocation()
    {
        return $this->location;
    }
}