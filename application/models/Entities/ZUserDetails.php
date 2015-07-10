<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZUserDetails
 *
 * @Table(name="z_user_details")
 * @Entity
 */
class ZUserDetails
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
     * @var string $firstName
     *
     * @Column(name="first_name", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string $lastName
     *
     * @Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string $mobileNumber
     *
     * @Column(name="mobile_number", type="string", length=45, nullable=true)
     */
    private $mobileNumber;

    /**
     * @var string $profilePic
     *
     * @Column(name="profile_pic", type="string", length=1000, nullable=true)
     */
    private $profilePic;

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
     * @var ZCities
     *
     * @ManyToOne(targetEntity="ZCities")
     * @JoinColumns({
     *   @JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

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
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * Get mobileNumber
     *
     * @return string 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set profilePic
     *
     * @param string $profilePic
     */
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
    }

    /**
     * Get profilePic
     *
     * @return string 
     */
    public function getProfilePic()
    {
        return $this->profilePic;
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

    /**
     * Set city
     *
     * @param ZCities $city
     */
    public function setCity(\ZCities $city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return ZCities 
     */
    public function getCity()
    {
        return $this->city;
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