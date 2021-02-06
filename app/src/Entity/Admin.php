<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\CustomersRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use DateTimeInterface;
/**
 * @ORM\Entity(repositoryClass=CustomersRepository::class)
 * @var \DateTimeInterface
 * @ApiResource(
 *     paginationItemsPerPage=3,
 *    collectionOperations={
 *                      "get"= {"normalization_context"={"groups"={"Customers_read"}}
 *          },"post"
 *     },
 *
 *     itemOperations={
 *
 *              "get"={"normalization_context"={"groups"={"Customers_details_read"}}
 *      },"put",
 *         "patch",
 *          "delete",
 *
 *
 *     }
 *  )
 */
class Admin implements UserInterface
{
    use ResourceId;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups ({"Customers_read","Customers_details_read"})
     */
    private $EMAIL;

    /**
     * @ORM\Column(type="json")
     *
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Customers::class, mappedBy="Effec_id")
     */
    private $effectifs_id;

    /**
     * @var DateTimeInterface
     * @ORM\Column(type="datetime", nullable=false)
     */
    private DateTimeInterface $createdAt;
    /**
     * @var DateTimeInterface
     * @ORM\Column(type="datetime", nullable=true)
     */
    private  ?DateTimeInterface $updateAt;

    ////////////////////////////////////////////////////
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }


       public function setCreatedAt(\DateTimeInterface $createdAt)
       {
           $this->createdAt = $createdAt;
           return $this;
       }


    public function getUpdateAt(): ?DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?DateTimeInterface $updateAt)
    {
        $this->updateAt = $updateAt;
        return $this;
    }
//////////////////////////////////////////////////////////////////
   public function __construct()
    {
        $this->effectifs_id = new ArrayCollection();
    }



    public function getEMAIL(): ?string
    {
        return $this->EMAIL;
    }

    public function setEMAIL(string $EMAIL): self
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->EMAIL_CONTACT;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }



    ///////////////////////////////////////////////////////
    ///

    /**
     * @return Collection|Customers[]
     */
    public function getEffectifsId(): Collection
    {
        return $this->effectifs_id;
    }

    public function addEffectifsId(Customers $effectifsId): self
    {
        if (!$this->effectifs_id->contains($effectifsId)) {
            $this->effectifs_id[] = $effectifsId;
            $effectifsId->setEffecId($this);
        }

        return $this;
    }

    public function removeEffectifsId(Customers $effectifsId): self
    {
        if ($this->effectifs_id->removeElement($effectifsId)) {
            // set the owning side to null (unless already changed)
            if ($effectifsId->getEffecId() === $this) {
                $effectifsId->setEffecId(null);
            }
        }

        return $this;
    }





}
