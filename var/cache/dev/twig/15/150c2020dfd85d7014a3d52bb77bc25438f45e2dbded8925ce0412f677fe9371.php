<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_06242312a53d1ba3afd932205d5aef205c97f41279bbc6e289ba7934ad4f6bde extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_141480ea2d24c756528a8c5f4650b824b66fd30503a37a194f957544e4a908f5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_141480ea2d24c756528a8c5f4650b824b66fd30503a37a194f957544e4a908f5->enter($__internal_141480ea2d24c756528a8c5f4650b824b66fd30503a37a194f957544e4a908f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_141480ea2d24c756528a8c5f4650b824b66fd30503a37a194f957544e4a908f5->leave($__internal_141480ea2d24c756528a8c5f4650b824b66fd30503a37a194f957544e4a908f5_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_746decde650be7c79f0d522b1de9a75e7c5013006d1786eae556ff305a78904f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_746decde650be7c79f0d522b1de9a75e7c5013006d1786eae556ff305a78904f->enter($__internal_746decde650be7c79f0d522b1de9a75e7c5013006d1786eae556ff305a78904f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_746decde650be7c79f0d522b1de9a75e7c5013006d1786eae556ff305a78904f->leave($__internal_746decde650be7c79f0d522b1de9a75e7c5013006d1786eae556ff305a78904f_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_c8cb3264cbad70bdd477b39e0a472925e65f78d1870b41462c7f999107a26269 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c8cb3264cbad70bdd477b39e0a472925e65f78d1870b41462c7f999107a26269->enter($__internal_c8cb3264cbad70bdd477b39e0a472925e65f78d1870b41462c7f999107a26269_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_c8cb3264cbad70bdd477b39e0a472925e65f78d1870b41462c7f999107a26269->leave($__internal_c8cb3264cbad70bdd477b39e0a472925e65f78d1870b41462c7f999107a26269_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_e90083d17c7a65ea1beb215c4e46aa3920d4daa24ce92d75620b6cba76d41bcd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e90083d17c7a65ea1beb215c4e46aa3920d4daa24ce92d75620b6cba76d41bcd->enter($__internal_e90083d17c7a65ea1beb215c4e46aa3920d4daa24ce92d75620b6cba76d41bcd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_e90083d17c7a65ea1beb215c4e46aa3920d4daa24ce92d75620b6cba76d41bcd->leave($__internal_e90083d17c7a65ea1beb215c4e46aa3920d4daa24ce92d75620b6cba76d41bcd_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "C:\\xampp\\htdocs\\symcurso2\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\router.html.twig");
    }
}
