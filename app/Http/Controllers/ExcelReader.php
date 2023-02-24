<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\PollingUnit;

class ExcelReader extends Controller
{
    public function index()
    {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load("files/gamawa.xlsx");

        $worksheet = $spreadsheet->getActiveSheet();
        
        
        $rows = [];
        
        
        foreach ($worksheet->getRowIterator() as $key => $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(TRUE);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                if($cell->getValue() !== "")
                    array_push($rowData, $cell->getValue());
                else
                    dd($rows);
            }
            
            // dd($rowData[2]);
            $wardInecRef = substr($rowData[2], 0, 8);
            
            $wardPayload = [
                "name" => $rowData[0], 
                "lga_id" => "106",
                "inec_ref" => $wardInecRef
            ]; 

            $pollingUnitPayload = [
                "name" => $rowData[1],
                "inec_ref" => $rowData[2],
                "registered_voters" => $rowData[3]
            ]; 

            $createWard = Ward::firstOrCreate(
                [ "name" => $rowData[0]], $wardPayload);

            
            $pollingUnit = PollingUnit::firstOrNew(["name" => $rowData[1]]);
            // dd($pollingUnit);
            $createPollingUnit = $createWard->pollingUnits()
            ->updateOrCreate(["name" => $rowData[1]], $pollingUnitPayload);
            
            array_push($rows, $rowData);
        }

        dd($rows);
    }
}
