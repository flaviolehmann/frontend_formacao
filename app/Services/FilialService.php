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

    public function destroyFilial(int $idFilial)
    {
        $this->filialRepository->delete($idFilial);
    }

    public function updateFilial($request, $id)
    {
        try {
            $filial = $this->filialRepository->get($id);
            $filial->fill($request->except(['id']));
            $filial = $this->filialRepository->save($filial);

            return $filial;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

}
