<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Класс для управления маршрутами и подклюючениями файлов
 *
 * @author Озармехр
 */
class Router {
    
    private $routes; // маршруты
    public $count_match;


    /**
     * Конструкция класса
     * @return boolean
     */
    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);
        /*foreach ($this->routes as $key => $val)
            echo $key."=>".$val."<br>";*/
    }
    
    public function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
      }
    }

    public function run(){
        // Получить строку запроса
        $uri = $this->getUri();
        if($uri === 'user/logout' )
        {
            session_destroy();
            header("Location: /");
        }
        $noMatch = 0;
        $v = false;
      // Проверить наличие такого запроса в router.php ($this->routes)
      foreach ($this->routes as $uriPattern => $path)
      {
         
          
          //require_once ROOT.'/views/ErrorPage.php';
          if(preg_match("~^$uriPattern$~", $uri))
          {
              //echo 'Ключ в массиве-> '.$uriPattern."<br> url сайта->".$uri;
              $this->count_match += 1;
              /**
               * $uriPattern - шаблон который нам нужен эти пути находятся в $routes.php (индекс массива, задано как имя)
               * например в $routes.php user/([0-9]+) = user/$1 а user/([0-9]+) является шаблоном
               * $path - куда вставить, то есть берем шаблон и user/$1 вместо $1 поставим значения
               * $uri - откуда берутся данные для вставки, это из url
               */
              $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
              
              $routes_val_segments = explode("/", $internalRoute); // убираем знак слэш
              
              $controllerName = array_shift($routes_val_segments)."Controller"; // Создание имени контроллера
              
              $controllerName = ucfirst($controllerName); // сделаем большой буквой
              
              $actionName = "action".ucfirst(array_shift($routes_val_segments)); // создание название метода
              
              $parametrs = $routes_val_segments; // параметры для передачи в метод
              
              
              $controllerFile = ROOT."/controllers/".$controllerName.".php"; // название файла подключаемого контроллера
              if (file_exists($controllerFile)) // если такое контроллер существует 
              {
                  include_once ($controllerFile); // подключить файл контроллер
              }
              
              $controllerObject = new $controllerName; // создание объект класса контроллера
              
             // $result = $controllerObject->$actionName($parametrs); // вызов метода (varible) $actionName
       
             $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);
              if($result != null) // если все ок
              {
                  break;        // выйти из цикла
              }  
          }
          else{ $noMatch+=1; $v = false;}
          
          
      }
      //echo "<br>Нет совпадений = $noMatch";      
      //echo '<br> Размер мессива '.count($this->routes);
      //echo "<br>Количество совпадений = $this->count_match";
      if($this->count_match == null && $noMatch == count($this->routes))
      {
          require_once ROOT.'/views/ErrorPage.php';
      }
      
    
    }
}
