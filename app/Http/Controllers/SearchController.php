<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Google_Client;

class SearchController extends Controller
{

    function index(Request $request){
        $client = new Client();
        $search = $request->get("search");
        $page = $request->get("page");
        if (!$page){
            $page = 1;
        }
        $page = (int) $page;
        $page = ($page - 1) * 10;
        $url = "https://customsearch.googleapis.com/customsearch/v1?key=AIzaSyBao8WyNcSBwDwA6bLwxNeQcaqI9gj0fUg&cx=d9a84f4a81873226a&q=".$search."&start=".$page;
        $res = $client->get($url);
        $res = $res->getBody()->getContents();
        $res = $this->parseJSON($res);
        $pageNum = (int) $request->get("page");
        if ($pageNum == 0){
            $pageNum = 1;
        }
        return view('search', ["res"=>$res, "page"=>$pageNum]);
    }

    function parseJSON($json){
        $json = json_decode($json, true);
        return  $json["items"];
    }
}
