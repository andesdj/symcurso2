<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // default_index
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_default_index;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'default_index');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'default_index',);
        }
        not_default_index:

        // default_pruebas
        if ($pathinfo === '/pruebas') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_default_pruebas;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::pruebasAction',  '_route' => 'default_pruebas',);
        }
        not_default_pruebas:

        // default_login
        if ($pathinfo === '/login') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_default_login;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::loginAction',  '_route' => 'default_login',);
        }
        not_default_login:

        if (0 === strpos($pathinfo, '/user')) {
            // user_new
            if ($pathinfo === '/user/new') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }
            not_user_new:

            // user_edit
            if ($pathinfo === '/user/edit') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_edit;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\UserController::editAction',  '_route' => 'user_edit',);
            }
            not_user_edit:

            // user_upload_image
            if ($pathinfo === '/user/upload-image') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_upload_image;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\UserController::uploadImageAction',  '_route' => 'user_upload_image',);
            }
            not_user_upload_image:

            // user_channel
            if (0 === strpos($pathinfo, '/user/channel') && preg_match('#^/user/channel(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_channel;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_channel')), array (  '_controller' => 'AppBundle\\Controller\\UserController::channelAction',  'id' => NULL,));
            }
            not_user_channel:

        }

        if (0 === strpos($pathinfo, '/video')) {
            // video_new
            if ($pathinfo === '/video/new') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_video_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\VideoController::newAction',  '_route' => 'video_new',);
            }
            not_video_new:

            // video_edit
            if (0 === strpos($pathinfo, '/video/edit') && preg_match('#^/video/edit(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_video_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'video_edit')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::editAction',  'id' => NULL,));
            }
            not_video_edit:

            if (0 === strpos($pathinfo, '/video/upload-')) {
                // video_upload_image
                if (0 === strpos($pathinfo, '/video/upload-image') && preg_match('#^/video/upload\\-image(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_video_upload_image;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'video_upload_image')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::uploadAction',  'id' => NULL,));
                }
                not_video_upload_image:

                // video_upload_video
                if (0 === strpos($pathinfo, '/video/upload-video') && preg_match('#^/video/upload\\-video(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_video_upload_video;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'video_upload_video')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::uploadAction',  'id' => NULL,));
                }
                not_video_upload_video:

            }

            if (0 === strpos($pathinfo, '/video/l')) {
                // video_list
                if ($pathinfo === '/video/list') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_video_list;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\VideoController::videosAction',  'id' => NULL,  '_route' => 'video_list',);
                }
                not_video_list:

                // video_last_videos
                if ($pathinfo === '/video/last-videos') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_video_last_videos;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\VideoController::lastVideosAction',  '_route' => 'video_last_videos',);
                }
                not_video_last_videos:

            }

            // video_detail
            if (0 === strpos($pathinfo, '/video/detail') && preg_match('#^/video/detail(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_video_detail;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'video_detail')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::videoAction',  'id' => NULL,));
            }
            not_video_detail:

            // video_search
            if (0 === strpos($pathinfo, '/video/search') && preg_match('#^/video/search(?:/(?P<search>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_video_search;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'video_search')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::searchAction',  'search' => NULL,));
            }
            not_video_search:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
