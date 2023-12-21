<?php
namespace App\Http\Middleware;
use Closure;

class SecureHeaders
{
    // Enumerate headers which you do not want in your application's responses.
    // Great starting point would be to go check out @Scott_Helme's:
    // https://securityheaders.com/
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];
    public function handle($request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->headers->set('Content-Security-Policy', "default-src *; img-src * 'self' data: https:; style-src 'self' 'unsafe-inline' data: https:; script-src * 'self' 'unsafe-inline' 'unsafe-eval' data: https:; font-src 'self' data: https:;");

         $host = request()->getHost();
        if($host != 'opportal.sha.kerala.gov.in' && $host != '61.0.248.21' && $host != '10.5.69.181' && $host != '127.0.0.1'){
			return false;exit();
		} 
		
        if ($request->isMethod('head')) {
            // Return a response indicating that the method is not allowed
            return response()->json(['error' => 'Method not allowed'], 405);
        }
        
        return $response;
    }
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
}
?>
