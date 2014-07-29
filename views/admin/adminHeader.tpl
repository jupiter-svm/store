{* Хедер *}
<html>
    <head>
        <title>{$pageTitle}</title>
        <link rel="stylesheet" href="{$templateWebPath}css/main.css" type="text/css" />
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.css" type="css" />
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap-responsive.css" type="css" />
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="{$templateWebPath}js/admin.js"></script>
    </head>
    
    <body>
        <div class="container containter-fluid">
        <div class="row">
            <div class="span12" id="header">
                <div id="header">
                    <h1>Управление сайтом</h1>
                </div>   
            </div>
        </div>
            
        <div class="row">    
             <div class="span6 block" id="leftColumn">
                {include file='adminLeftcolumn.tpl'}
             </div>
    
        {* Центральный столбец *}
  
         <div class="span6 block">
            <div>