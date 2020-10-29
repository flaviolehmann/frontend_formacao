<?php


namespace App\Services;


use App\Models\Automovel;
use App\Repositories\AutomovelRepository;
use Throwable;

class AutomovelService
{
    /**
     * @var AutomovelRepository
     */
    private $automovelRepository;


    /**
     * AutomovelService constructor.
     * @param AutomovelRepository $automovelRepository
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

    public function updateAutomovel($request, $id)
    {
        try {
            $automovel = $this->automovelRepository->get($id);
            $automovel->fill($request->except('id'));
            $this->automovelRepository->save($automovel);

            return $automovel;
        } catch (Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

    public function destroyAutomovel(int $idAutomovel)
    {
        $this->automovelRepository->delete($idAutomovel);
    }

}
