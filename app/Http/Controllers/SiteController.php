<?php
namespace App\Http\Controllers;
use App\Services\NexarionState;
class SiteController extends Controller { public function index(){return view('site');} public function data(NexarionState $state){return response()->json(['ok'=>true,'data'=>$state->publicData()])->header('Cache-Control','no-store, no-cache, must-revalidate, max-age=0');} }
