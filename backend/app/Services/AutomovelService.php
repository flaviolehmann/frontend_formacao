<?php


namespace App\Services;


use App\Models\Automovel;
use App\Repositories\AutomovelRepository;
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

class AutomovelService
{
    /**
     * @var AutomovelRepository
     */
    private $automovelRepository;


    /**
     * AutomovelService constructor.
<<<<<<< HEAD
     * @param AutomovelRepository $automovelRepository
=======
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
<<<<<<< HEAD
        } catch (Throwable $th) {
=======
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
            return response()->json($th->getMessage(), 404);
        }
    }

<<<<<<< HEAD
    public function destroyAutomovel(int $idAutomovel)
    {
=======
    public function destroyAutomovel(int $idAutomovel) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
        $this->automovelRepository->delete($idAutomovel);
    }

}
