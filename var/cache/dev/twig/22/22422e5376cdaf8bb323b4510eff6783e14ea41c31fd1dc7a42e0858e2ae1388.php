<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_602e120c73e200b6f211de74f4c6a24abe390c213f089678d76611b830196f53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_310d7414eef6f1fda7da9e7b8014e2408d9bf82f60de083494e8cf910f076051 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_310d7414eef6f1fda7da9e7b8014e2408d9bf82f60de083494e8cf910f076051->enter($__internal_310d7414eef6f1fda7da9e7b8014e2408d9bf82f60de083494e8cf910f076051_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_310d7414eef6f1fda7da9e7b8014e2408d9bf82f60de083494e8cf910f076051->leave($__internal_310d7414eef6f1fda7da9e7b8014e2408d9bf82f60de083494e8cf910f076051_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_c0c33878a068537439da971d3436b1842378dcb87681e2868ebbfc8985a86c36 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c0c33878a068537439da971d3436b1842378dcb87681e2868ebbfc8985a86c36->enter($__internal_c0c33878a068537439da971d3436b1842378dcb87681e2868ebbfc8985a86c36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_c0c33878a068537439da971d3436b1842378dcb87681e2868ebbfc8985a86c36->leave($__internal_c0c33878a068537439da971d3436b1842378dcb87681e2868ebbfc8985a86c36_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_b58bab4a0f54fcf0e1b9a234af836c69ffbcff83e77006b8a973d58956094494 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b58bab4a0f54fcf0e1b9a234af836c69ffbcff83e77006b8a973d58956094494->enter($__internal_b58bab4a0f54fcf0e1b9a234af836c69ffbcff83e77006b8a973d58956094494_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_b58bab4a0f54fcf0e1b9a234af836c69ffbcff83e77006b8a973d58956094494->leave($__internal_b58bab4a0f54fcf0e1b9a234af836c69ffbcff83e77006b8a973d58956094494_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_3360a338c85d314efebb6fe4a6e1262a8f06258735488a74bbd2b604f1672e52 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3360a338c85d314efebb6fe4a6e1262a8f06258735488a74bbd2b604f1672e52->enter($__internal_3360a338c85d314efebb6fe4a6e1262a8f06258735488a74bbd2b604f1672e52_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_3360a338c85d314efebb6fe4a6e1262a8f06258735488a74bbd2b604f1672e52->leave($__internal_3360a338c85d314efebb6fe4a6e1262a8f06258735488a74bbd2b604f1672e52_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "C:\\xampp\\htdocs\\symcurso2\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\TwigBundle\\Resources\\views\\Exception\\exception_full.html.twig");
    }
}
