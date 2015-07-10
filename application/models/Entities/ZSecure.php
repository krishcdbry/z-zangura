<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZSecure
 *
 * @Table(name="z_secure")
 * @Entity
 */
class ZSecure
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
     * @var boolean $isVerified
     *
     * @Column(name="is_verified", type="boolean", nullable=false)
     */
    private $isVerified;

    /**
     * @var string $uniqueKey
     *
     * @Column(name="unique_key", type="string", length=1000, nullable=false)
     */
    private $uniqueKey;

    /**
     * @var string $verificationMailSecurityCode
     *
     * @Column(name="verification_mail_security_code", type="string", length=1000, nullable=false)
     */
    private $verificationMailSecurityCode;

    /**
     * @var boolean $isForgotPassword
     *
     * @Column(name="is_forgot_password", type="boolean", nullable=false)
     */
    private $isForgotPassword;

    /**
     * @var boolean $isAccountBlocked
     *
     * @Column(name="is_account_blocked", type="boolean", nullable=false)
     */
    private $isAccountBlocked;

    /**
     * @var integer $invalidLoginAttempts
     *
     * @Column(name="invalid_login_attempts", type="integer", nullable=false)
     */
    private $invalidLoginAttempts;

    /**
     * @var string $invalidLoginAttemptsIp
     *
     * @Column(name="invalid_login_attempts_ip", type="string", length=255, nullable=true)
     */
    private $invalidLoginAttemptsIp;

    /**
     * @var string $accountUnblockSecurityCode
     *
     * @Column(name="account_unblock_security_code", type="string", length=1000, nullable=true)
     */
    private $accountUnblockSecurityCode;

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
     * Set isVerified
     *
     * @param boolean $isVerified
     */
    public function setIsVerified($isVerified)
    {
        $this->isVerified = $isVerified;
    }

    /**
     * Get isVerified
     *
     * @return boolean 
     */
    public function getIsVerified()
    {
        return $this->isVerified;
    }

    /**
     * Set uniqueKey
     *
     * @param string $uniqueKey
     */
    public function setUniqueKey($uniqueKey)
    {
        $this->uniqueKey = $uniqueKey;
    }

    /**
     * Get uniqueKey
     *
     * @return string 
     */
    public function getUniqueKey()
    {
        return $this->uniqueKey;
    }

    /**
     * Set verificationMailSecurityCode
     *
     * @param string $verificationMailSecurityCode
     */
    public function setVerificationMailSecurityCode($verificationMailSecurityCode)
    {
        $this->verificationMailSecurityCode = $verificationMailSecurityCode;
    }

    /**
     * Get verificationMailSecurityCode
     *
     * @return string 
     */
    public function getVerificationMailSecurityCode()
    {
        return $this->verificationMailSecurityCode;
    }

    /**
     * Set isForgotPassword
     *
     * @param boolean $isForgotPassword
     */
    public function setIsForgotPassword($isForgotPassword)
    {
        $this->isForgotPassword = $isForgotPassword;
    }

    /**
     * Get isForgotPassword
     *
     * @return boolean 
     */
    public function getIsForgotPassword()
    {
        return $this->isForgotPassword;
    }

    /**
     * Set isAccountBlocked
     *
     * @param boolean $isAccountBlocked
     */
    public function setIsAccountBlocked($isAccountBlocked)
    {
        $this->isAccountBlocked = $isAccountBlocked;
    }

    /**
     * Get isAccountBlocked
     *
     * @return boolean 
     */
    public function getIsAccountBlocked()
    {
        return $this->isAccountBlocked;
    }

    /**
     * Set invalidLoginAttempts
     *
     * @param integer $invalidLoginAttempts
     */
    public function setInvalidLoginAttempts($invalidLoginAttempts)
    {
        $this->invalidLoginAttempts = $invalidLoginAttempts;
    }

    /**
     * Get invalidLoginAttempts
     *
     * @return integer 
     */
    public function getInvalidLoginAttempts()
    {
        return $this->invalidLoginAttempts;
    }

    /**
     * Set invalidLoginAttemptsIp
     *
     * @param string $invalidLoginAttemptsIp
     */
    public function setInvalidLoginAttemptsIp($invalidLoginAttemptsIp)
    {
        $this->invalidLoginAttemptsIp = $invalidLoginAttemptsIp;
    }

    /**
     * Get invalidLoginAttemptsIp
     *
     * @return string 
     */
    public function getInvalidLoginAttemptsIp()
    {
        return $this->invalidLoginAttemptsIp;
    }

    /**
     * Set accountUnblockSecurityCode
     *
     * @param string $accountUnblockSecurityCode
     */
    public function setAccountUnblockSecurityCode($accountUnblockSecurityCode)
    {
        $this->accountUnblockSecurityCode = $accountUnblockSecurityCode;
    }

    /**
     * Get accountUnblockSecurityCode
     *
     * @return string 
     */
    public function getAccountUnblockSecurityCode()
    {
        return $this->accountUnblockSecurityCode;
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