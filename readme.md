

<img src="screenshoots/report1.png"><br>

<img src="screenshoots/report2.png"><br>
<h1>HOTEL MANAGEMENT SYSTEM</h1>

				#AMBAZA MARCELLIN



''    ''    ''            ''       """"""
''	  ''    '''	         '''	""
''    '' 	''	''	   '' ''	""
''""""'' 	''		""	  ''		"""""
''    ''  	''            ''			""
''    ''	''            ''	""		""
''    ''	''            ''	  """"

					FONCTIONNALITES
					'''''''''''''''
			1.gestion du stock
			2.gestion des achats
			3.gestion des ventes
			3.gestion des clients
			4.gestion des depenses
			5.gestion des chambres
			6.gestion des reservations
			7.gestion des chambres
			8.prise des commandes en ligne
			9.Alerte Stock
			10.Suivi du stock
			11.Etablissement d'un ticket de vente apres consommation
			12.Gestion des employees
			13.gestion des presences des employees
			14.gestion des rapports
			15.gestion des conges
			16.Statistiques du Systeme


<h2>N.B:</h2>
		<p>possibilite d'acceder a distance via PC ,smartPhone ,etc.</p>
		<p>possibilite de gerer plusieurs choses en meme temps</p>




<h2>AKABIRYA:</h2>
		-SIMPLICITE
		-RAPIDITE
		-SECURITE

<img src="screenshoots/slider.png"><br>
<img src="screenshoots/room.png"><br>

<h2>How To Install :</h2>

 <h2>step 1:</h2>
 	<span>-copy</span><br>
 	<span>-cd repository</span><br>
 	<span>-git clone </span><br>
 <h2>step 2:</h2>
 	<span>-go to env.dusk.example and rename it as env.</span><br>
 	<span>-DB_CONNECTION=mysql</span><br>
	<span>-DB_HOST=127.0.0.1</span><br>
	<span>-DB_PORT=3306</span><br>
	<span>-DB_DATABASE=dbname</span><br>
	<span>-DB_USERNAME=root</span><br>
	<span>-DB_PASSWORD=</span><br>

 <h2>step 3:</h2>
 	<span>-go to database file in config folder</span><br>
 	'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'dbname'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

        'dusk_testing' => [
            'driver' => 'sqlite',
            'database' => database_path('database.sqlite'),
            'prefix' => '',
        ],

    ],

   <h2>step 4 : </h2>
    <h3>run the following commands:</h3>
    	*php artisan migrate<br>
    	*php artisan db:seed<br>
    	*php artisan serve