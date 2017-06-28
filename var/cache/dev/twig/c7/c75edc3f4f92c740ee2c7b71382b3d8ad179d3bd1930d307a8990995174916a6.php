<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_9ce881fdba0722a58165fccbeab563b159ad882b0a2c82693e3d729b1669d283 extends Twig_Template
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
        $__internal_a88a5c814cc04701ed84e24a85f20b6a58e8737daf5c0f794b10fd6e199e204d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a88a5c814cc04701ed84e24a85f20b6a58e8737daf5c0f794b10fd6e199e204d->enter($__internal_a88a5c814cc04701ed84e24a85f20b6a58e8737daf5c0f794b10fd6e199e204d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a88a5c814cc04701ed84e24a85f20b6a58e8737daf5c0f794b10fd6e199e204d->leave($__internal_a88a5c814cc04701ed84e24a85f20b6a58e8737daf5c0f794b10fd6e199e204d_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_6a0c1831b4fa61fbe3f2e4779781c13e28a8018f85d5be15fecfe93eb6de3037 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6a0c1831b4fa61fbe3f2e4779781c13e28a8018f85d5be15fecfe93eb6de3037->enter($__internal_6a0c1831b4fa61fbe3f2e4779781c13e28a8018f85d5be15fecfe93eb6de3037_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_6a0c1831b4fa61fbe3f2e4779781c13e28a8018f85d5be15fecfe93eb6de3037->leave($__internal_6a0c1831b4fa61fbe3f2e4779781c13e28a8018f85d5be15fecfe93eb6de3037_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_36573bc122f699915af53d692f93c47d2045eb488b0a999350b055260ac6986e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_36573bc122f699915af53d692f93c47d2045eb488b0a999350b055260ac6986e->enter($__internal_36573bc122f699915af53d692f93c47d2045eb488b0a999350b055260ac6986e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_36573bc122f699915af53d692f93c47d2045eb488b0a999350b055260ac6986e->leave($__internal_36573bc122f699915af53d692f93c47d2045eb488b0a999350b055260ac6986e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_174f67f25cc1a40786c2a8dacebfd1c26c9715360d8be0d279198ecb4a2da358 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_174f67f25cc1a40786c2a8dacebfd1c26c9715360d8be0d279198ecb4a2da358->enter($__internal_174f67f25cc1a40786c2a8dacebfd1c26c9715360d8be0d279198ecb4a2da358_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_174f67f25cc1a40786c2a8dacebfd1c26c9715360d8be0d279198ecb4a2da358->leave($__internal_174f67f25cc1a40786c2a8dacebfd1c26c9715360d8be0d279198ecb4a2da358_prof);

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
