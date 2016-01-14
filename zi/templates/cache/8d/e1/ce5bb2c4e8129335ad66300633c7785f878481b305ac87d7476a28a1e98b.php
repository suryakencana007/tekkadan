<?php

/* /viewku/test.twig */
class __TwigTemplate_8de1ce5bb2c4e8129335ad66300633c7785f878481b305ac87d7476a28a1e98b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Slim Framework for PHP 5</title>
    <style>
    html,body,div,span,object,iframe,
    h1,h2,h3,h4,h5,h6,p,blockquote,pre,
    abbr,address,cite,code,
    del,dfn,em,img,ins,kbd,q,samp,
    small,strong,sub,sup,var,
    b,i,
    dl,dt,dd,ol,ul,li,
    fieldset,form,label,legend,
    table,caption,tbody,tfoot,thead,tr,th,td,
    article,aside,canvas,details,figcaption,figure,
    footer,header,hgroup,menu,nav,section,summary,
    time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;}
    body{line-height:1;}
    article,aside,details,figcaption,figure,
    footer,header,hgroup,menu,nav,section{display:block;}
    nav ul{list-style:none;}
    blockquote,q{quotes:none;}
    blockquote:before,blockquote:after,
    q:before,q:after{content:'';content:none;}
    a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent;}
    ins{background-color:#ff9;color:#000;text-decoration:none;}
    mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold;}
    del{text-decoration:line-through;}
    abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help;}
    table{border-collapse:collapse;border-spacing:0;}
    hr{display:block;height:1px;border:0;border-top:1px solid #cccccc;margin:1em 0;padding:0;}
    input,select{vertical-align:middle;}
    html{ background: #EDEDED; height: 100%; }
    body{background:#FFF;margin:0 auto;min-height:100%;padding:0 30px;width:440px;color:#666;font:14px/23px Arial,Verdana,sans-serif;}
    h1,h2,h3,p,ul,ol,form,section{margin:0 0 20px 0;}
    h1{color:#333;font-size:20px;}
    h2,h3{color:#333;font-size:14px;}
    h3{margin:0;font-size:12px;font-weight:bold;}
    ul,ol{list-style-position:inside;color:#999;}
    ul{list-style-type:square;}
    code,kbd{background:#EEE;border:1px solid #DDD;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:0 4px;color:#666;font-size:12px;}
    pre{background:#EEE;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:5px 10px;color:#666;font-size:12px;}
    pre code{background:transparent;border:none;padding:0;}
    a{color:#70a23e;}
    header{padding: 30px 0;text-align:center;}
    </style>
</head>
<body>
    <header>
     ";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : null), "html", null, true);
        echo "
 </header>
 <h1>Welcome to ";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["hello"]) ? $context["hello"] : null), "html", null, true);
        echo "!</h1>
 <p>
    Congratulations! Your new Slim Framework application is running. If this is
    your first time using Slim, start with this <a href=\"http://docs.slimframework.com/#Hello-World\" target=\"_blank\">\"Hello World\" Tutorial</a>.
</p>
<section>
    <h2>Get Started</h2>
    <ol>
        <li>The application code is in <code>index.php</code></li>
        <li>Read the <a href=\"http://docs.slimframework.com/\" target=\"_blank\">online documentation</a></li>
        <li>Follow <a href=\"http://www.twitter.com/slimphp\" target=\"_blank\">@slimphp</a> on Twitter</li>
    </ol>
</section>
<section>
    <h2>Slim Framework Community ";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('zi_extension')->priceFilter("5500.25155", 4, ",", ""), "html", null, true);
        echo "</h2>

    <h3>Support Forum and Knowledge Base</h3>
    <p>
        Visit the <a href=\"http://help.slimframework.com\" target=\"_blank\">Slim support forum and knowledge base</a>
        to read announcements, chat with fellow Slim users, ask questions, help others, or show off your cool
        Slim Framework apps.
    </p>

    <h3>Twitter</h3>
    <p>
        Follow <a href=\"http://www.twitter.com/slimphp\" target=\"_blank\">@slimphp</a> on Twitter to receive the very latest news
        and updates about the framework.
    </p>

    <h3>IRC</h3>
    <p>
        Find Josh Lockhart in the irc.freenode.net \"##slim\" IRC channel during the day. Say hi, ask questions,
        or just hang out with fellow Slim users.
    </p>
</section>
<section style=\"padding-bottom: 20px\">
    <h2>Slim Framework Views</h2>
    <p>
        Custom View classes for Smarty and Twig are available online 
        in a separate repository.
    </p>
    <p><a href=\"https://github.com/codeguy/Slim-Views\" target=\"_blank\">Browse the Views Repository</a></p>
</section>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "/viewku/test.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 67,  76 => 53,  71 => 51,  19 => 1,);
    }
}
