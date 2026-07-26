<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
 
class CertificateController extends Controller
{
    public function index(Request $request)
    {
        // TODO: $certificates = Certificate::with('student','course','batch')->latest()->paginate(15);
        $certificates = new LengthAwarePaginator([], 0, 15, 1, ['path' => $request->url()]);
 
        return view('admin.certificates.index', [
            'certificates'      => $certificates,
            'totalCertificates' => 2341,
            'issuedThisMonth'   => 183,
            'pendingIssue'      => 24,
        ]);
    }
 
    public function issue(Request $request, $id = null)
    {
        // Called from modal form (POST) — id=0 means new, or use student+course from form
        $request->validate([
            'student_id'  => 'required|integer',
            'course_id'   => 'required|integer',
            'issued_date' => 'required|date',
        ]);
 
        // TODO:
        // $certId = 'CERT-' . date('Y') . '-' . str_pad(Certificate::count() + 1, 4, '0', STR_PAD_LEFT);
        // Certificate::create([
        //   'certificate_id' => $certId,
        //   'student_id'     => $request->student_id,
        //   'course_id'      => $request->course_id,
        //   'issued_date'    => $request->issued_date,
        //   'status'         => 'Issued',
        // ]);
 
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate issued successfully.');
    }
 
    public function download($id)
    {
        // TODO: Generate PDF certificate and return as download
        // $certificate = Certificate::with('student','course')->findOrFail($id);
        // $pdf = Pdf::loadView('admin.certificates.template', compact('certificate'));
        // return $pdf->download("certificate-{$certificate->certificate_id}.pdf");
        return back()->with('info', 'PDF generation will be available once models are connected.');
    }
}
 