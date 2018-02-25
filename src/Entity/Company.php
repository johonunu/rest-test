<?php

// Bfr/CrmBundle/Entity/Company.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="companies")
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Company {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank(message = "Company.Profile.Name.Empty")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Assert\NotBlank(message = "Company.Profile.Name.Empty")
     * @Expose
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=20,nullable=true)
     * @Assert\NotBlank(message = "Company.Profile.Name.Empty")
     */
    protected $zip;

    /**
     * @ORM\Column(type="string", length=220,nullable=true)
     * @Assert\NotBlank(message = "Company.Profile.Name.Empty")
     */
    protected $city;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country")
     */
    protected $country;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @Assert\Regex(pattern="/\d+/", message="Company.Profile.Employee.WrongType")
     */
    protected $employees;

    /**
     * @ORM\Column(type="string", length=200,nullable=true)
     */
    protected $contact_name;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    protected $contact_title;

    /**
     * @ORM\Column(type="string", length=50,nullable=true)
     */
    protected $contact_phone;

    /**
     * @ORM\Column(type="string", length=250,nullable=true)
     *
     * @Assert\Email(message = "Company.Profile.ContactEmail.NotValid")
     * @Expose
     */
    protected $contact_email;

    /**
     * @ORM\Column(type="decimal", precision=8,scale=2,nullable=true)
     *
     * @Assert\Regex(pattern="/\d+/", message="Company.Profile.Employee.WrongType")
     */
    protected $rate;

    /**
     * @ORM\Column(type="date")
     */
    protected $created;


    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $updated;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $archived;

    
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(type="string", length=30,nullable=true)
     */
    protected $external_id;

    /**
     * @Expose()
     * @Groups({"demo"})
     * @ORM\ManyToMany(targetEntity="\App\Entity\Tag", cascade={"persist"},inversedBy="companies")
     * @ORM\JoinTable(name="company_tags",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    private $tags;


    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->archived = false;
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updated = new \DateTime();
    }


    public function __construct() {
        $this->tags = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set address
     *
     * @param string $address
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Company
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set employees
     *
     * @param integer $employees
     * @return Company
     */
    public function setEmployees($employees)
    {
        $this->employees = $employees;

        return $this;
    }

    /**
     * Get employees
     *
     * @return integer
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Set contact_name
     *
     * @param string $contactName
     * @return Company
     */
    public function setContactName($contactName)
    {
        $this->contact_name = $contactName;

        return $this;
    }

    /**
     * Get contact_name
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * Set contact_title
     *
     * @param string $contactTitle
     * @return Company
     */
    public function setContactTitle($contactTitle)
    {
        $this->contact_title = $contactTitle;

        return $this;
    }

    /**
     * Get contact_title
     *
     * @return string
     */
    public function getContactTitle()
    {
        return $this->contact_title;
    }

    /**
     * Set contact_phone
     *
     * @param string $contactPhone
     * @return Company
     */
    public function setContactPhone($contactPhone)
    {
        $this->contact_phone = $contactPhone;

        return $this;
    }

    /**
     * Get contact_phone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * Set contact_email
     *
     * @param string $contactEmail
     * @return Company
     */
    public function setContactEmail($contactEmail)
    {
        $this->contact_email = $contactEmail;

        return $this;
    }

    /**
     * Get contact_email
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contact_email;
    }


    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Company
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Company
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    public function getAddressString() {
        if(strlen($this->address) && $this->zip && strlen($this->city)) {
            $str = $this->address .','.$this->zip.','.$this->city;
            if($this->getCountry()) $str .= ','.$this->getCountry()->getCountryName();
            return $str;
        }
        else return '';
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     * @return Company
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Set rate
     *
     * @param decimal $rate
     * @return Company
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set country
     *
     * @param \App\Entity\Country $country
     * @return Company
     */
    public function setCountry(\App\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \App\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Company
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set external_id
     *
     * @param string $externalId
     * @return Company
     */
    public function setExternalId($externalId)
    {
        $this->external_id = $externalId;

        return $this;
    }

    /**
     * Get external_id
     *
     * @return string 
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * Add tag
     *
     * @param \App\Entity\Tag $tag
     *
     * @return Company
     */
    public function addTag(\App\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \App\Entity\Tag $tag
     */
    public function removeTag(\App\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Toggles archived status
     */
    public function toggleArchived(){
        $this->setArchived(!$this->getArchived());
    }

}
