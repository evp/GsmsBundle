#GsmsBundle

##What is GsmsBundle?
GsmsBundle is a small bundle that can serve as a bridge between your Symfony framework and the [GsmsPHPClient](https://github.com/evp/GsmsPHPClient)

##Sections
* [Requirements](#requirements)
* [Installation](#installation)
* [Code samples](#code-samples)
* [Contacts](#contacts)

##Requirements
* Symfony 2.0+
* An active gsms.lt account

##Installation

###Symfony 2.0.* installation (deps)
* Add following code to your ```deps``` file located in symfony root directory
``` ini
[GsmsPHPClient]
    git=https://github.com/evp/GsmsPHPClient.git
    target=/evp/gsms-php-client

[GsmsBundle]
    git=https://github.com/evp/GsmsBundle
    target=/bundles/Evp/Bundle/GsmsBundle
```
* Run the vendors script to download the bundle:

``` bash
$ php bin/vendors install
```

###Symfony 2.1 installation (vendor)
* Create the following directory structure for the required library: vendor/evp/gsms-php-client
* Use ```git clone https://github.com/evp/GsmsPHPClient``` in your vendor/evp/gsms-php-client directory to retrieve the GsmsPHPClient
* Now create the directory structure for the bundle itself: vendor/evp/gsms-bundle
* Use ```git clone https://github.com/evp/GsmsBundle.git``` in vendor/evp/gsms-bundle directory to retrieve the GsmsBundle bundle
* Add the following code to your app/autoload.php:

```php
  $loader->add('Evp', __DIR__.'/../vendor/evp');
```
* Update your AppKernel by referencing the new bundle:

```php
    public function registerBundles()
    {
        $bundles = array(
            //... your existing bundles here
            new Evp\Bundle\GsmsBundle\EvpGsmsBundle(),
        );

        // ...
    }
```

* Configure your app/config/config.yml

```yml
evp_gsms:
  credentials:
    username: your_username
    password: your_password
  from: my_phone_number
  callback_uri: "http://example.com/callback"
```

Don't forget to replace *your_username*, *your_password* other parameters with the actual values.
`from` and `callback_uri` parameters are optional.

That's it, you are now ready to use GsmsBundle.

###Composer installation
* Run ``` bash
    composer require evp/gsms-php-client dev-master
```
* Run ``` bash
   composer require evp/gsms-bundle dev-master
```

##Code samples
Once the bundle is installed the dependency container will contain evp_gsms.client service,
which can be used to access the methods of GsmsPHPClient

Use the client to send your first sms

```php
$response = $client->send('Your telephone number', 'Receiver telephone number', 'message');
```

And get the response from the server

```php
    if ($response->isSuccessful()) {
           // Do something when the sms has been sent
       } else {
           // Do something when the sms has not been sent
           $lastResponse = $client->getLastResponse();
       }
```

Please refer to the [Evp_Gsms_Client documentation](https://github.com/evp/GsmsPHPClient#code-samples) for additional information.

##Contacts
If you have any further questions feel free to contact us:

"EVP International", UAB    
Mėnulio g. 7    
LT-04326 Vilnius    
El. paštas: pagalba@gsms.lt    
Tel. +370 (5) 2 03 27 19    
Faksas +370 (5) 2 63 91 79    
