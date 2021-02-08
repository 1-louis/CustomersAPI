<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategoriesRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

use Symfony\Component\Validator\Constraint as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;
use App\Controller\CustomersUpdateAtController;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 * @var \DateTimeInterface
 *
 *@ApiResource(
 *     attributes={
 *           "order"={"createdAt":"DESC"}
 *     },
 *    collectionOperations={
 *                      "get"= {"normalization_context"={"groups"={"readE"}}
 *          },"post"
 *
 *   },
 *
 *     itemOperations={
 *              "get"={"normalization_context"={"groups"={"Effectif_details_read"}}
 *      },
 *         "put",
 *          "patch",
 *            "delete",
 *       "Update-AT"={
 *                  "method"="POST",
 *                  "path"="/customers/{id}/Update-at",
 *                  "controller"=CustomersUpdateAtController::class,
 *              },
 *   }
 *  )
 * @ApiFilter(SearchFilter::class, properties={"id","partial"})
 */
class customers
{
    use ResourceId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     *
     */
    private $RAISON_SOCIALE;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     *
     */
    private $NOM_CONTACT;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     *
     */
    private $PRENOM_CONTACT;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Groups({"customers:readE","Effectif_details_read"})
     *
     */
    private $CIVILITE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     *
     */
    private $FONCTION;


    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"customers:readE","Effectif_details_read"})
     */
    private $TEL_CONTACT;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $PORTABLE_CONTACT;

    /**
     * @ORM\Column(type="string",  length=180, nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $EMAIL_CONTACT;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $ADRESSE_1;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $ADRESSE_2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $CODE_POSTAL_ENTREPRISE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $VILLE_ENTREPRISE;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $TELEPHONE_ENTREPRISE;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"readE","Effectif_details_read"})
     */
    private $EFFECTIF;


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

    public function getRAISONSOCIALE(): ?string
    {
        return $this->RAISON_SOCIALE;
    }

    public function setRAISONSOCIALE(?string $RAISON_SOCIALE): self
    {
        $this->RAISON_SOCIALE = $RAISON_SOCIALE;

        return $this;
    }

    public function getNOMCONTACT(): ?string
    {
        return $this->NOM_CONTACT;
    }

    public function setNOMCONTACT(?string $NOM_CONTACT): self
    {
        $this->NOM_CONTACT = $NOM_CONTACT;

        return $this;
    }

    public function getPRENOMCONTACT(): ?string
    {
        return $this->PRENOM_CONTACT;
    }

    public function setPRENOMCONTACT(?string $PRENOM_CONTACT): self
    {
        $this->PRENOM_CONTACT = $PRENOM_CONTACT;

        return $this;
    }

    public function getCIVILITE(): ?string
    {
        return $this->CIVILITE;
    }

    public function setCIVILITE(?string $CIVILITE): self
    {
        $this->CIVILITE = $CIVILITE;

        return $this;
    }

    public function getFONCTION(): ?string
    {
        return $this->FONCTION;
    }

    public function setFONCTION(?string $FONCTION): self
    {
        $this->FONCTION = $FONCTION;

        return $this;
    }

    public function getTELCONTACT(): ?int
    {
        return $this->TEL_CONTACT;
    }

    public function setTELCONTACT(?int $TEL_CONTACT): self
    {
        $this->TEL_CONTACT = $TEL_CONTACT;

        return $this;
    }

    public function getPORTABLECONTACT(): ?int
    {
        return $this->PORTABLE_CONTACT;
    }

    public function setPORTABLECONTACT(?int $PORTABLE_CONTACT): self
    {
        $this->PORTABLE_CONTACT = $PORTABLE_CONTACT;

        return $this;
    }

    public function getEMAILCONTACT(): ?string
    {
        return $this->EMAIL_CONTACT;
    }

    public function setEMAILCONTACT(string $EMAIL_CONTACT): self
    {
        $this->EMAIL_CONTACT = $EMAIL_CONTACT;

        return $this;
    }

    public function getADRESSE1(): ?string
    {
        return $this->ADRESSE_1;
    }

    public function setADRESSE1(?string $ADRESSE_1): self
    {
        $this->ADRESSE_1 = $ADRESSE_1;

        return $this;
    }

    public function getADRESSE2(): ?string
    {
        return $this->ADRESSE_2;
    }

    public function setADRESSE2(?string $ADRESSE_2): self
    {
        $this->ADRESSE_2 = $ADRESSE_2;

        return $this;
    }

    public function getCODEPOSTALENTREPRISE(): ?int
    {
        return $this->CODE_POSTAL_ENTREPRISE;
    }

    public function setCODEPOSTALENTREPRISE(?int $CODE_POSTAL_ENTREPRISE): self
    {
        $this->CODE_POSTAL_ENTREPRISE = $CODE_POSTAL_ENTREPRISE;

        return $this;
    }

    public function getVILLEENTREPRISE(): ?string
    {
        return $this->VILLE_ENTREPRISE;
    }

    public function setVILLEENTREPRISE(?string $VILLE_ENTREPRISE): self
    {
        $this->VILLE_ENTREPRISE = $VILLE_ENTREPRISE;

        return $this;
    }

    public function getTELEPHONEENTREPRISE(): ?int
    {
        return $this->TELEPHONE_ENTREPRISE;
    }

    public function setTELEPHONEENTREPRISE(?int $TELEPHONE_ENTREPRISE): self
    {
        $this->TELEPHONE_ENTREPRISE = $TELEPHONE_ENTREPRISE;

        return $this;
    }

    public function getEFFECTIF(): ?int
    {
        return $this->EFFECTIF;
    }

    public function setEFFECTIF(?int $EFFECTIF): self
    {
        $this->EFFECTIF = $EFFECTIF;

        return $this;
    }



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
}
