<?php

/* OCPlatformBundle:Advert:view.html.twig */
class __TwigTemplate_94e55521af7ad2e9162db89663189aee2a3369d9c79cada870b263ab480cdd2a extends Twig_Template
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
        // line 2
        echo "
<!DOCTYPE html>
<html>
\t<head>
\t\t<title>Bienvenue sur ma première page</title>
\t</head>
\t<body>
\t\t<h1>Affichage d'une annonce</h1>
\t\t
\t\t<p>
\t\t\t";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 13
            echo "\t\t\t\t<p>Message Flash : ";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
            echo "</p>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "\t\t</p>
\t\t
\t\t<p>
\t\t\tIci nous pourrons lire l annonce ayant come id : ";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "<br />
\t\t\tMais pour l instant rien
\t\t</p>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "OCPlatformBundle:Advert:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 18,  44 => 15,  35 => 13,  31 => 12,  19 => 2,);
    }
}
