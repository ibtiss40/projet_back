<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateBirth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

   

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="id_client")
     */
    private $id_experience;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="client")
     */
    private $id_formation;

    /**
     * @ORM\OneToMany(targetEntity=Competence::class, mappedBy="client")
     */
    private $id_competence;

    /**
     * @ORM\OneToMany(targetEntity=Loisir::class, mappedBy="client")
     */
    private $id_loisir;

    /**
     * @ORM\OneToMany(targetEntity=Langue::class, mappedBy="client")
     */
    private $id_langue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $genre;

    /**
     * @ORM\OneToMany(targetEntity=Projet::class, mappedBy="client")
     */
    private $id_projet;

    public function __construct()
    {
        $this->id_experience = new ArrayCollection();
        $this->id_formation = new ArrayCollection();
        $this->id_competence = new ArrayCollection();
        $this->id_loisir = new ArrayCollection();
        $this->id_langue = new ArrayCollection();
        $this->id_projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    public function getUsername(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getDateBirth(): ?string
    {
        return $this->dateBirth;
    }

    public function setDateBirth(string $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
     * @return Collection|Experience[]
     */
    public function getIdExperience(): Collection
    {
        return $this->id_experience;
    }

    public function addIdExperience(Experience $idExperience): self
    {
        if (!$this->id_experience->contains($idExperience)) {
            $this->id_experience[] = $idExperience;
            $idExperience->setIdClient($this);
        }

        return $this;
    }

    public function removeIdExperience(Experience $idExperience): self
    {
        if ($this->id_experience->removeElement($idExperience)) {
            // set the owning side to null (unless already changed)
            if ($idExperience->getIdClient() === $this) {
                $idExperience->setIdClient(null);
            }
        }

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getIdFormation(): Collection
    {
        return $this->id_formation;
    }

    public function addIdFormation(Formation $idFormation): self
    {
        if (!$this->id_formation->contains($idFormation)) {
            $this->id_formation[] = $idFormation;
            $idFormation->setClient($this);
        }

        return $this;
    }

    public function removeIdFormation(Formation $idFormation): self
    {
        if ($this->id_formation->removeElement($idFormation)) {
            // set the owning side to null (unless already changed)
            if ($idFormation->getClient() === $this) {
                $idFormation->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getIdCompetence(): Collection
    {
        return $this->id_competence;
    }

    public function addIdCompetence(Competence $idCompetence): self
    {
        if (!$this->id_competence->contains($idCompetence)) {
            $this->id_competence[] = $idCompetence;
            $idCompetence->setClient($this);
        }

        return $this;
    }

    public function removeIdCompetence(Competence $idCompetence): self
    {
        if ($this->id_competence->removeElement($idCompetence)) {
            // set the owning side to null (unless already changed)
            if ($idCompetence->getClient() === $this) {
                $idCompetence->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Loisir[]
     */
    public function getIdLoisir(): Collection
    {
        return $this->id_loisir;
    }

    public function addIdLoisir(Loisir $idLoisir): self
    {
        if (!$this->id_loisir->contains($idLoisir)) {
            $this->id_loisir[] = $idLoisir;
            $idLoisir->setClient($this);
        }

        return $this;
    }

    public function removeIdLoisir(Loisir $idLoisir): self
    {
        if ($this->id_loisir->removeElement($idLoisir)) {
            // set the owning side to null (unless already changed)
            if ($idLoisir->getClient() === $this) {
                $idLoisir->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getIdLangue(): Collection
    {
        return $this->id_langue;
    }

    public function addIdLangue(Langue $idLangue): self
    {
        if (!$this->id_langue->contains($idLangue)) {
            $this->id_langue[] = $idLangue;
            $idLangue->setClient($this);
        }

        return $this;
    }

    public function removeIdLangue(Langue $idLangue): self
    {
        if ($this->id_langue->removeElement($idLangue)) {
            // set the owning side to null (unless already changed)
            if ($idLangue->getClient() === $this) {
                $idLangue->setClient(null);
            }
        }

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGenre(): ?int
    {
        return $this->genre;
    }

    public function setGenre(int $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getIdProjet(): Collection
    {
        return $this->id_projet;
    }

    public function addIdProjet(Projet $idProjet): self
    {
        if (!$this->id_projet->contains($idProjet)) {
            $this->id_projet[] = $idProjet;
            $idProjet->setClient($this);
        }

        return $this;
    }

    public function removeIdProjet(Projet $idProjet): self
    {
        if ($this->id_projet->removeElement($idProjet)) {
            // set the owning side to null (unless already changed)
            if ($idProjet->getClient() === $this) {
                $idProjet->setClient(null);
            }
        }

        return $this;
    }
    public function eraseCredentials()
    {
    }
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
}
