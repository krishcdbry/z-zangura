<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZShopsRecommends
 *
 * @Table(name="z_shops_recommends")
 * @Entity
 */
class ZShopsRecommends
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
     * @var ZShops
     *
     * @ManyToOne(targetEntity="ZShops")
     * @JoinColumns({
     *   @JoinColumn(name="shop_id", referencedColumnName="id")
     * })
     */
    private $shop;

    /**
     * @var ZZangus
     *
     * @ManyToOne(targetEntity="ZZangus")
     * @JoinColumns({
     *   @JoinColumn(name="recommender_zangu_id", referencedColumnName="id")
     * })
     */
    private $recommenderZangu;

    /**
     * @var ZZangus
     *
     * @ManyToOne(targetEntity="ZZangus")
     * @JoinColumns({
     *   @JoinColumn(name="recommend_to_zangu_id", referencedColumnName="id")
     * })
     */
    private $recommendToZangu;


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
     * Set recommenderZangu
     *
     * @param ZZangus $recommenderZangu
     */
    public function setRecommenderZangu(\ZZangus $recommenderZangu)
    {
        $this->recommenderZangu = $recommenderZangu;
    }

    /**
     * Get recommenderZangu
     *
     * @return ZZangus 
     */
    public function getRecommenderZangu()
    {
        return $this->recommenderZangu;
    }

    /**
     * Set recommendToZangu
     *
     * @param ZZangus $recommendToZangu
     */
    public function setRecommendToZangu(\ZZangus $recommendToZangu)
    {
        $this->recommendToZangu = $recommendToZangu;
    }

    /**
     * Get recommendToZangu
     *
     * @return ZZangus 
     */
    public function getRecommendToZangu()
    {
        return $this->recommendToZangu;
    }
}