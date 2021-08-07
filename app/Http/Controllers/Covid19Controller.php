<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Covid19Controller extends Controller
{
    public function index(Request $request)
    {
        // Get api nya, tidak perlu pake cURL lagi sudah ada HTTP/Guzzle
        $covidGlobal = Http::get('https://api.kawalcorona.com/');
        $covidGlobalJson = $covidGlobal->json();
		$countryList = [];

		foreach ($covidGlobalJson as $key => $value) {
			array_push($countryList, $value['attributes']['Country_Region']);
		}

        if ($request->has('country')) {
            $country = $request->get('country');
        } else {
            $country = 'Indonesia';
        }

        $countCovidGlobal = count($covidGlobalJson);

        $result = $this->searchByCountry($covidGlobalJson, $countCovidGlobal, $country);
        $finalResult = [];
        $substringDate = substr($covidGlobalJson[$result]['attributes']['Last_Update'], 0, 10);
        // $convertToDate = date('D, M Y H:i:s', $substringDate);
        $convertToDate = $this->dateIndo(date('Y-m-d', $substringDate));
        $resultTimes = $convertToDate.' '.date('H:i:s', $substringDate);

        if ($result == -1) {
            $finalResult[] = [];
        } else {
            $finalResult[] = [
                'country_name' => $covidGlobalJson[$result]['attributes']['Country_Region'],
                'last_update' => $resultTimes,
                'latitude' => $covidGlobalJson[$result]['attributes']['Lat'],
                'longitude' => $covidGlobalJson[$result]['attributes']['Long_'],
                'confirmed' => $covidGlobalJson[$result]['attributes']['Confirmed'],
                'deaths' => $covidGlobalJson[$result]['attributes']['Deaths'],
                'recovered' => $covidGlobalJson[$result]['attributes']['Recovered'],
                'active' => $covidGlobalJson[$result]['attributes']['Active'],
            ];
        }

        // dd($finalResult);
        // Passing ke view
        return view('index', [
			'countryList' => $countryList,
            'dataList' => $finalResult,
            'country' => $country
		]);
    }   

    private function dateIndo($date)
    {
        $day = date('D', strtotime($date));
        $dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
        // Key akan otomatis increment
        $months = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April', 
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober', 
            'November',
            'Desember'
        );
        $split = explode('-', $date);
        return $dayList[$day].', '.$split[2].' '.$months[(int)$split[1]].' '.$split[0];
    }

    private function searchByCountry(array $data, $countData, $search = '')
    {
        if (!empty($data)) {
            for ($i = $countData - 1; $i > -2; $i--) { 
                if ($i == -1 || $data[$i]['attributes']['Country_Region'] == $search) {
                    return $i;
                }
            }
        }
    }
}
