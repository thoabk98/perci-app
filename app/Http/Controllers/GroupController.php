<?php

namespace App\Http\Controllers;

use App\Repositories\GroupRepository;
use App\Repositories\OfferRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class GroupController extends Controller
{
  private $groupRepository;
  private $offerRepository;

  public function __construct(GroupRepository $groupRepository, OfferRepository $offerRepository)
  {
    $this->groupRepository = $groupRepository;
    $this->offerRepository = $offerRepository;
  }

  public function index(Request $request)
  {
    // $groups = $this->groupRepository->getUserGroups(Auth::id());
    try {
      $groups = $this->groupRepository->getUserGroups(Auth::id());
      return response()->json($groups, Response::HTTP_OK);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return response()->json(['message' => 'Error occurred while getting groups info'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function store(Request $request)
  {
    $createParams = $request->only(['name']);

    try {
      $this->groupRepository->handleStoreUpdate(Auth::id(), $createParams);
      return response()->json(['message' => 'Created success'], Response::HTTP_CREATED);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return response()->json(['message' => 'Error occurred while creating group'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function update(Request $request, $groupId)
  {
    $createParams = $request->only(['name', 'start_date', 'end_date', 'status']);
    $createParams['start_date'] = Carbon::parse($createParams['start_date']);
    $createParams['end_date'] = Carbon::parse($createParams['end_date']);
    $offers = $request->input('offers');
    $offerId = [];
    try {
      if ($offers) {
        foreach ($offers as $offer) {
          array_push($offerId, $offer['id']);
        }
      }
      $this->groupRepository->handleStoreUpdate(Auth::id(), $createParams, $groupId);
      $this->offerRepository->updateWhereIn('id', $offerId, ['group_id' => $groupId]);
      return response()->json(['message' => 'Created success'], Response::HTTP_CREATED);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return response()->json(['message' => 'Error occurred while creating group'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function destroy(Request $request, $groupId)
  {
    try {
      $this->groupRepository->destroyByConditions(['user_id' => Auth::id(), 'id' => $groupId]);
      return response()->json(['message' => 'Deleted success'], Response::HTTP_NO_CONTENT);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return response()->json(['message' => 'Error occurred while deleting group'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function offers(Request $request, $groupId)
  {
    try {
      $offers = $this->offerRepository->findAllBy('group_id', $groupId);
      foreach ($offers as $offer) {
        $offer['revenue'] = 123;
        $offer['impressions'] = 142;
        $offer['conversion'] = 142;
        $offer['image'] = "https://via.placeholder.com/200x150.png";
      }
      return response()->json($offers, Response::HTTP_OK);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return response()->json(['message' => 'Error occurred while deleting group'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }
}
