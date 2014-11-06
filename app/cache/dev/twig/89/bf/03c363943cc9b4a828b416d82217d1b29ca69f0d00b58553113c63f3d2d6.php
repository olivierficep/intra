<?php

/* FicepPlanningBundle:Default:index.html.twig */
class __TwigTemplate_89bf03c363943cc9b4a828b416d82217d1b29ca69f0d00b58553113c63f3d2d6 extends Twig_Template
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
\t\t<title>Affichage planning</title>
\t</head>
\t<body>
\t\t<div align=\"middle\">
\t\t\t<table cellspacing=\"2px;\" cellpadding=\"2px;\" style=\"border: solid 1px black;\" width=\"80%\" rules=\"all\">
\t\t\t\t<caption>Week number ";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["week"]) ? $context["week"] : $this->getContext($context, "week")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["year"]) ? $context["year"] : $this->getContext($context, "year")), "html", null, true);
        echo "</caption>
\t\t\t\t<tr>
\t\t\t\t\t<td align=\"middle\" width=\"20%\">Technician's Name</td>
\t\t\t\t\t";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")));
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            // line 16
            echo "\t\t\t\t\t<td align=\"middle\" width=\"16%\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["day"]) ? $context["day"] : $this->getContext($context, "day")), "d/m/y"), "html", null, true);
            echo "</td>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td align=\"middle\" width=\"20%\">Technician's Name</td>
\t\t\t\t\t<td align=\"middle\" width=\"16%\">t</td>
\t\t\t\t\t<td align=\"middle\" width=\"16%\">t</td>
\t\t\t\t\t<td align=\"middle\" width=\"16%\">t</td>
\t\t\t\t\t<td align=\"middle\" width=\"16%\">t</td>
\t\t\t\t\t<td align=\"middle\" width=\"16%\">t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "FicepPlanningBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 18,  43 => 16,  39 => 15,  31 => 12,  19 => 2,);
    }
}
