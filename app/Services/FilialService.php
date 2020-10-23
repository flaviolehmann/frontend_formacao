<?php


namespace App\Services;


use App\Models\Filial;
use App\Repositories\FilialRepository;

class FilialService
{
    /**
     * @var FilialRepository
     */
    private $filialRepository;

    /**
     * FilialService constructor.
     * @param FilialRepository $filialRepository
     */
    public function __construct(
        FilialRepository $filialRepository
    )
    {
        $this->filialRepository = $filialRepository;
    }

    public function createFilial($filial)
    {
        return $this->filialRepository->save(new Filial($filial));
    }

}
