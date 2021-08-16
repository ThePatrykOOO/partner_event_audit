<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Http\Resources\PartnerResource;
use App\Repositories\PartnerRepository;

class PartnerController extends Controller
{
    private PartnerRepository $partnerRepository;

    /**
     * PartnerController constructor.
     * @param PartnerRepository $partnerRepository
     */
    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function index()
    {
        $partners = $this->partnerRepository->index();
        return PartnerResource::collection($partners);
    }

    public function show(int $id)
    {
        $partner = $this->partnerRepository->show($id);
        return new PartnerResource($partner);
    }

    public function store(PartnerRequest $request)
    {
        $partner = $this->partnerRepository->store($request->all());
        return new PartnerResource($partner);
    }

    public function update(PartnerRequest $request, int $id)
    {
        $this->partnerRepository->update($request->validated(), $id);
    }

    public function delete(int $id)
    {
        $this->partnerRepository->delete($id);
    }
}
