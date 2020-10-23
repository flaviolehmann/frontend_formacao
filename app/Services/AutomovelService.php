<?php


namespace App\Services;


use App\Models\Automovel;
use App\Repositories\AutomovelRepository;

class AutomovelService
{
    /**
     * @var AutomovelRepository
     */
    private $automovelRepository;


    /**
     * AutomovelService constructor.
     */
    public function __construct(
        AutomovelRepository $automovelRepository
    )
    {
        $this->automovelRepository = $automovelRepository;
    }

    public function createAutomovel($automovel)
    {
        return $this->automovelRepository->save(new Automovel($automovel));
    }

    public function destroyAutomovel(int $idAutomovel) {
        $this->automovelRepository->delete($idAutomovel);
    }

}
