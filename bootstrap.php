<?php 
    define('_DIR_ROOT',__DIR__);

    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'){
        $web_root = 'https://'.$_SERVER['HTTP_HOST'];
    }else{
        $web_root = 'http://'.$_SERVER['HTTP_HOST'];
    }
    $dirRoot = str_replace('\\', '/', _DIR_ROOT);

    $documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
    
    $folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));
    
    $web_root = $web_root.$folder;
    
    define('_WEB_ROOT', $web_root);


    $configs_dir = scandir('../blog_php/app/configs');
    if(!empty($configs_dir)){
        foreach($configs_dir as $item){
            if($item!='.'&& $item!='..' && file_exists('../blog_php/app/configs/'.$item)){
                require_once '../blog_php/app/configs/'.$item;
            }
        }
    }
    require_once '../blog_php/core/Route.php';
    require_once '../blog_php/core/Session.php';
    require_once '../blog_php/app/App.php';

    if(!empty($config['database'])){
        $db_config = array_filter($config['database']);
        if(!empty($db_config)){
            require_once '../blog_php/core/Connection.php';
            require_once '../blog_php/core/QueryBuilder.php';
           require_once '../blog_php/core/Database.php';
           require_once '../blog_php/core/DB.php';
        }
    }
    require_once '../blog_php/core/Model.php';
    require_once '../blog_php/core/Controller.php';
    require_once '../blog_php/core/Request.php';
    require_once '../blog_php/core/Response.php';
?>