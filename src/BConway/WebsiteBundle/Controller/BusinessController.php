<?php

namespace BConway\WebsiteBundle\Controller;

use Doctrine\Common\Util\Debug;
use Doctrine\ODM\MongoDB\Mapping\Annotations\ObjectId;
use Doctrine\ODM\MongoDB\Types\ObjectIdType;
use MongoId;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\ClassLoader\DebugUniversalClassLoader;

class BusinessController extends Controller
{
    public function browseNameAction($browseBy = null, $organization = null, $state = null, $city = null)
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

        $dm = $this->get('doctrine_mongodb')->getManager();
        // Setup pagination

        // Get organization name from all businesses (distinct)
//        $organizations = $dm->createQueryBuilder('BConwayWebsiteBundle:Business')
//            ->distinct('organization')
//            ->getQuery()
//            ->toArray();
        // Get page from query variable, if it exists
        $page = $this->getRequest()->query->get('page');

        // Get business name from all businesses (distinct)
//        $names = $dm->createQueryBuilder('BConwayWebsiteBundle:Business')
//            ->field('organization')->equals('')
//            ->field('organization')->equals(null)
//            ->distinct('name')
//            ->getQuery()
//            ->toArray();
//
//        Debug::dump($names);

        // Create new array from results of both queries
//        $businesses = array_merge($organizations, $names);

        // Filter out any null or empty values
//        $businesses = array_filter($businesses, function($item) {
//            return (!is_null($item) && strlen($item) > 0);
//        });

        // Filter out any duplicates
//        array_unique($businesses);
        // Get page from query variable, if it exists
        $pageSize = $this->getRequest()->query->get('pageSize');

        // Sort array case-insensitive
//        sort($businesses, SORT_STRING | SORT_FLAG_CASE);
        // Set default current page
        if (is_null($page) || !is_numeric($page)) {
            $page = 1;
        }

        // Show 100 posts per page by default
        if (is_null($pageSize) || !is_numeric($pageSize)) {
            $pageSize = 100;
        }

        // end - Setup pagination


        $businesses = $dm->getRepository('BConwayWebsiteBundle:Business')
            ->findBusinesses(array(
                'organization'    => $organization,
                'state'           => $state,
                'city'            => $city,
                'pageSize'        => $pageSize,
                'page'            => $page,
            ));

        // Render template
        return $this->render('BConwayWebsiteBundle:Business:browse.html.twig', array(
            'items'    => $businesses,
            'resultType' => (is_null($organization) || strlen($organization) == 0) ? 'String' : 'Object',
            'browseBy' => 'name',
            'organization' => $organization,
            'state' => $state,
            'city' => $city,
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

        Debug::dump($filteredResults->count());

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