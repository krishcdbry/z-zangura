<?php
use Doctrine\Common\ClassLoader,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger;

class Doctrine {

  public $em = null;

  public function __construct()
  {
    // load database configuration from CodeIgniter
    require_once APPPATH.'config/database.php';

    // Set up class loading. You could use different autoloaders, provided by your favorite framework,
    // if you want to.
    require_once APPPATH.'libraries/Doctrine/Common/ClassLoader.php';

    // loading libraries
    $doctrineClassLoader = new ClassLoader('Doctrine',  APPPATH.'libraries');
    $doctrineClassLoader->register();

	// loading Models	
    $entitiesClassLoader = new ClassLoader('Zangura\\Models', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();

    // loading Proxies
    $entitiesClassLoader = new ClassLoader('Zangura\\Proxies', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();

    // loading Helpers
    $entitiesClassLoader = new ClassLoader('Zangura\\Helpers', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();

    // loading Repositories
    $entitiesClassLoader = new ClassLoader('Zangura\\Repositories', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();

    // loading Security 
    $entitiesClassLoader = new ClassLoader('Zangura\\Security', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();


    // Set up caches
    $config = new Configuration;
    $cache = new ArrayCache;
    $config->setMetadataCacheImpl($cache);
    $driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH.'models/Entities'));
    $config->setMetadataDriverImpl($driverImpl);
    $config->setQueryCacheImpl($cache);

    $config->setQueryCacheImpl($cache);

    // Proxy configuration
    $config->setProxyDir(APPPATH.'/models/proxies');
    $config->setProxyNamespace('Proxies');

    // Set up logger
    $logger = new EchoSQLLogger;
    $config->setSQLLogger($logger);

    $config->setAutoGenerateProxyClasses( TRUE );

    // Database connection information
    $connectionOptions = array(
        'driver' => 'pdo_mysql',
        'user' =>     $db['default']['username'],
        'password' => $db['default']['password'],
        'host' =>     $db['default']['hostname'],
        'dbname' =>   $db['default']['database']
    );

    // Create EntityManager
    $this->em = EntityManager::create($connectionOptions, $config);
  }
}