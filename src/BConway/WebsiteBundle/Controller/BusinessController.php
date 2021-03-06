<?php

namespace BConway\WebsiteBundle\Controller;

use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BusinessController extends Controller
{
    public function browseNameAction(Request $request, $browseBy = null, $organization = null, $state = null, $city = null)
    {
        // Get all GET query parameters
        $query_params = $this->getRequest()->query->all();

        // If 's', 'o' or 'c' exist as a GET parameter, remove those variables then forward to new url
        if (array_key_exists('o', $query_params) && array_key_exists('s', $query_params) && array_key_exists('c', $query_params)) {
            $query_params['organization'] = twig_urlencode_filter($query_params['o']);
            unset($query_params['o']);

            $query_params['state'] = twig_urlencode_filter($query_params['s']);
            unset($query_params['s']);

            $query_params['city'] = twig_urlencode_filter($query_params['c']);
            unset($query_params['c']);

            return $this->redirect($this->generateUrl('b_conway_website_business_browse_name_with_organization_state_city', $query_params));
        } elseif (array_key_exists('o', $query_params) && array_key_exists('s', $query_params)) {
            $query_params['organization'] = twig_urlencode_filter($query_params['o']);
            unset($query_params['o']);

            $query_params['state'] = twig_urlencode_filter($query_params['s']);
            unset($query_params['s']);

            return $this->redirect($this->generateUrl('b_conway_website_business_browse_name_with_organization_state', $query_params));
        } elseif (array_key_exists('o', $query_params)) {
            $query_params['organization'] = twig_urlencode_filter($query_params['o']);
            unset($query_params['o']);

            return $this->redirect($this->generateUrl('b_conway_website_business_browse_name_with_organization', $query_params));
        }

        // Setup pagination

        // Get page from query variable, if it exists
        $page = $this->getRequest()->query->get('page');

        // Get page from query variable, if it exists
        $pageSize = $this->getRequest()->query->get('pageSize');

        // Set default current page
        if (is_null($page) || !is_numeric($page)) {
            $page = 1;
        }

        // Show 100 posts per page by default
        if (is_null($pageSize) || !is_numeric($pageSize)) {
            $pageSize = 100;
        }

        // end - Setup pagination

        /* @var \Doctrine\ODM\MongoDB\DocumentManager $dm */
        $dm = $this->get('doctrine_mongodb')->getManager();

        $results = $dm->getRepository('BConwayWebsiteBundle:Business')
            ->findBusinesses(array(
                'organization'    => $organization,
                'state'           => $state,
                'city'            => $city,
                'pageSize'        => $pageSize,
                'page'            => $page,
            ));

        if (
                (isset($results['states']) && count($results['states']) > 0)
                || (isset($results['cities']) && count($results['cities']) > 0)
        ){
            $filterForm = $this->createFormBuilder();

            if (isset($results['states']) && count($results['states']) > 0) {
                $stateChoices = array(null => 'Narrow by state');
                foreach($results['states'] as $state) {
                    $stateChoices[$state] = $state;
                }
                $filterForm
                    ->setAction($this->generateUrl('b_conway_website_business_browse_name_with_organization', array(
                        'organization' => $organization,
                    )))
                    ->add('states', 'choice', array(
                        'choices'  => $stateChoices,
                        'expanded' => false,
                        'multiple' => false,
                        'label'    => ''
                    ))
                    ->add('filterByState', 'submit', array(
                        'label' => 'Filter'
                    ))
                    ->getForm();
            } else {
                if (isset($results['cities']) && count($results['cities']) > 0) {
                    $cityChoices = array(null => 'Narrow by city');
                    foreach($results['cities'] as $city) {
                        $cityChoices[$city] = $city;
                    }
                    $filterForm
                        ->setAction($this->generateUrl('b_conway_website_business_browse_name_with_organization_state', array(
                            'organization' => $organization,
                            'state' => $state,
                        )))
                        ->setMethod('post')
                        ->add('cities', 'choice', array(
                            'choices'  => $cityChoices,
                            'expanded' => false,
                            'multiple' => false,
                            'label'    => ''
                        ))
                        ->add('filterByCity', 'submit', array(
                            'label' => 'Filter'
                        ))
                        ;
                }
            }

            $filterForm = $filterForm->getForm();

            $filterForm->handleRequest($request);

            if ($filterForm->isValid() && $filterForm->isSubmitted()) {
                if ($filterForm->has('filterByState') && $filterForm->get('filterByState')->isClicked()) {
                    return $this->redirect($this->generateUrl('b_conway_website_business_browse_name_with_organization_state', array(
                        'organization' => $organization,
                        'state'        => $filterForm->get('states')->getData(),
                    )));
                } elseif ($filterForm->has('filterByCity') && $filterForm->get('filterByCity')->isClicked()) {
                    return $this->redirect($this->generateUrl('b_conway_website_business_browse_name_with_organization_state_city', array(
                        'organization' => $organization,
                        'state'        => $state,
                        'city'        => $filterForm->get('cities')->getData(),
                    )));
                }
            }
        }

        // Render template
        return $this->render('BConwayWebsiteBundle:Business:browse.html.twig', array(
            'items'            => $results['businesses'],
            'resultType'       => isset($results['type']) ? $results['type'] : null,
            'filterForm'       => isset($filterForm) ? $filterForm->createView() : null,
            'browseBy'         => 'name',
            'organization'     => $organization,
            'state'            => $state,
            'city'             => $city,
            'currentPage'      => $page,
            'totalPages'       => $results['totalPages'],
            'totalItems'       => $results['totalCount'],
            'pageSize'         => $pageSize,
        ));
    }

    public function browseLocationAction($state = null)
    {
        // Get all GET query parameters
        $query_params = $this->getRequest()->query->all();

        // If 's' exists as a GET parameter, remove those variables then forward to new url
        if (array_key_exists('s', $query_params)) {
            $query_params['state'] = twig_urlencode_filter($query_params['s']);
            unset($query_params['s']);

            return new $this->redirect($this->generateUrl('b_conway_website_business_browse_location', $query_params));
        }

        $dm = $this->get('doctrine_mongodb')->getManager();
        $filteredResults = array();

        if (empty($state)) {
            $qb = $dm->createQueryBuilder('BConwayWebsiteBundle:Business')
                ->distinct('address.state');

            $query = $qb->getQuery();
            $results = $query->execute();

            // Add all non-null states to $states array
            foreach ($results as $result) {
                if (isset($result) && !is_null($result)) {
                    if (!in_array($result, $filteredResults)) {
                        array_push($filteredResults, $result);
                    }
                }
            }

            // Sort array case-insensitive
            sort($filteredResults, SORT_STRING | SORT_FLAG_CASE);
        } else {
            // Get organization name from all businesses (distinct)
            $dm = $this->get('doctrine_mongodb')->getManager();
            $qb = $dm->createQueryBuilder('BConwayWebsiteBundle:Business')
                ->distinct('organization');
            $query = $qb->getQuery();
            $organizations = $query->execute();

            // Get business name from all businesses (distinct)
            $dm = $this->get('doctrine_mongodb')->getManager();
            $qb = $dm->createQueryBuilder('BConwayWebsiteBundle:Business')
                ->field('organization')->equals('')
                ->field('organization')->equals(null)
                ->distinct('name');
            $query = $qb->getQuery();
            $names = $query->execute();

            // Initialize an empty array
            $businesses = array();

            // Add all non-null organization names to $businesses array
            foreach ($organizations as $organization) {
                if (isset($organization) && !is_null($organization)) {
                    if (!in_array($organization, $businesses)) {
                        array_push($businesses, $organization);
                    }
                }
            }

            // Add all non-null business names to $businesses array,
            // unless an organization by the same name was already added
            foreach ($names as $name) {
                if (isset($name) && !is_null($name)) {
                    if (!in_array($name, $businesses)) {
                        array_push($businesses, $name);
                    }
                }
            }

            // Sort array case-insensitive
            $filteredResults = sort($businesses, SORT_STRING | SORT_FLAG_CASE);
        }

        // Render template
        return $this->render('BConwayWebsiteBundle:Business:browse.html.twig', array(
            'items'    => $filteredResults,
            'browseBy' => 'location',
            'state'    => $state
        ));
    }

    public function browseCategoryAction()
    {
        // Get organization name from all businesses (distinct)
        $dm = $this->get('doctrine_mongodb')->getManager();
        $qb = $dm->createQueryBuilder('BConwayWebsiteBundle:Business')
            ->distinct('organization');
        $query = $qb->getQuery();
        $organizations = $query->execute();

        // Get business name from all businesses (distinct)
        $dm = $this->get('doctrine_mongodb')->getManager();
        $qb = $dm->createQueryBuilder('BConwayWebsiteBundle:Business')
            ->field('organization')->equals('')
            ->field('organization')->equals(null)
            ->distinct('name');
        $query = $qb->getQuery();
        $names = $query->execute();

        // Initialize an empty array
        $businesses = array();

        // Add all non-null organization names to $businesses array
        foreach ($organizations as $organization) {
            if (isset($organization) && !is_null($organization)) {
                if (!in_array($organization, $businesses)) {
                    array_push($businesses, $organization);
                }
            }
        }

        // Add all non-null business names to $businesses array,
        // unless an organization by the same name was already added
        foreach ($names as $name) {
            if (isset($name) && !is_null($name)) {
                if (!in_array($name, $businesses)) {
                    array_push($businesses, $name);
                }
            }
        }

        // Sort array case-insensitive
        sort($businesses, SORT_STRING | SORT_FLAG_CASE);

        // Render template
        return $this->render('BConwayWebsiteBundle:Business:browse.html.twig', array(
            'items'    => $businesses,
            'browseBy' => 'category',
        ));
    }

    public function detailsAction($id = null)
    {
        // Get all GET query parameters
        $query_params = $this->getRequest()->query->all();

        // If 'id' exists as a GET parameter, remove those variables then forward to new url
        if (array_key_exists('id', $query_params) && $query_params['id']) {
            return $this->redirect($this->generateUrl('b_conway_website_business_details', $query_params));
        }

        /* @var \Doctrine\ODM\MongoDB\DocumentManager $dm */
        $dm = $this->get('doctrine_mongodb')->getManager();

        $business = $dm
            ->getRepository('BConwayWebsiteBundle:Business')
            ->find($id);

        if (!empty($business)) {
            return $this->render('BConwayWebsiteBundle:Business:details.html.twig', array(
                'business' => $business,
            ));
        } else {
            return new $this->createNotFoundException('No business found with id: ' . $id);
        }
    }
}