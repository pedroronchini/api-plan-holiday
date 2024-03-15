<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanHoliday;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * @OA\Get(
 *     path="/generatePdfPlanHoliday/{id}",
 *     summary="Generate PDF for plan holiday",
 *     tags={"Plan Holiday"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Plan holiday ID",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *      @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="pdfUrl",
 *                 type="string",
 *                 description="URL of the generated PDF"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Plan holiday not found"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *      )
 *  ) 
 */
class PdfController extends Controller
{
    public function generatePdf($id) {
        $planHoliday = PlanHoliday::find($id);

        if (!$planHoliday) {
            return response()->json(['error' => 'Plan holiday not found'], 404);
        }

        try {
            $html = view('pdf.template', compact('planHoliday'))->render();
    
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
    
            $dompdf = new Dompdf($options);
    
            $dompdf->loadHtml($html);
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $pdfContent = $dompdf->output();
            $pdfPath = storage_path('app/public/pdf/plan-holiday-'.$id.'.pdf');
            file_put_contents($pdfPath, $pdfContent);
    
            $pdfUrl = asset('storage/pdf/plan-holiday-'.$id.'.pdf');
    
            return response()->json(['pdfUrl' => $pdfUrl], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
