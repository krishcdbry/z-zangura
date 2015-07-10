<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZAccountMailStatus
 *
 * @Table(name="z_account_mail_status")
 * @Entity
 */
class ZAccountMailStatus
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
     * @var bigint $userId
     *
     * @Column(name="user_id", type="bigint", nullable=false)
     */
    private $userId;

    /**
     * @var string $accountStatus
     *
     * @Column(name="account_status", type="string", nullable=false)
     */
    private $accountStatus;

    /**
     * @var string $isVerified
     *
     * @Column(name="is_verified", type="string", nullable=false)
     */
    private $isVerified;

    /**
     * @var string $isVerificationMailSent
     *
     * @Column(name="is_verification_mail_sent", type="string", nullable=false)
     */
    private $isVerificationMailSent;

    /**
     * @var string $isThreeDayVerificationMailSent
     *
     * @Column(name="is_three_day_verification_mail_sent", type="string", nullable=false)
     */
    private $isThreeDayVerificationMailSent;

    /**
     * @var string $isSevenDayVerificationMailSent
     *
     * @Column(name="is_seven_day_verification_mail_sent", type="string", nullable=false)
     */
    private $isSevenDayVerificationMailSent;

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
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param bigint $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return bigint 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set accountStatus
     *
     * @param string $accountStatus
     */
    public function setAccountStatus($accountStatus)
    {
        $this->accountStatus = $accountStatus;
    }

    /**
     * Get accountStatus
     *
     * @return string 
     */
    public function getAccountStatus()
    {
        return $this->accountStatus;
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
     * Set isVerificationMailSent
     *
     * @param string $isVerificationMailSent
     */
    public function setIsVerificationMailSent($isVerificationMailSent)
    {
        $this->isVerificationMailSent = $isVerificationMailSent;
    }

    /**
     * Get isVerificationMailSent
     *
     * @return string 
     */
    public function getIsVerificationMailSent()
    {
        return $this->isVerificationMailSent;
    }

    /**
     * Set isThreeDayVerificationMailSent
     *
     * @param string $isThreeDayVerificationMailSent
     */
    public function setIsThreeDayVerificationMailSent($isThreeDayVerificationMailSent)
    {
        $this->isThreeDayVerificationMailSent = $isThreeDayVerificationMailSent;
    }

    /**
     * Get isThreeDayVerificationMailSent
     *
     * @return string 
     */
    public function getIsThreeDayVerificationMailSent()
    {
        return $this->isThreeDayVerificationMailSent;
    }

    /**
     * Set isSevenDayVerificationMailSent
     *
     * @param string $isSevenDayVerificationMailSent
     */
    public function setIsSevenDayVerificationMailSent($isSevenDayVerificationMailSent)
    {
        $this->isSevenDayVerificationMailSent = $isSevenDayVerificationMailSent;
    }

    /**
     * Get isSevenDayVerificationMailSent
     *
     * @return string 
     */
    public function getIsSevenDayVerificationMailSent()
    {
        return $this->isSevenDayVerificationMailSent;
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
}