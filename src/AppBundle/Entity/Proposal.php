<?php

namespace AppBundle\Entity;
use Symfony\Component\HttpFoundation\File\File;


/**
 * Proposal
 */
class Proposal
{

    private $proposalFile;

    public function setProposalFile(File $proposal = null)
    {
        $this->proposalFile = $proposal;

        if ($proposal) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getDocumentFile()
    {
        return $this->proposalFile;
    }



    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $createdAt;


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
     * Set number
     *
     * @param string $number
     *
     * @return Proposal
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Proposal
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * @var \AppBundle\Entity\Client
     */
    private $client;

    /**
     * @var \AppBundle\Entity\Job
     */
    private $job;



    public function setClient(\AppBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }


    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set job
     *
     * @param \AppBundle\Entity\Job $job
     *
     * @return Proposal
     */
    public function setJob(\AppBundle\Entity\Job $job = null)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \AppBundle\Entity\Job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @var int
     */
    private $status;


    /**
     * Set status
     *
     * @param \int $status
     *
     * @return Proposal
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \int
     */
    public function getStatus()
    {
        return $this->status;
    }




    /**
     * @var string
     */
    private $proposalName;


    /**
     * Set proposalName
     *
     * @param string $proposalName
     *
     * @return Proposal
     */
    public function setProposalName($proposalName)
    {
        $this->proposalName = $proposalName;

        return $this;
    }

    /**
     * Get proposalName
     *
     * @return string
     */
    public function getProposalName()
    {
        return $this->proposalName;
    }
}
