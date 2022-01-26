<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Support\Facades\Neonomics;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        //
    }

    // get list of all available banks
    // or check for query filter
    public function index(Request $request)
    {
        $token = 'eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJ2MmFQNDdIQXVTUi1qWmR5U3otNDVDV2RaOFhiWGFBMXNDbWhLbWtJLXRvIn0.eyJleHAiOjE2NDMyMzU0NTIsImlhdCI6MTY0MzE0OTA1MiwianRpIjoiOTJlNTI1NjUtMTM5NS00Y2YxLTk1NTMtMjBjMDBmNDI4MWJhIiwiaXNzIjoiaHR0cHM6Ly9zYW5kYm94Lm5lb25vbWljcy5pby9hdXRoL3JlYWxtcy9zYW5kYm94Iiwic3ViIjoiZmQ5MDRiMTctM2Y4Ni00NDFhLTkwODEtNmI0MmVhNDU5NjQ5IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiZjM5YWM5NWYtZjliOC00Y2FkLTkyOWItOTMwMTM2YTc5ZWM0Iiwic2Vzc2lvbl9zdGF0ZSI6Ijk4MWY4M2FhLTdmZjgtNGJmOS1hMjk3LTAyM2Q1MGNhYTAxNyIsImFjciI6IjEiLCJzY29wZSI6Im9wZW5pZCBiYW5xYnJpZGdlX2NsaWVudCIsIm9yZ2FuaXphdGlvbklkIjoiNjY3Y2YyM2ItNDMzOC00OGVhLWIyMjUtMThjOTlkYzJkNjY2IiwiY2xpZW50SWQiOiJmMzlhYzk1Zi1mOWI4LTRjYWQtOTI5Yi05MzAxMzZhNzllYzQiLCJjbGllbnRIb3N0IjoiNTQuODYuNTAuMTM5IiwiY2tpZCI6IjdlYmI5MGE5LTdlNTctNDA0MS05MTc4LWU5YjA3MmQ1MTZiOSIsImNsaWVudEFkZHJlc3MiOiI1NC44Ni41MC4xMzkifQ.Q1v950ThGBTpl7hjt7QnePkDVuj0mDlAc1XggfDGNVW7_G0siblCq8pq9LHjU-PJpxx6drdDWtXpmNER_6k8aV_ZE4UpPJJudVUGHC3r5MeH35IHIxO7q4Od4qN1jxlxpbMgRC3Sk1cN_4rJWk48RJx15xdRVej5Kl86StIQHGGcAGnjhwJmUcLFnGEcrP0LQdePZ83gOZfqfKA9HYSDBrfpG_10FsElChCGDoPD7v66-YrAy1s296U8mkBY_fQfilSH2duSOp7bdZoso6ZctjlqhaK25eRVWFH3yZhnQqM5dcQ5uy6zgQ1FE5VA0s1IAbnuo5Hg-Qm_pI86zNfVAg';
        $filter = $request->has('countryCode') ? 'countryCode='.$request->query('countryCode') : ($request->has('name') ? 'name='.$request->query('name') : (false));
        if ($filter) {
            return Neonomics::getBanksByFilter($token, $filter);
        }
        return Neonomics::getBanks($token);
    }

    public function show($id)
    {
        $token = 'eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJ2MmFQNDdIQXVTUi1qWmR5U3otNDVDV2RaOFhiWGFBMXNDbWhLbWtJLXRvIn0.eyJleHAiOjE2NDMyMzU0NTIsImlhdCI6MTY0MzE0OTA1MiwianRpIjoiOTJlNTI1NjUtMTM5NS00Y2YxLTk1NTMtMjBjMDBmNDI4MWJhIiwiaXNzIjoiaHR0cHM6Ly9zYW5kYm94Lm5lb25vbWljcy5pby9hdXRoL3JlYWxtcy9zYW5kYm94Iiwic3ViIjoiZmQ5MDRiMTctM2Y4Ni00NDFhLTkwODEtNmI0MmVhNDU5NjQ5IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiZjM5YWM5NWYtZjliOC00Y2FkLTkyOWItOTMwMTM2YTc5ZWM0Iiwic2Vzc2lvbl9zdGF0ZSI6Ijk4MWY4M2FhLTdmZjgtNGJmOS1hMjk3LTAyM2Q1MGNhYTAxNyIsImFjciI6IjEiLCJzY29wZSI6Im9wZW5pZCBiYW5xYnJpZGdlX2NsaWVudCIsIm9yZ2FuaXphdGlvbklkIjoiNjY3Y2YyM2ItNDMzOC00OGVhLWIyMjUtMThjOTlkYzJkNjY2IiwiY2xpZW50SWQiOiJmMzlhYzk1Zi1mOWI4LTRjYWQtOTI5Yi05MzAxMzZhNzllYzQiLCJjbGllbnRIb3N0IjoiNTQuODYuNTAuMTM5IiwiY2tpZCI6IjdlYmI5MGE5LTdlNTctNDA0MS05MTc4LWU5YjA3MmQ1MTZiOSIsImNsaWVudEFkZHJlc3MiOiI1NC44Ni41MC4xMzkifQ.Q1v950ThGBTpl7hjt7QnePkDVuj0mDlAc1XggfDGNVW7_G0siblCq8pq9LHjU-PJpxx6drdDWtXpmNER_6k8aV_ZE4UpPJJudVUGHC3r5MeH35IHIxO7q4Od4qN1jxlxpbMgRC3Sk1cN_4rJWk48RJx15xdRVej5Kl86StIQHGGcAGnjhwJmUcLFnGEcrP0LQdePZ83gOZfqfKA9HYSDBrfpG_10FsElChCGDoPD7v66-YrAy1s296U8mkBY_fQfilSH2duSOp7bdZoso6ZctjlqhaK25eRVWFH3yZhnQqM5dcQ5uy6zgQ1FE5VA0s1IAbnuo5Hg-Qm_pI86zNfVAg';
        return Neonomics::getBankByID($token, $id);
    }
}
