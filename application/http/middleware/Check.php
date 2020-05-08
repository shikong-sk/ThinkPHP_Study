<?php

namespace app\http\middleware;

use think\Request;

class Check
{
    public function handle(Request $request, \Closure $next,$arg)
    {
        echo "\$arg = $arg <br> \n";
        echo "触发 middleware <br> \n";

        if($request->param("name") == "index")
        {
//            return redirect('\inject\index\test');
            return redirect('\index');
        }
        if(!$request->has("name"))
        {
            $request->name = "middleware";
        }

        echo "\$name = " . $request->name . " <br> \n";

        return $next($request);
    }
}
