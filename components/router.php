<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /*
     * returns request string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        /*
         * Get query string - Получить строку запроса
         */
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
//            var_dump($uriPattern);
            if (preg_match("~$uriPattern~", $uri)) {
//                var_dump($uri);die();
                //echo $path;
                /*				echo "<br>Где ищем (запрос, который набрал пользователь): ".$uri;
                                echo "<br>Что ищем (совпадение из правила): ".$uriPattern;
                                echo "<br>Кто обрабатывает: ".$path; */

                // Получаем внутренний путь из внешнего согласно правилу.

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                /*				echo '<br>Нужно сформулировать: '.$internalRoute.'<br>'; */

                $segments = explode('/', $internalRoute);


                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName = 'Action' . ucfirst(array_shift($segments));
//                echo '<br> Class:  ' .$controllerName;
//                echo '<br> Method: ' .$actionName;

                $url = explode('/',$uri);
//                var_dump($url);die();
                if(isset($url[1])){
                    $_GET['id'] = $url[1];
                }

                $parameters = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }


                $controllerObject = new $controllerName;
                /*$result = $controllerObject->$actionName($parameters); - OLD VERSION */
                /*$result = call_user_func(array($controllerObject, $actionName), $parameters);*/
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }

        }
    }
}