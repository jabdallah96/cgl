<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RequestJob
 */
class RequestJob
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var \DateTime
     */
    private $visit_date;

    /**
     * @var string
     */
    private $job_type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $item;

    /**
     * @var \AppBundle\Entity\Client
     */
    private $client;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->item = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return RequestJob
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set visitDate
     *
     * @param \DateTime $visitDate
     *
     * @return RequestJob
     */
    public function setVisitDate($visitDate)
    {
        $this->visit_date = $visitDate;

        return $this;
    }

    /**
     * Get visitDate
     *
     * @return \DateTime
     */
    public function getVisitDate()
    {
        return $this->visit_date;
    }

    /**
     * Set jobType
     *
     * @param string $jobType
     *
     * @return RequestJob
     */
    public function setJobType($jobType)
    {
        $this->job_type = $jobType;

        return $this;
    }

    /**
     * Get jobType
     *
     * @return string
     */
    public function getJobType()
    {
        return $this->job_type;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\Item $item
     *
     * @return RequestJob
     */
    public function addItem(\AppBundle\Entity\Item $item)
    {
        $this->item[] = $item;
        $item->setRequestJob($this);
        return $this;
    }

    public function setSongs(ArrayCollection $items)
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\Item $item
     */
    public function removeItem(\AppBundle\Entity\Item $item)
    {
        $this->item->removeElement($item);
    }

    /**
     * Get item
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return RequestJob
     */
    public function setClient(\AppBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
